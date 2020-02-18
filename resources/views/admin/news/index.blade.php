
@extends('layouts.app')

@section('content')
	<h1 class="page-title"> News Management
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
				<a class="btn btn-primary" href="{{ route('news.create') }}">Add New</a>  
			    <div class="table-scrollable">
			        <table class="table table-striped table-bordered table-hover">
			            <thead>
			                <tr>
			                    <th scope="col"> Title </th>
			                    <th scope="col"> Meta Title </th>
			                    <th scope="col"> Status </th> 
			                    <th scope="col" style="width: 20%"> Action </th>	                    
			                </tr>
			            </thead>
			            <tbody>
			            	@if (count($news) >0)
				            	@foreach ($news as $n)
								    <tr>
					                    <td> {{ $n->title }} </td>
					                    <td> {{ $n->meta_title }} </td>
					                    <td> @if($n->status==1) <span class="label label-sm label-success"> Active </span>  @else <span class="label label-sm label-warning"> Inactive </span> @endif </td>
					                    <td> 
					                    	<a href="{{ route('news.edit',$n->id) }}"  class="btn dark btn-sm btn-outline sbold uppercase">
								                <i class="fa fa-share"></i> Edit
								            </a>&nbsp;
					                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('news.destroy',$n->id) }}"
								                onclick="event.preventDefault();if(confirm('Confirm to delete!'
								                         )) document.getElementById('logout-form-{{$n->id}}').submit();">
								              <i class="fa fa-share"></i> Delete 
								            </a>
								            <form id="logout-form-{{$n->id}}" action="{{ route('news.destroy',$n->id) }}" method="POST" style="display: none;">
								                {{ csrf_field() }}
								                {{ method_field('DELETE') }}
								            </form>
					                     </td>
					                </tr>
								@endforeach
							@else
							<tr>
			                    <td colspan="4"> No records found </td>
			                </tr>
							@endif
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
	</div>	
@endsection