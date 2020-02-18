@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
             <div class="portlet-body">
                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                     <div class="form-body">
                        <h3 class="form-section">{{ __('Login') }}</h3>
                    @csrf
                         <div class="form-group  @error('email') has-error @enderror">
                            <label class="control-label col-md-3" for="inputError">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-4">
                                    <input type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                     @error('email')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                          </div> 

                          <div class="form-group  @error('email') has-error @enderror">
                            <label class="control-label col-md-3" for="inputError">{{ __('Password') }}</label>
                                <div class="col-md-4">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                        
                                </div>
                          </div>  
                           <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">                            
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button> 
                                         <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>                          
                                    </div>
                                </div>
                            </div>
                   
                </div>
                </form>
             </div>
        </div>
    </div>
</div> 

@endsection
