@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>New User</h3>
    </div>
    @if ($message = Session::get('Success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif  
    <div class="row main-padding">
        <div class="col-12">
            <form method="POST" action="{{ url('admin/add-new-user') }}">
                @csrf

                <div class="form-group row">
                    <span for="name" class="col-md-2 col-form-label">{{ __('Name') }}</span>

                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <span for="email" class="col-md-2 col-form-label">{{ __('E-Mail Address') }}</span>

                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <span for="type" class="col-md-2 col-form-label">{{ __('Type') }}</span>

                    <div class="col-md-5">
                        <select id="type" class="custom-select" name="type">
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                        </select>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <span for="password" class="col-md-2 col-form-label">{{ __('Password') }}</span>

                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <span for="password-confirm" class="col-md-2 col-form-label">{{ __('Confirm Password') }}</span>

                    <div class="col-md-5">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 offset-md-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <a href="{{ url('admin/users')}}"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
    </div>    
</section>
@endsection    