@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. -'.e($content->meta_title) )
@section('pageKeyword', e($content->meta_keyword) )
@section('pageDescription', e($content->meta_description) )

@section('content')

	<div class="page-content">
		<div class="container">
		<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » <span class="bread-para">About Us</span></p>			
			{!!$content->description!!}
		</div>
	</div>

	

@endsection