@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. -'.e($content->meta_title) )
@section('pageKeyword', e($content->meta_keyword) )
@section('pageDescription', e($content->meta_description) )

@section('content')

	<section class="container">
		<div class="service-sec">
			{!!$content->description!!}
		</div>
	</section>
@if (count($company) >0)

	<!--about-sec start-->
	<section class="about-sec">
	    <div class="container">
	        <div class="about-innr-sec">
	            <ul>
	            	@foreach ($company as $c)
	            		<li><img src="{{ url('/') }}/upload/company/{{$c->image}}" alt="{{$c->title}}" title="{{$c->title}}" /></li>
	            	@endforeach
	            	
	            </ul>
	        </div>
	    </div>
	</section>
	<!--about-sec end-->
	@endif

@endsection