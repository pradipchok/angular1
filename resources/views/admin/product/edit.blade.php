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
                <form method="POST" action="{{ route('product.update',$product->id) }}" class="form-horizontal">
                     <div class="form-body">
                        <h3 class="form-section">{{ __('Product Edit') }}</h3>
                    @csrf
                    {{ method_field('PUT') }}
                         <div class="form-group  @error('title') has-error @enderror">
                            <label class="control-label col-md-2" for="inputError">{{ __('Title') }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control " name="title" value="{{ old('title',$product->title) }}"  autocomplete="title" autofocus>
                                     @error('title')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror	                                    
                                </div>
                          </div> 
                          <div class="form-group  @error('title') has-error @enderror">
                              <label class="control-label col-md-2" for="inputError">{{ __('Parent') }}</label>
                                  <div class="col-md-8">
                                      <select class="form-control " name="parent_id">
                                          <option value="0">--Please Select--</option>
                                              @if (count($products) >0)
                                                @foreach ($products as $p)   
                                                  <option value="{{ $p->id }}" @if($p->id==$product->parent_id) selected='selected' @endif>{{ $p->title }} </option>
                                                @endforeach
                                              @endif
                                     </select>

                                  </div>
                            </div> 

                          <div class="form-group  @error('description') has-error @enderror">
                            <label class="control-label col-md-2" for="inputError">{{ __('Description') }}</label>
                                <div class="col-md-8">
                                    <textarea class="ckeditor form-control" name="description">{{ old('description',$product->description) }}</textarea>
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
                                    <input type="text" class="form-control " name="meta_title" value="{{ old('meta_title',$product->meta_title) }}" required autocomplete="meta_title" autofocus>
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
                                    <input type="text" class="form-control " name="meta_keyword" value="{{ old('meta_keyword',$product->meta_keyword) }}" required autocomplete="meta_keyword" autofocus>
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
                                    <input type="text" class="form-control " name="meta_description" value="{{ old('meta_description',$product->meta_description) }}" required autocomplete="meta_description" autofocus>
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
                                         <a href="{{ route('product.index') }}" >
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