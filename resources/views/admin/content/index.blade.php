
@extends('layouts.app')

@section('content')
	<h1 class="page-title"> Content Management
	    <small></small>
	</h1>
	<div class="row">
	    <div class="col-md-12">
			<div class="portlet-body">
				@if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
				@endif
				<a class="btn btn-primary" href="{{ route('content.create') }}">Add New</a>  
			    <div class="table-scrollable">
			        <table class="table table-striped table-bordered table-hover">
			            <thead>
			                <tr>
			                    <th scope="col"> Title </th>
			                    <th scope="col"> Meta Title </th>
			                    <th scope="col" style="width: 20%"> Action </th>	                    
			                </tr>
			            </thead>
			            <tbody>
			            	@if (count($contents) >0)
				            	@foreach ($contents as $content)
								    <tr>
					                    <td> {{ $content->title }} </td>
					                    <td> {{ $content->meta_title }} </td>
					                    <td> 
					                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('content.edit',$content->id) }}" ><i class="fa fa-share"></i> Edit
								            </a>&nbsp;
					                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('content.destroy',$content->id) }}"
								                onclick="event.preventDefault();if(confirm('Confirm to delete!'
								                         )) document.getElementById('logout-form-{{$content->id}}').submit();"> <i class="fa fa-share"></i> Delete 
								            </a>
								            <form id="logout-form-{{$content->id}}" action="{{ route('content.destroy',$content->id) }}" method="POST" style="display: none;">
								                {{ csrf_field() }}
								                {{ method_field('DELETE') }}
								            </form>
					                     </td>
					                </tr>
								@endforeach
							@else
							<tr>
			                    <td colspan="3"> No records found </td>
			                </tr>
							@endif
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
	</div>	
@endsection