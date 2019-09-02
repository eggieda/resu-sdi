@extends ('layouts.app')
@section('title', 'Review WO')
@section ('contents')
  <div class="row">
    <div class="col">
      <div class="card">
        <form action="{{ route('work-order.update', $workOrder->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="card-header">
            <h4 class="card-title">Review WO Form</h4>
            <p class="card-category">Complete all the blank inputs to complete WO</p>
          </div>
          <div class="card-body">
            @if (session('error'))
              <div class="alert alert-danger" role="alert">
                {{ session('error') }}
              </div>
            @endif
            <div class="form-group">
              <label for="order-date">Order Date</label>
              <input id="order-date" class="form-control" name="order_date" value="{{ $workOrder->order_date }}">
            </div>
            <div class="form-group">
              <label for="customer-name">Customer Name</label>
              <input id="customer-name" type="text" class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}" name="customer_name" value="{{ $workOrder->customer_name }}" readonly>
              @if ($errors->has('customer_name'))
                <span class="small text-danger" role="alert">
                    <strong>{{ $errors->first('customer_name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="customer-address">Customer Address</label>
              <textarea id="customer-address" class="form-control{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" name="customer_address" rows="10" readonly>{{ $workOrder->customer_address }}</textarea>
              @if ($errors->has('customer_address'))
                <span class="small text-danger" role="alert">
                    <strong>{{ $errors->first('customer_address') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="status">Survey Status</label>
              <input type="text" name="status" id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" value="{{ $workOrder->status }}">
              @if ($errors->has('status'))
                <span class="small text-danger" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="phone-number">Phone Number</label>
              <input id="phone-number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $workOrder->phone_number }}" readonly>
              @if ($errors->has('phone_number'))
                <span class="small text-danger" role="alert">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="ref-id">Source ID</label>
              <input id="ref-id" type="text" class="form-control{{ $errors->has('ref_id') ? ' is-invalid' : '' }}" name="ref_id" value="{{ $workOrder->ref_id }}" title="Reference ID" readonly>
              @if ($errors->has('ref_id'))
                <span class="small text-danger" role="alert">
                  <strong>{{ $errors->first('ref_id') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="description">Survey Note</label>
              <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="10">{{ $workOrder->description }}</textarea>
              @if ($errors->has('description'))
                <span class="small text-danger" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="surveyor-name">Surveyor</label>
              <input id="surveyor-name" type="text" class="form-control{{ $errors->has('surveyor') ? ' is-invalid' : '' }}" value="{{ auth()->user()->name }}" readonly>
              <input id="surveyor-id" type="hidden" class="form-control" name="surveyor" value="{{ auth()->user()->id }}">
              @if ($errors->has('surveyor'))
                <span class="small text-danger" role="alert">
                  <strong>{{ $errors->first('surveyor') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="surveyor-partner-name">Surveyor Partner</label>
              <input id="surveyor-partner-name" type="text" class="form-control{{ $errors->has('surveyor_partner') ? ' is-invalid' : '' }}" value="" name="surveyor_partner">
              @if ($errors->has('surveyor_partner'))
                <span class="small text-danger" role="alert">
                  <strong>{{ $errors->first('surveyor_partner') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="kml-document">KML Document</label>
              <input type="file" name="kml_document" class="form-control">
              <p>Uploaded KML Document : <a href="{{ Storage::disk('public')->url($workOrder->kml_document) }}">{{ $workOrder->kml_document }}</a></p>
            </div>
            <div class="form-group text-center mt-3">
              <button class="btn btn-primary btn-fill" type="submit">UPDATE</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
