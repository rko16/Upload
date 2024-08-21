@extends('app')
@section('content')
    <section class="slider-wrap">
        <div class="owl-carousel" id="service-carousel">
            @foreach($banners as $banner)
            <div class="item">
            <!-- <img src="storage/banner/image_1719999354.jpg"/> -->
                <img src="{{$banner->image}}" class="w-100">
            </div>
            @endforeach
        </div>
        <div class="slide-text">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="slider-search">
                            <div class="row justify-content-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-9 col-xl-10">
                                    <h2 class="text-white text-center">
                                    Go <span class="text-warning">Solar</span> and <span class="text-warning">Save Big</span> Amount on Your Home <span class="text-warning">Electricity Bills</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-center">
                                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                    <p class="text-white text-center wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                                        Join the Renewable Energy Revolution with Roofsol Homes! Transform your home into a sustainable solar space by significantly reducing your electricity bills.
                                    </p>
                                    <div class="form-box wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                                        <div class="form-box-search">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label>Solar is required for</label>
                                                    <select class="form-control form-ctrl select-white">
                                                        <option>Select Solar Type</option>
                                                        <option>Residential</option>
                                                        <option>Housing Society </option>
                                                        <option>Commercial</option>
                                                    </select>
                                                </div>
                                                <div class="form-group w-100">
                                                    <label>City</label>
                                                    <select class="form-control form-ctrl select-white">
                                                        <option>Select the city</option>
                                                        @foreach($states as $state)
                                                        <option value="{{$state->generation}}"> {{$state->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group form-group-btn">
                                                    @if(auth()->check() && auth()->user()->type == '0')
                                                    <button type="submit" class="btn btn-block btn-warning" onclick="window.location.href='{{ route('dashboard') }}'">Dashboard</button>
                                                    @else
                                                    <button type="submit" class="btn btn-block btn-warning" onclick="window.location.href='{{ route('register') }}'">Register</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
        </section>
        <section class="wrap" id="AboutUs">
            <div class="container">
                <div class="title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <div class="box-title">
                       <span>Who We Are</span>
                   </div>
                    <h2>Know your <span class="text-warning">Solar Experts</span></h2><h3>We belong to top solar industry leader Roofsol Energy Pvt Ltd </h3>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                                <div class="about-galry">
                                    <img src="{{asset('images/about-galry-img.jpg')}}"/>
                                </div>
                                <div class="about-galry">
                                    <img src="{{asset('images/about-galry-img0.jpg')}}"/>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                                <div class="about-galry about-galry-lg">
                                    <img src="images/about-galry-img1.jpg"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                        <div class="about-galry about-galry-md">
                            <img src="images/about-galry-img2.jpg"/>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                                <div class="about-galry about-galry-sm">
                                    <img src="images/about-galry-img3.jpg"/>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="about-galry about-galry-sm">
                                    <img src="images/about-galry-img4.jpg"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            
                <div class="row justify-content-center text-center wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                        <div class="category-item">
                            <div class="category-img">
                                <img src="images/solar-white.svg"/>
                            </div>
                            <div class="category-dec">
                                <h4>Tailored Solar Installation</h4>
                     
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                        <div class="category-item">
                            <div class="category-img">
                                <img src="images/Simplification-white.svg"/>
                            </div>
                            <div class="category-dec">
                                <h4>Digitalized Experience of setting up a solar plant</h4>
                       
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                        <div class="category-item">
                            <div class="category-img">
                                <img src="images/setting-white.svg"/>
                            </div>
                            <div class="category-dec">
                                <h4>Efficient Module Mounting Structure</h4>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrap bg-info" id="Calculator">
            <div class="container">
                <div class="row">
                <!-- Form Section -->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                        <div class="form-box calculator-form-box h-100">
                            <form action="{{route('calculate.solar')}}" method="POST" id="solarForm" class="h-100">
                                @csrf
                                <div class="login-white-box bg-white h-100">
                                    <div class="box-title text-center">
                                        <span>Solar Calculator</span>
                                    </div>
                                    <div class="title title-border text-center">
                                        <h2>Solar <span class="text-warning">Savings</span> Calculator</h2>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you need solar?</label>
                                        <div class="row btn-check-row">
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <div class="form-check-btn">
                                                    <input type="radio" class="btn-check" name="options" value="1" id="option1" autocomplete="off">
                                                    <label class="btn btn-block btn-outline-info" for="option1">Residential</label>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <div class="form-check-btn">
                                                    <input type="radio" class="btn-check" name="options" value="2" id="option2" autocomplete="off">
                                                    <label class="btn btn-block btn-outline-info" for="option2">Housing Society</label>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <div class="form-check-btn">
                                                    <input type="radio" class="btn-check" name="options" value="3" id="option3" autocomplete="off">
                                                    <label class="btn btn-block btn-outline-info" for="option3">Commercial</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Average Monthly Bill</label>
                                                @if(auth()->check() && auth()->user()->type == '0')
                                                <input type="hidden" name="customerdetail" value="{{ auth()->user()->id }}" class="form-control" id="customerId">
                                                @endif
                                                <input type="number" name="monthlyBill" class="form-ctrl form-control" autocomplete="off" placeholder="00.00" required>
                                                <div class="error"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Average Electricity Cost (Rs/Unit)</label>
                                                <input type="number" name="electricityCost" required class="form-ctrl form-control" autocomplete="off" placeholder="6.5" step="0.01">
                                                <div class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-ctrl form-control" name="generation" required>
                                            <option>Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state->generation}}"> {{$state->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="error"></div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-lg btn-submit btn-block">Click to know more <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg"/></button>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- Result Section -->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                        <div class="form-box result-form-box h-100" id="resultContainer">
                            <div class="login-white-box h-100">
                                <div class="box-title text-center">
                                    <span class="text-white">Result</span>
                                </div>
                                <div class="title text-center title-border">
                                    <h2 class="text-white">Solar Calculations</h2>
                                    <p class="text-white">Lorem ipsum is placeholder text commonly used</p>
                                </div>
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        Solar Plant Capacity (KWp)
                                        <span class="badge" id="capacity">_</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        Space Required (sqft)
                                        <span class="badge" id="space">_</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        Annual Green Energy Generated (sqft)
                                        <span class="badge" id="greenEnergy">_</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        Annual Savings (Rs)
                                        <span class="badge" id="annualSavings">_</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        Price
                                        <span class="badge" id="price">_</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        Subsidy Amount
                                        <span class="badge" id="subsidyamount">_</span>
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6">
                                        @if(auth()->check() && auth()->user()->type == '0')
                                        <button type="button" class="btn btn-white btn-lg btn-submit btn-block" onclick="window.location.href='{{ route('dashboard') }}'"> Dashboard</button>
                                        @else
                                        <button type="button" class="btn btn-white btn-lg btn-submit btn-block" onclick="window.location.href='{{ route('register') }}'"> Register with us</button>
                                        @endif
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <!-- <button type="submit" class="btn btn-white btn-lg btn-submit btn-block">Need a Finance?</button> -->
                                        @if(auth()->check() && auth()->user()->type == '0')
                                            <button type="button" class="btn btn-white btn-lg btn-submit btn-block" onclick="window.location.href='{{ route('financetab', [auth()->user()->id]) }}'">Finance</button>
                                        @else
                                            <button type="button" class="btn btn-white btn-lg btn-submit btn-block" onclick="window.location.href='{{ route('userloginpage') }}'">Login</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrap process-wrap">
            <div class="container">
                <div class="title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <div class="box-title">
                        <span>Our Process</span>
                    </div>
                    <h2 class="text-white"><span class="text-warning">Solar</span> Installation <span class="text-warning">made</span> simple <span class="text-warning">Seamless</span> solar installation </h2>
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
                                            <img src="{{asset('images/process-carousel-img.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7 col-md-8 col-lg-8 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                                        <div class="process-content">
                                            <div class="process-number">1.</div>
                                            <h3>Register to open an account</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
          <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                                <img class="me-1" src="{{asset('images/mingcute_arrow-left-white.svg')}}"> Previous
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
                                            <img src="images/process-carousel-img0.png"/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7 col-md-8 col-lg-8">
                                        <div class="process-content">
                                            <div class="process-number">2.</div>
                                            <h3>Book a site survey</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
          <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                                <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
                                            </button>
                                            <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                  <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                            <img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous
                                            </button>
                                            <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev"><img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous</button>
                                            <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">Next <img class="ms-1" src="images/mingcute_arrow-rgt-white.svg">
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do iusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev"><img class="me-1" src="images/mingcute_arrow-left-white.svg"> Previous</button>
                                            <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">Next <img class="ms-1" src="{{asset('images/mingcute_arrow-rgt-white.svg')}}">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-12 col-sm-5 col-md-4 col-lg-4">
                                        <div class="process-carousel-icon">
                                            <img src="{{asset('images/process-carousel-img8.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7 col-md-8 col-lg-8">
                                        <div class="process-content">
                                            <div class="process-number">10.</div>
                                            <h3>Enjoy your Solar Energy with operation and maintenance</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
              <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev btn-info me-2" type="button" data-bs-target="#demo" data-bs-slide="prev"><img class="me-1" src="{{asset('images/mingcute_arrow-left-white.svg')}}"> Previous</button>
                                            <button class="carousel-control-next btn-warning" type="button" data-bs-target="#demo" data-bs-slide="next">Next <img class="ms-1" src="{{asset('images/mingcute_arrow-rgt-white.svg')}}">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
  
  
     <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"><img src="{{asset('images/proccess-indicator-icon.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"><img src="{{asset('images/proccess-indicator-icon0.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"><img src="{{asset('images/proccess-indicator-icon1.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"><img src="{{asset('images/proccess-indicator-icon2.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"><img src="{{asset('images/proccess-indicator-icon3.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="5"><img src="{{asset('images/proccess-indicator-icon4.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="6"><img src="{{asset('images/proccess-indicator-icon5.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="7"><img src="{{asset('images/proccess-indicator-icon6.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="8"><img src="{{asset('images/proccess-indicator-icon7.png')}}"/></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="9"><img src="{{asset('images/proccess-indicator-icon8.png')}}"/></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrap">
            <div class="container">
                <div class="box-title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <span>Our Services</span>
                </div>
                <div class="title text-center wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                    <h2>Solar <span class="text-warning">Renewable</span> Services for a <span class="text-warning">Greener</span> World</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach($services as $service)
                    <div class="col-12 col-sm-6 col-md-5 col-lg-5 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                        <div class="item-box service-item">
                            @if(isset($service->image))
                                <div class="tmb">
                                    <img src="{{$service->image}}" alt="Service Image" />
                                </div>
                            @endif
                            <div class="item-box-dec">
                                <?php
                                $blog1 = $service->title;
                                $words1 = explode(' ', strip_tags($blog1));
                                $words1 = implode(' ', array_slice($words1, 0, 5));
                                ?>
                                <!-- <p>{!! $words1 !!}...</p> -->
                                <b>{{ $words1 }}...</b>
                                <!-- {!! $service->title !!} -->
                                <?php
                                $blog = $service->content1;
                                $words = explode(' ', strip_tags($blog));
                                $words = implode(' ', array_slice($words, 0, 25));
                                ?>
                                <p>{{ $words }}</p>
                                <!-- <a href="{{ route('services') }}" class="btn btn-warning">Learn More <img src="{{ asset('images/mingcute_arrow-rgt-white.svg') }}" /></a> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="box-title text-center mt-3">
                    <a href="{{ route('services') }}" class="btn btn-warning">View More <img src="{{ asset('images/mingcute_arrow-rgt-white.svg') }}" /></a>
                </div>
            </div>
        </section>
        <section class="wrap bg-light WhyChooseprocess-wrap2">
            <div class="container">
                <div class="box-title text-center">
                    <span>Why Choose Us</span>
                    <!-- choosedata -->
                </div>
                <div class="title text-center">
                    <h2>Why <span class="text-warning">Roofsol homes</span> is best <span class="text-warning">service provider</span></h2>
                </div>
                <ul class="list-inline process-list text-center">
                    @foreach($choosedata as $index => $choose)
                        @if($index % 2 == 0)
                            <li>
                                <div class="process-box wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                                    <div class="process-icon"><img src="{{asset($choose->image)}}"></div>
                                    <div class="process-arrow"><img src="{{asset('images/process-arrow-down-orange.png')}}"/></div>
                                    <h4>{{$choose->message}}</h4>
                                </div>
                            </li>
                        @else
                            <li>
                                <div class="process-box  wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                                    <h4>{{$choose->message}}</h4>
                                    <div class="process-arrow"><img src="{{asset('images/process-arrow-up-orange.png')}}"/></div>
                                    <div class="process-icon"><img src="{{asset($choose->image)}}"></div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="wrap" id="Projects">
            <div class="container">
                <div class="box-title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <span>Latest Project</span>
                </div>
                <ul class="nav nav-pills justify-content-center tabs-nav-border bg-white wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="/public/#Residential">Residential  </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="/public/#Commercial">Commercial </a>
                    </li>         
                </ul>
                <div class="title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                    <h2>Solar Pushing <span class="text-warning">Renewable</span> Project <span class="text-warning">Development</span> </h2>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Residential" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            @foreach($residentialprojects as $residentialproject)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                                <div class="project-item-box">
                                    <!-- <img src="images/project-img4.jpg"/> -->
                                    <img src="{{$residentialproject->image}}">
                                    <div class="project-overlay-content">
                                        <h6 class="text-warning mb-0">
                                            @if(isset($residentialproject->address))
                                            {{ $residentialproject->address }}
                                            @endif | 
                                            @if(isset($residentialproject->power))
                                            {{ $residentialproject->power }}
                                            @endif
                                        </h6>
                                        <h5 class="mb-0">{{$residentialproject->name}}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Commercial" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                        @foreach($commercialprojects as $commercialproject)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="project-item-box">
                                    <img src="{{$residentialproject->image}}"/>
                                    <div class="project-overlay-content">
                                        <h6 class="text-warning mb-0">{{$commercialproject->address}} | {{$commercialproject->power}}</h6>
                                        <h5 class="mb-0">{{$commercialproject->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrap bg-light">
            <div class="container">
                <div class="box-title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                   <span>Our Customer Reviews</span>
                </div>
                <div class="title text-center wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                    <h2>What <span class="text-warning">Customer</span> Say about <span class="text-warning">us</span></h2>
                </div>
                <div class="testimonial_block">
                    <div class="owl-carousel owl-carousel-single">
                    @foreach($reviews as $review)
                        <div class="item">
                          <!-- <h4>1</h4> -->
                            <div class="client_message media">
                                <div class="media-left pe-0">
                                    <div class="testimonial_icon">
                                        <img src="{{$review->image}}"/>
                                    </div>
                                </div>
                                <div class="media-body ps-0">
                                    <p class="rating">
                                        @if($review->rating == '1')
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($review->rating == '2')
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($review->rating == '3')
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($review->rating == '4')
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($review->rating == '5')
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                        <i class="fa fa-star me-1"></i>
                                    @endif
                                    </p>
                                    <p>“{{$review->discription}}”</p>
                                    <div class="client_info">
                                        <div class="name">
                                            <h5>{{$review->name}}</h5>
                                <!-- <h6>Society Member - (5<sup>th</sup> June 2017)</h6> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>

<section class="wrap home-contact" id="Contact">
    <div class="container">
        <div class="box-title text-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
           <span>Contact Us</span>
        </div>
        <div class="title text-center wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
            <h2 class="text-white"><span class="text-warning">Send Us</span> Your <span class="text-warning">Enquiries</span> Here</h2>
        </div>
        <div class="row justify-content-center wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8  col-xl-6">
                <div class="form-box home-form-box">
                    <form action="{{ route('contact') }}" method="POST" enctype="multipart/form-data"   id="form">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control form-ctrl" placeholder="First Name" required/>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control form-ctrl" placeholder="Last Name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 col-sm-2 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control form-ctrl select-white" name="country_code">
                                        <option value="+91">+91</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control form-ctrl" placeholder="000 - 000 - 0000" required/>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control form-ctrl" placeholder="Email ID" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control form-ctrl" placeholder="Subject" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="message" class="form-control form-ctrl" placeholder="Message" required/>
                        </div>

                        <!-- captcha start -->
                        <!-- <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Captcha</label>


                      <div class="col-md-12">
                          <div class="captcha">
                            <img id="captcha" src="{{ captcha_src('flat') }}" alt="captcha">
<a href="#" onclick="event.preventDefault(); document.getElementById('captcha').src = '{{ captcha_src('flat') }}' + Math.random();" class="btn btn-success"><i class="fa fa-refresh"></a>


                          </div>
                          <input id="captcha" type="text" class="form-control form-ctrl" placeholder="Enter Captcha" name="captcha">

                          @if ($errors->has('captcha'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('captcha') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div> -->
                  <!-- Google Recaptcha Widget-->
<!-- <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div> -->
@if(config('services.recaptcha.key'))
    <div class="g-recaptcha" 
        data-sitekey="{{config('services.recaptcha.key')}}">
    </div>
@endif

                    <!-- captcha end -->
                        @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                        @endif
                          <div class="myDIV" id="myDIV" style="display:none; color:red;"><b>Please check captcha.</b></div>
                        <button type="submit" class="btn mt-5 btn-warning btn-lg btn-submit btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
         // alert("bs0ff"); // Test alert to check if script is executing
        $('#solarForm').validate({

            rules: {
                monthlyBill: {
                    required: true,
                    number: true
                },
                electricityCost: {
                    required: true,
                    number: true
                },
                generation: {
                    required: true,
                    
                }
            },
            messages: {
                monthlyBill: {
                    required: 'This field is required.',
                    number: 'Please enter a valid number.'
                },
                electricityCost: {
                    required: 'This field is required.',
                    number: 'Please enter a valid number.'
                },
                generation: {
                    required: 'This field is required.'
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                console.log(error);
                error.appendTo(element.closest('.form-group').find('.error'));
            }
        });

        // Handle form submission
        $('#solarForm').on('submit', function(event) {
            // alert();
            event.preventDefault(); // Prevent form from submitting normally

            // Check if the form is valid
            if ($(this).valid()) {
                $.ajax({
                    url: '{{ route("calculate.solar") }}', // Replace with your actual route
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Log the response for debugging
                        console.log(response);

                        // Update the results on the right side
                        $('#capacity').text(response.capacity);
                        $('#space').text(response.space);
                        $('#greenEnergy').text(response.greenEnergy);
                        $('#annualSavings').text(response.annualSavings);
                        $('#price').text(response.price);
                        $('#subsidyamount').text(response.subsidyamount);
                        // Update the inquiry ID in the order form
                        $('#inquryid').val(response.inquryid);

                        // Show the result container
                        $('#resultContainer').show();
                    },
                    error: function(response) {
                        // Handle error here
                        console.error('An error occurred. Please try again.', response);
                        alert('An error occurred. Please try again.');
                    }
                });
            }
        });
    });
</script>
<script async src="https://www.google.com/recaptcha/api.js"></script>
<script>
  // Get the form element
  var form = document.getElementById('form');

  // Add an event listener to the form's submit event
  form.addEventListener('submit', function(event) {
    // Check if the reCAPTCHA widget has been completed
    if (!grecaptcha.getResponse()) {
      // Prevent the form from being submitted
      event.preventDefault();

      // Display an error message
      // alert('Please complete the reCAPTCHA challenge to submit the form.');
            var x = document.getElementById("myDIV");
      x.style.display = "block";
    }

  });
</script>

@endsection