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
	                <form method="POST" action="{{ route('banner.store') }}" class="form-horizontal" enctype="multipart/form-data">
	                     <div class="form-body">
	                        <h3 class="form-section">{{ __('Banner Add') }}</h3>
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
	                          

	                          <div class="form-group  @error('sequence') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Sequence') }}</label>
	                                <div class="col-md-8">
	                                     <input type="text" class="form-control " name="sequence" value="{{ old('sequence') }}"  autocomplete="title" autofocus>
	                                        @error('sequence')
	                                            <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror                        
	                                </div>
	                          </div> 
	                          <div class="form-group  @error('image') has-error @enderror">
	                            <label class="control-label col-md-2" for="inputError">{{ __('Upload Image') }}</label>
	                                <div class="col-md-8">
	                                     <input type="file" class="form-control " name="image" >
	                                        @error('image')
	                                            <span class="invalid-feedback" role="alert">
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
	                                        <a href="{{ route('banner.index') }}" >
  								               <button type="button" class="btn default">Back</button>
  								            </a>                                                                 
	                                    </div>
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
 