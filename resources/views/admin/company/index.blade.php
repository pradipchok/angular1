
@extends('layouts.app')

@section('content')
	<h1 class="page-title"> Company Management
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
				<a class="btn btn-primary" href="{{ route('company.create') }}">Add New</a>  
			    <div class="table-scrollable">
			        <table class="table table-striped table-bordered table-hover">
			            <thead>
			                <tr>
			                    <th scope="col"> Title </th>			                    
			                    <th scope="col" style="width: 30%"> Image </th>
			                    <th scope="col"> Sequence </th>
			                    <th scope="col"> Status </th>
			                    <th scope="col" style="width: 20%"> Action </th>	                    
			                </tr>
			            </thead>
			            <tbody>
			            	@if (count($company) >0)
				            	@foreach ($company as $n)
								    <tr>
					                    <td> {{ $n->title }} </td>					                    	
					                    <td> <img src="{{ url('/') }}/upload/company/{{$n->image}}" width="20%"> </td>			
					                    <td> {{ $n->sequence }} </td>	                    
					                    <td> @if($n->status==1) <span class="label label-sm label-success"> Active </span>  @else <span class="label label-sm label-warning"> Inactive </span> @endif </td>
					                    <td> 
					                    	<a href="{{ route('company.edit',$n->id) }}"  class="btn dark btn-sm btn-outline sbold uppercase">
								                <i class="fa fa-share"></i> Edit
								            </a>&nbsp;
					                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('company.destroy',$n->id) }}"
								                onclick="event.preventDefault();if(confirm('Confirm to delete!'
								                         )) document.getElementById('logout-form-{{$n->id}}').submit();">
								              <i class="fa fa-share"></i> Delete 
								            </a>
								            <form id="logout-form-{{$n->id}}" action="{{ route('company.destroy',$n->id) }}" method="POST" style="display: none;">
								                {{ csrf_field() }}
								                {{ method_field('DELETE') }}
								            </form>
					                     </td>
					                </tr>
								@endforeach
							@else
							<tr>
			                    <td colspan="5"> No records found </td>
			                </tr>
							@endif
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
	</div>	
@endsection