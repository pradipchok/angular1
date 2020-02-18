@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. -'.e($news->meta_title) )
@section('pageKeyword', e($news->meta_keyword) )
@section('pageDescription', e($news->meta_description) )

@section('content')
	<div class="page-content">
		<div class="container">
		<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » <a href="{{route('news.all')}}">News</a> » <span class="bread-para">{{$news->title}}</span></p>			
			{!!$news->description!!}
		</div>
	</div>
@endsection