@extends ('layouts.app')
@section ('title', 'Edit Technician')
@section ('contents')
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="{{ route('technician-management.update', $technician->id) }}" method="post">
                    @csrf @method('put')
                    <div class="card-header">
                        <h4 class="card-title">Edit Technician Form</h4>
                        <p class="card-category">Fill up this form to create a edit Technician</p>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul class="small text-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ $technician->email }}">
                            @if ($errors->has('email'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $technician->name }}">
                            @if ($errors->has('name'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="uid">NIK</label>
                            <input type="text" id="uid" class="form-control" name="uid" value="{{ $technician->uid }}">
                            @if ($errors->has('uid'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('uid') }}</strong></span>
                            @endif
                        </div>                        
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{ $technician->phone_number }}">
                            @if ($errors->has('phone_number'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('phone_number') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="work_locations">Work Locations <span class="badge badge-primary" title="Available STO : {{ implode (", ", config('resu.sto')) }}">?</span></label>
                            <input type="text" id="work_locations" class="form-control" name="work_locations" value="{{ $technician->work_locations }}">
                            <p class="small text-muted mb-0">Seperate with commas (,). Ex: PDA,GEM</p>
                            <p class="small text-muted">Available STO : {{ implode (", ", config('resu.sto')) }}</p>
                            @if ($errors->has('work_locations'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('work_locations') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" value="">
                            <span class="small text-muted">Leave blank to keep the old password</span>
                            @if ($errors->has('password'))
                                <br><span class="small text-danger" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-fill btn-primary mt-3" type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection