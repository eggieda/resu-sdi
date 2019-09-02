@extends ('layouts.app')
@section ('title', 'Create WO')
@section ('contents')
<div class="row">
    <div class="col">
        <div class="card">
            <form action="{{ route('work-order.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">New WO Form</h4>
                    <p class="card-category">Fill up this form to create a new WO</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="order-date">Order Date</label>
                        <input id="order-date" class="form-control" name="order_date"
                            value="{{ old('order_date') ?? date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="customer-name">Customer Name</label>
                        <input id="customer-name" type="text"
                            class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}"
                            name="customer_name" value="{{ old('customer_name') }}">
                        @if ($errors->has('customer_name'))
                        <span class="small text-danger" role="alert">
                            <strong>{{ $errors->first('customer_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="customer-address">Customer Address</label>
                        <textarea id="customer-address"
                            class="form-control{{ $errors->has('customer_address') ? ' is-invalid' : '' }}"
                            name="customer_address" rows="10">{{ old('customer_address') }}</textarea>
                        @if ($errors->has('customer_address'))
                        <span class="small text-danger" role="alert">
                            <strong>{{ $errors->first('customer_address') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone-number">Phone Number</label>
                        <input id="phone-number" type="text"
                            class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                            name="phone_number" value="{{ old('phone_number') }}">
                        @if ($errors->has('phone_number'))
                        <span class="small text-danger" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sto">STO</label>
                        <select name="sto" id="sto" class="form-control{{ $errors->has('sto') ? ' is-invalid' : '' }}">
                            <option value="">-- Choose STO --</option>
                            @foreach (config('resu.sto') as $sto)
								<option value="{{ $sto }}">{{ $sto }}</option>
							@endforeach
                        </select>
                        @if ($errors->has('sto'))
                        <span class="small text-danger" role="alert">
                            <strong>{{ $errors->first('sto') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="source">Source</label>
                        <select name="source" id="source"
                            class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}">
                            <option value="">-- Choose Source --</option>
                            @foreach (config('resu.source') as $source)
								<option value="{{ $source }}">{{ $source }}</option>
							@endforeach
                        </select>
                        @if ($errors->has('source'))
                        <span class="small text-danger" role="alert">
                            <strong>{{ $errors->first('source') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ref-id">Source ID</label>
                        <input id="ref-id" type="text"
                            class="form-control{{ $errors->has('ref_id') ? ' is-invalid' : '' }}" name="ref_id"
                            value="{{ old('ref_id') }}" title="Reference ID">
                        @if ($errors->has('ref_id'))
                        <span class="small text-danger" role="alert">
                            <strong>{{ $errors->first('ref_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-fill btn-primary mt-3" type="submit">CREATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
