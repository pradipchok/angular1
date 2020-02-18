@extends('layouts.front')

@section('pageTitle', 'Redshift Environmental Systems (I) PVT. LTD. - search')
@section('pageKeyword', 'Search' )
@section('pageDescription', 'Search' )

@section('content')
	<div class="page-content">
		<div class="container">
			<p id="breadcrumb"><a href="{{url('/')}}">Home</a> » <span class="bread-para">Search</span></p>						
			<h1>Search</h1>	
			<h3>Search</h3>					
			<hr/>
			@if(count($products) >0)
				@foreach($products as $p)		            	                
						<p style="text-align: justify;"><strong>{{ $p->title }}</strong>
						<span style="text-decoration: underline;"><span style="color: #2d307d; text-decoration: underline;"><a title="{{ $p->title }}" href="{{ url('/') }}/products/{{$p->id}}/{{canonicalise($p->title)}}"><span style="color: #2d307d; text-decoration: underline;">Read More</span></a></span></span></p>
					<hr size="1">
		        @endforeach 
	        @endif


	        @if(count($services) >0)
				@foreach($services as $s)		            	                
						<p style="text-align: justify;"><strong>{{ $s->title }}</strong>
						<span style="text-decoration: underline;"><span style="color: #2d307d; text-decoration: underline;"><a title="{{ $s->title }}" href="{{ url('/') }}/service/{{$s->id}}/{{canonicalise($s->title)}}"><span style="color: #2d307d; text-decoration: underline;">Read More</span></a></span></span></p>
					<hr size="1">
		        @endforeach 
	        @endif

	        @if (count($news) >0)
				@foreach ($news as $n)
					<p style="text-align: justify;"><strong>{{ $n->title }}</strong><br>
					{{ $n->short_description }}
					<br>
					<span style="text-decoration: underline;"><span style="color: #2d307d; text-decoration: underline;"><a title="{{ $n->title }}" href="{{url('/')}}/news-article/{{$n->id}}/{{canonicalise($n->title)}}"><span style="color: #2d307d; text-decoration: underline;">Read the full article</span></a></span></span></p>
					<hr size="1">
				@endforeach
			@endif

			@if (count($contents) >0)
            	@foreach ($contents as $content)
            		<p style="text-align: justify;"><strong>{{ $content->title }}</strong>
					<span style="text-decoration: underline;"><span style="color: #2d307d; text-decoration: underline;"><a title="{{ $content->title }}" href="{{url('/')}}/@if($content->id!=1){{canonicalise($content->title)}}@endif"><span style="color: #2d307d; text-decoration: underline;">Read More</span></a></span></span></p>
					<hr size="1">
            	@endforeach
			@endif	            	
		</div>
	</div>
@endsection