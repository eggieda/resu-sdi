@extends('layouts.app')
@section('title', 'Work Order')
@push('styles')
  <style>
    .input-group-sm input {
      height: 30px !important;
    }
    .input-group-sm button {
      height: 30px !important;
    }
  </style>
@endpush
@section('contents')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">Work Order List</h4>
              <p class="card-category">Ordered by priority Order</p>
            </div>
            <div class="col mt-3 mt-md-0">
              <form action="" method="get">
                <div class="input-group input-group-sm">
                  <input name="search" type="text" class="form-control" placeholder="Search by Order ID, SC Number, Project Name, Source, or STO" aria-label="Search" aria-describedby="basic-addon" value="{{ request('search') }}">
                  <div class="input-group-append">
                    <button class="btn btn-fill btn-sm" type="submit"><i class="fa fa-search"></i></button>
                    <button class="btn btn-fill btn-sm" type="button" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive d-md-block d-none">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tgl Order</th>
                  <th>Nama Project</th>
                  <th>STO</th>
                  <th>Source</th>
                  <th>Ref ID</th>
                  <th>Surveyor</th>
                  <th>Surveyed At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="small">
                @foreach($workOrders as $key => $workOrder)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $workOrder->order_date }}</td>
                    <td>{{ $workOrder->customer_name }}</td>
                    <td>{{ $workOrder->sto }}</td>
                    <td>{{ $workOrder->source }}</td>
                    <td>{{ $workOrder->ref_id }}</td>
                    <td>{{ $workOrder->surveyorDetail->name ?? '-- not surveyed yet --' }}</td>
                    <td title="{{ $workOrder->surveyed_at }}">{{ $workOrder->surveyed_at ? $workOrder->surveyed_at->diffForHumans() : '-- not surveyed yet --' }}</td>
                    <td class="text-center">
                      <span>
                        <a href="{{ route('work-order.show', $workOrder->id) }}" title="Show WO" class="text-info mr-2"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('work-order.edit', $workOrder->id) }}" title="Review WO" class="text-warning mr-2"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('work-order.delete', $workOrder->id) }}" title="Delete WO" class="text-danger mr-2"><i class="fa fa-trash"></i></a>
                      </span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('modals')
  <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="fillterWorkOrder" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="fillterWorkOrder">Filter Work Order</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="get">
            <div class="form-group">
              <label for="filter-start-date">Start Date</label>
              <input type="date" class="form-control" id="filter-start-date" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="form-group">
              <label for="filter-end-date">End Date</label>
              <input type="date" class="form-control" id="filter-end-date" name="end_date" value="{{ request('end_date') }}">
            </div>
            <div class="form-group">
              <label for="filter-sto">STO</label>
              <select name="sto" id="filter-sto" class="form-control">
                <option value="">-- STO --</option>
                <option value="KRN"{{ request('sto') == 'KRN' ? 'selected' : '' }}>KRN</option>
                <option value="TUN"{{ request('sto') == 'TUN' ? 'selected' : '' }}>TUN</option>
                <option value="SDA"{{ request('sto') == 'SDA' ? 'selected' : '' }}>SDA</option>
                <option value="PDA"{{ request('sto') == 'PDA' ? 'selected' : '' }}>PDA</option>
                <option value="TDA"{{ request('sto') == 'TDA' ? 'selected' : '' }}>TDA</option>
                <option value="SPI"{{ request('sto') == 'SPI' ? 'selected' : '' }}>SPI</option>
                <option value="SDN"{{ request('sto') == 'SDN' ? 'selected' : '' }}>SDN</option>
                <option value="MJS"{{ request('sto') == 'MJS' ? 'selected' : '' }}>MJS</option>
              </select>
            </div>
            <div class="form-group">
              <label for="filter-source">Source</label>
              <select name="source" id="filter-source" class="form-control">
                <option value=""{{ request('source') == null ? ' selected' : '' }}>-- Source --</option>
                <option value="STARCLICK"{{ request('source') == 'STARCLICK' ? ' selected' : '' }}>STARCLICK</option>
                <option value="LME"{{ request('source') == 'LME' ? ' selected' : '' }}>LME</option>
                <option value="BGES"{{ request('source') == 'BGES' ? ' selected' : '' }}>BGES</option>
              </select>
            </div>
            <div class="form-group mt-3 text-right">
              <button onclick="window.location.assign('{{ Route::is('work-order.index') ? route('work-order.index') : route('work-order.closed') }}');" type="button" class="btn btn-fill btn-secondary">Reset</button>
              <button type="submit" class="btn btn-fill btn-primary">Apply</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endpush