@extends ('layouts.app')
@section ('title', 'Create Admin')
@section ('contents')
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="{{ route('admin-management.store') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">New Admin Form</h4>
                        <p class="card-category">Fill up this form to create a new Admin</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="small text-danger" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="uid">NIK</label>
                            <input type="text" id="uid" class="form-control" name="uid" value="{{ old('uid') }}">
                            @if ($errors->has('uid'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('uid') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" id="position" class="form-control" name="position" value="{{ old('position') }}">
                            @if ($errors->has('position'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('position') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="small text-danger" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
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