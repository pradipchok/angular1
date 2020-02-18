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
                  <form method="POST" action="{{ route('news.update',$news->id) }}" class="form-horizontal">
                     <div class="form-body">
                        <h3 class="form-section">{{ __('News Edit') }}</h3>
                        @csrf
                        {{ method_field('PUT') }}
                         <div class="form-group  @error('title') has-error @enderror">
                            <label class="control-label col-md-2" for="inputError">{{ __('Title') }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control " name="title" value="{{ old('title',$news->title) }}"  autocomplete="title" autofocus>
                                     @error('title')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror	                                    
                                </div>
                          </div> 
                          <div class="form-group  @error('short_description') has-error @enderror">
                            <label class="control-label col-md-2" for="inputError">{{ __('Short Description') }}</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="short_description">{{ old('description',$news->short_description) }}</textarea>
                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                        
                                </div>
                          </div>

                          <div class="form-group  @error('description') has-error @enderror">
                            <label class="control-label col-md-2" for="inputError">{{ __('Description') }}</label>
                                <div class="col-md-8">
                                    <textarea class="ckeditor form-control" name="description">{{ old('description',$news->description) }}</textarea>
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
                                    <input type="text" class="form-control " name="meta_title" value="{{ old('meta_title',$news->meta_title) }}" required autocomplete="meta_title" autofocus>
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
                                    <input type="text" class="form-control " name="meta_keyword" value="{{ old('meta_keyword',$news->meta_keyword) }}" required autocomplete="meta_keyword" autofocus>
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
                                    <input type="text" class="form-control " name="meta_description" value="{{ old('meta_description',$news->meta_description) }}" required autocomplete="meta_description" autofocus>
                                     @error('meta_description')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror	                                    
                                </div>
                          </div>  
                          <div class="form-group  @error('meta_description') has-error @enderror">
                              <label class="control-label col-md-2" for="inputError">{{ __('Status') }}</label>
                                  <div class="col-md-8">
                                      <input type="radio"  name="status" value="1" @if($news->status==1) checked="checked" @endif>Yes
                                      <input type="radio"  name="status" value="0" @if($news->status==0) checked="checked" @endif>No
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
                                            {{ __('Update') }}
                                        </button>  
                                        <a href="{{ route('news.index') }}" >
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