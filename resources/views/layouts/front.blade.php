<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('pageTitle')</title>
<meta name="description" content="@yield('pageDescription')">
<meta name="keywords" content="@yield('pageKeyword')"> 
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
<script src="{{ asset('frontend/js/jquery-1.12.1.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

</head>

<body>
    @include('frontend.sidebar')
    <!-- Header top start-->
    <section class="top-container">
        <div class="container">
            <div class="col-md-6">
                <ul class="top-left-container">
                    <li><a href="{{ url('/') }}/{{ canonicalise('contact us') }}"><i class="fa fa-map-marker" aria-hidden="true"></i> Block N, 1st Floor, FL-331, N-331, Baishnabghata, Patuli</a></li>
                    <!-- <li><span>|</span></li>
                    <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 1800 TECPRO (1800 832 776)</a></li> -->
                </ul>
            </div>
            
            <div class="col-md-4">  
                <form role="search" method="POST" action="{{ route('search.index') }}" id="frmSearch">
                    {{csrf_field()}}
                    <div class="search-bar">
                      <input type="text" name="search" id="search" value="Enter your search" onblur="if(this.value.length == 0) this.value='Enter your search';" onclick="if(this.value == 'Enter your search') this.value='';">
                      <button type="submit" name="searchsubmit" id="searchsubmit" class="searchsubmit" >Search</button>
                    </div>
                </form>
            </div>  
            <div class="col-md-2">
                <ul class="pull-right">
                    <li><a target="_blank" href="https://www.facebook.com/Redshift-environmental-Systems-India-Pvt-Ltd-112149500351046/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/saritachatterj4"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/in/redshift-environmental-systems-india-p-ltd-84b118188/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    
                    <li><a target="_blank" href="https://www.youtube.com/channel/UCcOrjMt5iAfAX6Zsio_wBVQ?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    
                </ul>
            </div>
        </div>
    </section>
    <!-- Header top end-->

    <!--header Menu section start-->
    <section class="header" id="myHeader">
      <nav class="navbar">
      <div class="container">
        <div class="col-md-3">
        <div class="navbar-header">
          <a class="navbar-brand logo" href="{{ url('/') }}"><img src="{{ asset('frontend') }}/image/logo.jpg" alt="logo"></a>
        </div>

        </div>
        <div class="col-md-9">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <div class="collapse navbar-collapse no-padding-rgt" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('home.index')}}">Home</a></li>
            <li><a href="{{route('aboutus.index')}}">About Us</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Services
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach($serviceMenu as $m)
                    <li><a href="{{ url('/') }}/services/{{$m->id}}/{{canonicalise($m->title)}}">{{$m->title}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{route('news.all')}}">News</a></li>
            <li><a href="{{route('careers.index')}}">Careers</a></li>
            <li><a href="{{route('contactus.index')}}">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><span class="product-btn" onclick="openNav()">&#9776; Products</span></li>
        </ul>
        </div>
        </div>
      </div>
    </nav>
    </section>
    <!--header menu section end-->
    <!--banner Start -->
        <section class="content">
            <!-- Start WOWSlider.com BODY section -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php $i=0; ?>
                     @foreach($banners as $banner)                    
                        @if($i==0)
                            <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
                        @else
                            <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                        @endif
                        <?php $i++; ?> 
                    @endforeach
                </ol>
                <!-- Wrapper for slides -->
                <?php $i=0; ?>
                <div class="carousel-inner">
                    @foreach($banners as $banner)                    
                    @if($i==0)
                      <div class="item active">
                    @else
                    <div class="item">
                    @endif 
                    <?php $i++; ?>   
                        <img src="{{ asset('upload/banner') }}/{{$banner->image}}" alt="{{$banner->title}}" style="width:100%;">
                      </div>
                    @endforeach
                </div>      
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <div class="banner-btm-sec">
                <div class="container">
                    <div class="col-md-9"><h3>Redshift Environmental Systems (INDIA) PVT. LTD. </h3></div>
                    <div class="col-md-3"><a href="{{ url('/') }}/{{ canonicalise('about us') }}" class="read-btn"><span>Read More </span></a></div>
                </div>
            </div>
        </section>
        <!--banner end-->
         @yield('content')
        

        <!--footer Start-->
        <footer id="secondary-footer">
            <div class="container">
            <div class="col-md-3 wrapper"><img src="{{ asset('frontend') }}/image/logo.jpg" class="footer-logo"></div>
            <div class="col-md-9"><!-- <p class="pull-left"><a href="{{ url('/') }}/{{ canonicalise('Privacy Statement') }}">Privacy Statement</a> </p> -->
            <p class="pull-right">© Copyright Redshift Environmental Systems (I) PVT. LTD. <?php echo date('Y'); ?>.  All rights reserved</p>
            </div>
            </div>
            </div>

        </footer>
        <!--footer end-->

<script type="text/javascript">

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>