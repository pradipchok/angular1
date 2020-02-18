@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. - '.e($content->meta_title))
@section('pageKeyword', e($content->meta_title) )
@section('pageDescription', e($content->meta_title) )

@section('content')
	<div class="page-content">
		<div class="container">
		<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » <span class="bread-para">News</span></p>			
			<h1>Latest&nbsp;News</h1>
			@if (count($news) >0)
				@foreach ($news as $n)
					<p style="text-align: justify;"><strong>{{ $n->title }}</strong><br>
					{{ $n->short_description }}
					<br>
					<span style="text-decoration: underline;"><span style="color: #2d307d; text-decoration: underline;"><a title="{{ $n->title }}" href="{{url('/')}}/news-article/{{$n->id}}/{{canonicalise($n->title)}}"><span style="color: #2d307d; text-decoration: underline;">Read the full article</span></a></span></span></p>
					<hr size="1">
				@endforeach
			@endif


			
		</div>
	</div>
@endsection