<?php

namespace App\Http\Controllers;

use App\User;
use App\WorkOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkOrderController extends Controller
{
    /**
     * WorkOrderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return bool|string
     */
    public function getSourcePriorityOrder()
    {
        $sourcePriority = '';
        foreach (config('resu.source') as $source) {
            $sourcePriority .= '"'.$source.'",';
        }
        $sourcePriority = substr($sourcePriority, 0, -1);

        return $sourcePriority;
    }

    /**
     * Show all work order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = WorkOrder::whereNull('status')
            ->whereIn('source', config('resu.source'))
            ->orderBy(DB::raw('FIELD(source, '.$this->getSourcePriorityOrder().')'));

        if (auth()->user()->isTechnisian()) {
            $query = $query->whereIn('sto', auth()->user()->getWorkLocations());
        }
        
        if ($request->search) {
            $query = $query->where('sto', 'like', '%'.$request->search.'%')
            ->orWhere('source', 'like', '%'.$request->search.'%')
            ->orWhere('id', 'like', '%'.$request->search.'%')
            ->orWhere('ref_id', 'like', '%'.$request->search.'%')
            ->orWhere('customer_name', 'like', '%'.$request->search.'%');
        }
        
        if ($request->start_date) {
            $query = $query->where('order_date', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query = $query->where('order_date', '<=', $request->end_date);
        }
        if ($request->sto) {
            $query = $query->where('sto', $request->sto);
        }
        if ($request->source) {
            $query = $query->where('source', $request->source);
        }

        return view('work-order.index')
            ->with([
                'workOrders' => $query->get()
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function closed(Request $request)
    {
        $query = WorkOrder::whereNotNull('status')->orderBy('updated_at', 'desc');

        if ($request->search) {
            $query = $query->where('sto', 'like', '%'.$request->search.'%')
                ->orWhere('source', 'like', '%'.$request->search.'%')
                ->orWhere('id', 'like', '%'.$request->search.'%')
                ->orWhere('ref_id', 'like', '%'.$request->search.'%')
                ->orWhere('customer_name', 'like', '%'.$request->search.'%');
        }

        if ($request->start_date) {
            $query = $query->where('order_date', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query = $query->where('order_date', '<=', $request->end_date);
        }
        if ($request->sto) {
            $query = $query->where('sto', $request->sto);
        }
        if ($request->source) {
            $query = $query->where('source', $request->source);
        }

        return view('work-order.index')
            ->with([
                'workOrders' => $query->get()
            ]);
    }

    /**
     * Show create work order form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('work-order.create');
    }

    /**
     * Store new Work Order data to DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // validating request
        $request->validate([
            'order_date' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'phone_number' => 'required',
            'sto' => 'required',
            'source' => 'required',
            'ref_id' => 'required'
        ]);

        try {
            // storing to db
            DB::beginTransaction();
            $workOrder = new WorkOrder();
            $workOrder->fill($request->except('_token'));
            $workOrder->order_date = now();
            $workOrder->created_by = auth()->user()->id;
            if ($request->file('kml_document')) {
                $workOrder->kml_document = $this->uploadKmlDocument($request->file('kml_document'), $workOrder);
            }
            $workOrder->save();

            // committing db transaction and redirect to home if success
            DB::commit();
            return redirect(route('work-order.index'))->with([
                'status' => 'Work Order successfully created.'
            ]);
        } catch (\Exception $e) {
            // rollback db transaction and redirect back with error message
            DB::rollBack();
            report($e);
            return redirect()->back()->with([
                'error' => 'Terjadi kesalahan saat menyimpan data ke database'
            ]);
        }
    }

    /**
     * Show detail form with
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('work-order.show')->with([
            'workOrder' => WorkOrder::findOrFail($id)
        ]);
    }

    /**
     * Show edit form with
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('work-order.edit')->with([
            'workOrder' => WorkOrder::findOrFail($id),
            'users' => User::where('role', 'technician')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // validating request
        $request->validate([
            'order_date' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            'ref_id' => 'required',
            'description' => 'required',
            'surveyor' => 'required'
        ]);

        try {
            // start db transaction and updating work order data
            DB::beginTransaction();
            $workOrder = WorkOrder::findOrFail($id);
            $workOrder->status = $request->status;
            $workOrder->description = $request->description;
            $workOrder->surveyor = $request->surveyor;
            $workOrder->surveyor_partner = $request->surveyor_partner;
            $workOrder->surveyed_at = now();
            if ($request->file('kml_document')) {
                $workOrder->kml_document = $this->uploadKmlDocument($request->file('kml_document'), $workOrder);
            }
            $workOrder->save();

            // committing db transaction and redirect to home
            DB::commit();
            return redirect(route('work-order.index'))->with([
                'status' => 'Work Order successfully updated.'
            ]);
        } catch (\Exception $e) {
            // rolling back db transaction and redirect back with error message
            DB::rollBack();
            report($e);
            return redirect()->back()->with([
                'error' => 'Terjadi kesalahan saat melakukan update database'
            ]);
        }
    }

    /**
     * Delete WO
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        WorkOrder::findOrFail($id)->delete();
        return redirect(route('work-order.index'))->with([
            'status' => 'Work Order successfully deleted'
        ]);
    }

    /**
     * Upload KML Document
     */
    public function uploadKmlDocument($file, $workOrder)
    {
        try {
            $path = 'documents';
            $name = date('Ymd', strtotime($workOrder->order_date)) . $workOrder->ref_id . '.' . $file->extension();
            return $file->storeAs($path, $name, ['disk' => 'public']);
        } catch (Exception $e) {
            report($e);
            return null;
        }
    }
}
