@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. -'.e($service->meta_title) )
@section('pageKeyword', e($service->meta_keyword) )
@section('pageDescription', e($service->meta_description) )

@section('content')
	<div class="page-content">
		<div class="container">
		<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » Service » <span class="bread-para">{{$service->title}}</span></p>			
			{!!$service->description!!}
		</div>
	</div>
@endsection