@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Settings</h3>
    </div>
    @if ($message = Session::get('Success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif  
    <div class="row main-padding">
        <div class="col-12">
            <form method="POST" action="{{ url('admin/update-user') }}/{{Auth::user()->id}}">
                @csrf

                <div class="form-group row">
                    <span for="name" class="col-md-2 col-form-label">{{ __('Name') }}</span>

                    <div class="col-md-5">
                        <input id="name" type="text" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

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
                        <input id="email" type="email" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  autocomplete="email" disabled>
                        <input id="email" type="hidden" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
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
                            @if (Auth::user()->type == 'Admin')
                                <option value="Admin" selected>Admin</option>
                                <option value="Manager">Manager</option>
                            @else
                                <option value="Admin">Admin</option>
                                <option value="Manager" selected>Manager</option>
                            @endif                            
                        </select>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <span for="password" class="col-md-2 col-form-label">{{ __('New Password') }}</span>

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
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>  
    @php
    // $mail = DB::table('settings')->get();
    if (count($allmail) > 0) {
        foreach ($allmail as $value) {
            $NMail = $value->s_mail;
            $Id = $value->s_mail;
        }
    }
   
    @endphp
    <div class="row main-padding">
            <div class="col-12">
                <form method="POST" action="{{ url('admin/notification-email')}}">
                    @csrf
                    <div class="form-group row">
                        <span for="password-confirm" class="col-md-2 col-form-label">{{ __('Notification Email') }}</span>
    
                        <div class="col-md-4">
                            <input type="text" class="form-control @error('notifEmail') is-invalid @enderror" name="notifEmail" value="@if(count($allmail) > 0){{$NMail}}@endif" placeholder="Email">
                            <input type="hidden" class="form-control" name="custom_id" value="@if(count($allmail) > 0) 1 @else 2 @endif" placeholder="Email">              
                        </div>
                        <div class="col-md-1">
                            <button type="submit" style="padding:6px; width:100%;" class="btn btn-success btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>   
</section>
@endsection    