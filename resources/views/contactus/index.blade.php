@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. - '.e($content->meta_title))
@section('pageKeyword', e($content->meta_title) )
@section('pageDescription', e($content->meta_title) )

@section('content')
	<div class="page-content">
		<div class="container">
			<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » <span class="bread-para">Contact Us</span></p>			
			{!! $content->description !!}	
			@include('contactus.new')		
		</div>
	</div>
@endsection