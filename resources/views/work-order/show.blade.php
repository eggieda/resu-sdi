@extends ('layouts.app')
@section('title', 'Review WO')
@section ('contents')
  <div class="row">
    <div class="col">
      <div class="card">
          <div class="card-header">
            <h4 class="card-title">Show WO Detail</h4>
            <p class="card-category">Complete all the blank inputs to complete WO</p>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="order-date">Order Date</label>
              <input id="order-date" class="form-control" name="order_date" value="{{ $workOrder->order_date }}" readonly>
            </div>
            <div class="form-group">
              <label for="order-date">Survey Date</label>
              <input id="order-date" class="form-control" name="order_date" value="{{ $workOrder->surveyed_at }}" readonly>
            </div>
            <div class="form-group">
              <label for="customer-name">Customer Name</label>
              <input id="customer-name" type="text" class="form-control" name="customer_name" value="{{ $workOrder->customer_name }}" readonly>
            </div>
            <div class="form-group">
              <label for="customer-address">Customer Address</label>
              <textarea id="customer-address" class="form-control" name="customer_address" rows="10" readonly>{{ $workOrder->customer_address }}</textarea>
            </div>
            <div class="form-group">
              <label for="status">Survey Status</label>
              <input type="text" name="status" id="status" class="form-control" value="{{ $workOrder->status }}" readonly>
            </div>
            <div class="form-group">
              <label for="phone-number">Phone Number</label>
              <input id="phone-number" type="text" class="form-control" name="phone_number" value="{{ $workOrder->phone_number }}" readonly>
            </div>
            <div class="form-group">
              <label for="ref-id">Source ID</label>
              <input id="ref-id" type="text" class="form-control" name="ref_id" value="{{ $workOrder->ref_id }}" title="Reference ID" readonly>
            </div>
            <div class="form-group">
              <label for="description">Survey Note</label>
              <textarea name="description" id="description" class="form-control" rows="10" readonly>{{ $workOrder->description }}</textarea>
            </div>
            <div class="form-group">
              <label for="surveyor-name">Surveyor</label>
              <input id="surveyor-name" type="text" class="form-control" value="{{ $workOrder->surveyorDetail->name ?? null }}" readonly>
            </div>
            <div class="form-group">
              <label for="surveyor-partner-name">Surveyor Partner</label>
              <input id="surveyor-partner-name" type="text" class="form-control" value="{{ $workOrder->surveyor_partner }}">
            </div>
            <div class="form-group">
              <label for="kml-document">KML Document</label>
              <input type="file" name="kml-document" class="form-control" disabled>
              <p>Uploaded KML Document : <a href="{{ Storage::disk('public')->url($workOrder->kml_document) }}">{{ $workOrder->kml_document }}</a></p>
            </div>
            <div class="form-group">
              <label for="surveyor-name">Created By</label>
              <input id="created_by" type="text" class="form-control" value="{{ $workOrder->createdBy->name ?? null }}" readonly>
            </div>
            <div class="form-group text-center mt-3">
              <a class="btn btn-primary btn-fill" href="{{ route('work-order.edit', $workOrder->id) }}">REVIEW</a>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
