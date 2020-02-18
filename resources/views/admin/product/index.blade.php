
@extends('layouts.app')

@section('content')
	<h1 class="page-title"> Product Management
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
				<a class="btn btn-primary" href="{{ route('product.create') }}">Add New</a>  
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
			            	@if (count($products) >0)
				            	@foreach ($products as $product)
								    <tr>
					                    <td> {{ $product->title }} </td>
					                    <td> {{ $product->meta_title }} </td>
					                    <td> 
					                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('product.edit',$product->id) }}" ><i class="fa fa-share"></i> Edit
								            </a>&nbsp;
					                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('product.destroy',$product->id) }}"
								                onclick="event.preventDefault();if(confirm('Confirm to delete!'
								                         )) document.getElementById('logout-form-{{$product->id}}').submit();"> <i class="fa fa-share"></i> Delete 
								            </a>
								            <form id="logout-form-{{$product->id}}" action="{{ route('product.destroy',$product->id) }}" method="POST" style="display: none;">
								                {{ csrf_field() }}
								                {{ method_field('DELETE') }}
								            </form>
					                     </td>
					                </tr>
					                 @if($product->childs->isNotEmpty())
					                 	@foreach ($product->childs as $p)
					                 		<tr>
							                    <td> -->{{ $p->title }} </td>
							                    <td> {{ $p->meta_title }} </td>
							                    <td> 
							                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('product.edit',$p->id) }}" ><i class="fa fa-share"></i> Edit
										            </a>&nbsp;
							                    	<a class="btn dark btn-sm btn-outline sbold uppercase" href="{{ route('product.destroy',$p->id) }}"
										                onclick="event.preventDefault();if(confirm('Confirm to delete!'
										                         )) document.getElementById('logout-form-{{$p->id}}').submit();"> <i class="fa fa-share"></i> Delete 
										            </a>
										            <form id="logout-form-{{$p->id}}" action="{{ route('product.destroy',$p->id) }}" method="POST" style="display: none;">
										                {{ csrf_field() }}
										                {{ method_field('DELETE') }}
										            </form>
							                     </td>
							                </tr>
					                 	@endforeach
					                 @endif
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