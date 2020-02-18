@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. -'.e($product->meta_title) )
@section('pageKeyword', e($product->meta_keyword) )
@section('pageDescription', e($product->meta_description) )

@section('content')
	<div class="page-content">
		<div class="container">
		<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » Product » <span class="bread-para">{{$product->title}}</span></p>			
			{!!$product->description!!}
		</div>
	</div>
@endsection