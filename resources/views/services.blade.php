@extends('app')
@section('content')
<section class="inr-wrap inr-wrap-banner">
    <img src="images/srves-banner.jpg"/>
        <div class="slide-text">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="inr-title">
                            <div class="box-title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                                <span class="text-white border-white">Our Services</span>
                            </div>
                            <h2 class="text-white text-center wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">  <span class="text-warning">Illuminate</span> Your <span class="text-warning">Home</span> with Expert <span class="text-warning">Solar</span> Services
                            </h2>    
                            <div class="row align-items-center justify-content-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                    <p class="text-white text-center">
                                        Solar energy is changing the way we live. With depleting fossil fuels and rising energy costs, the shift towards solar energy is now faster than ever.
                                    </p>
                                </div>
                            </div>
                        </div>
					</div>                
                </div>
            </div>
        </div>    
    </section>
    <section class="wrap">
        <div class="container">
            <div class="title text-center">
                <div class="box-title wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <span>Our Services</span>
                </div>
                <h2 class="wow fadeInDown" data-wow-offset="50" data-wow-duration="2s"> <span class="text-warning"> Solar Installation</span> and Services Tailored for <span class="text-warning">every home</span> </h2>
                <div class="row justify-content-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                        <p>We are known for our quality of solar power panels with the maximum durability. We provide the competitive prices of the solar panels and assist our clients to boost their savings.</p>
                    </div>
                </div>
            </div>

            @foreach($services as $index => $service)
            @if($index % 2 == 0)
            <div class="row srvs-row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                    <div class="srvs-img">
                        <img src="{{$service->image}}" alt="{{$service->title}}">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-7 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                    <div class="srvs-dec">
                        <div class="title mb-2">
                            <p><b>{!!$service->title!!}</b></p>
                        </div>
                        <p>{!! $service->content1 !!}</p>
                        <div class="title mb-2">
                            <p>{!!$service->heading!!}</p>
                        </div>
                        <p>{!! $service->headingcontent !!}</p>
                        @if(auth()->check() && auth()->user()->type == '0')
                        <a href="{{ route('dashboard') }}" class="btn btn-warning">Dashboard <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg" alt="Arrow"></a>
                        @else
                        <a href="{{ route('register') }}" class="btn btn-warning">Register with us <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg" alt="Arrow"></a>
                        @endif
                    </div>
                </div>
            </div>
            @else
            <div class="row srvs-row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-7 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                    <div class="srvs-dec">
                        <div class="title mb-2">
                            <p><b>{!!$service->title!!}</b></p>
                        </div>
                        <p>{!! $service->content1 !!}</p>
                        <div class="title mb-2">
                            <p>{!!$service->heading!!}</p>
                        </div>
                        <p>{!! $service->headingcontent !!}</p>
                        @if(auth()->check() && auth()->user()->type == '0')
                        <a href="{{ route('dashboard') }}" class="btn btn-warning">Dashboard <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg" alt="Arrow"></a>
                        @else
                        <a href="{{ route('register') }}" class="btn btn-warning">Register with us <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg" alt="Arrow"></a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                    <div class="srvs-img">
                        <img src="{{$service->image}}" alt="{{$service->title}}">
                    </div>
                </div>
            </div>
            @endif
            @endforeach

<!-- --------------------------- -->
            <section class="wrap process-wrap">
                <div class="container">
                    <div class="title text-center">
                        <div class="box-title wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                            <span>Our Process</span>
                        </div>
                        <h2 class="text-white wow fadeInDown" data-wow-offset="50" data-wow-duration="2s"><span class="text-warning">Solar</span> Installation <span class="text-warning">made</span> simple <span class="text-warning">Seamless</span> solar installation </h2>
                    </div>
                    <div class="process-carousel">
        <!-- Carousel -->
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">
  <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-12 col-sm-5 col-md-4 col-lg-4 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                                            <div class="process-carousel-icon">
                                                <img src="images/process-carousel-img.png"/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-7 col-md-8 col-lg-8 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                                            <div class="process-content">
                                                <div class="process-number">1.</div>
                                                <h3>Register to open an account</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
                                                <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev"><img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous</button>
                                                <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
                                            <div class="process-carousel-icon">
                                                <img src="images/process-carousel-img0.png"/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
                                            <div class="process-content">
              <div class="process-number">2.</div>
            <h3>Book a site survey</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img1.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">3.</div>
            <h3> Surveyor will visit for a site survey</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img2.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">4.</div>
            <h3>Survey details, Quotation, & Design uploaded on the portal</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img3.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">5.</div>
            <h3>Finalization of Proposal & Advance payment</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img4.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">6.</div>
            <h3>Documentation check for feasibility and Net Metering</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img5.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">7.</div>
            <h3>Material Payment and Tracking</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img6.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">8.</div>
            <h3>Installation and Execution of Project</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img7.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">9.</div>
            <h3>Final Checks and approval</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item">
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-lg-4">
            <div class="process-carousel-icon">
            <img src="images/process-carousel-img8.png"/>
            </div>
          </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-8">
          <div class="process-content">
              <div class="process-number">10.</div>
            <h3>Enjoy your Solar Energy with operation and maintenance</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
  <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
   <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
  </button>
  <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">
    Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
  </button>
            </div>
          </div>
        </div>
    </div>
  </div>
  
  
     <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"><img src="images/proccess-indicator-icon.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"><img src="images/proccess-indicator-icon0.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"><img src="images/proccess-indicator-icon1.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"><img src="images/proccess-indicator-icon2.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"><img src="images/proccess-indicator-icon3.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="5"><img src="images/proccess-indicator-icon4.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="6"><img src="images/proccess-indicator-icon5.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="7"><img src="images/proccess-indicator-icon6.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="8"><img src="images/proccess-indicator-icon7.png"/></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="9"><img src="images/proccess-indicator-icon8.png"/></button>
  </div>
</div>
        </div>
    </div>
</section>
@endsection