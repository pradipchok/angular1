@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-md-12">
	    		<!-- BEGIN VALIDATION STATES-->
	        <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
	             <div class="portlet-body">
	             	@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
	                <form method="POST" action="{{ route('service.store') }}" class="form-horizontal">
	                     <div class="form-body">
	                        <h3 class="form-section">{{ __('Service Add') }}</h3>
	                    @csrf
	                         <div class="form-group  @error('title') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Title') }}</label>
	                                <div class="col-md-8">
	                                    <input type="text" class="form-control " name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>
	                                     @error('title')
	                                        <span class="help-block" role="alert">
	                                            <strong>{{ $message }}</strong>
	                                        </span>
	                                    @enderror	                                    
	                                </div>
	                          </div> 
	                          

	                          <div class="form-group  @error('description') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Description') }}</label>
	                                <div class="col-md-8">
	                                    <textarea class="ckeditor form-control" name="description">{{ old('description') }}</textarea>
	                                        @error('description')
	                                            <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror                        
	                                </div>
	                          </div> 

	                          <div class="form-group  @error('meta_title') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Meta Title') }}</label>
	                                <div class="col-md-8">
	                                    <input type="text" class="form-control " name="meta_title" value="{{ old('meta_title') }}" required autocomplete="meta_title" autofocus>
	                                     @error('meta_title')
	                                        <span class="help-block" role="alert">
	                                            <strong>{{ $message }}</strong>
	                                        </span>
	                                    @enderror	                                    
	                                </div>
	                          </div>

	                          <div class="form-group  @error('meta_keyword') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Meta keyword') }}</label>
	                                <div class="col-md-8">
	                                    <input type="text" class="form-control " name="meta_keyword" value="{{ old('meta_keyword') }}" required autocomplete="meta_keyword" autofocus>
	                                     @error('meta_keyword')
	                                        <span class="help-block" role="alert">
	                                            <strong>{{ $message }}</strong>
	                                        </span>
	                                    @enderror	                                    
	                                </div>
	                          </div> 
	                           
	                          <div class="form-group  @error('meta_description') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Meta Description') }}</label>
	                                <div class="col-md-8">
	                                    <input type="text" class="form-control " name="meta_description" value="{{ old('meta_description') }}" required autocomplete="meta_description" autofocus>
	                                     @error('meta_description')
	                                        <span class="help-block" role="alert">
	                                            <strong>{{ $message }}</strong>
	                                        </span>
	                                    @enderror	                                    
	                                </div>
	                          </div> 
	                          <div class="form-group  @error('status') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Status') }}</label>
	                                <div class="col-md-8">
	                                    <input type="radio"  name="status" value="1" checked="checked" >Yes
	                                    <input type="radio"  name="status" value="0" >No
	                                     @error('meta_description')
	                                        <span class="help-block" role="alert">
	                                            <strong>{{ $message }}</strong>
	                                        </span>
	                                    @enderror	                                    
	                                </div>
	                          </div> 
	                           
	                            <div class="form-actions">
	                                <div class="row">
	                                    <div class="col-md-offset-2 col-md-8">                            
	                                        <button type="submit" class="btn btn-primary">
	                                            {{ __('Add') }}
	                                        </button>
	                                        <a href="{{ route('service.index') }}" >
	                                           <button type="button" class="btn default">Back</button>
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

	@include('admin.editor')
@endsection