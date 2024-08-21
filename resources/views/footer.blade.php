<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 fotr-box wow fadeInLeft" data-wow-offset="50" data-wow-duration="2s">
                <div class="fotr-media-item adress">
                    <div class="fotr-logo">
                        <img src="{{asset('images/roofsol-logo.png')}}"/>
                    </div>
                    <p>Transforming to solar with Roofsol</p>
                    <ul class="list-inline hdr-social-link d-flex mb-0">
                        @if(isset($measurementIddata->lndlink))
                        <li>
                            <a href="{{$measurementIddata->lndlink}}" target="_blank">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($measurementIddata->fblink))
                        <li>
                            <a href="{{$measurementIddata->fblink}}" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($measurementIddata->instalink))
                        <li>
                            <a href="{{$measurementIddata->instalink}}" target="_blank">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($measurementIddata->ytlink))
                        <li>
                            <a href="{{$measurementIddata->ytlink}}" target="_blank">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-6 col-sm-3 col-md-2 col-lg-3 wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
                        <div class="fotr-media-item">
                            <h4 class="text-uppercase text-info">Company</h4>
                            <ul class="list-unstyled fotr-menu">
                                <li>
                                    <a href="/#AboutUs">About </a>
                                </li>
                                <li>
                                    <a href="/#Calculator">Solar Calculator </a>
                                </li>
                                <li>
                                    <a href="/#Projects">Projects</a>
                                </li>
                            <!-- <li><a href="#">Career</a></li> -->
                                <li>
                                    <a href="{{route('faqs')}}">Faq's</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 wow fadeInDown" data-wow-offset="50" data-wow-duration="2s">
                        <div class="fotr-media-item">
                            <h4 class="text-uppercase text-info">Services</h4>
                            <ul class="list-unstyled fotr-menu">
                                <li><a href="{{route('services')}}">Solar Installation</a></li>
                                <li><a href="{{route('ormpage')}}">Operation & Maintenance</a></li>
                                <li><a href="{{route('privacypolicy')}}">Privacy policy</a></li>
                                <li><a href="{{route('tnc')}}">Terms & condition</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 col-md-6 col-lg-5 wow fadeInRight" data-wow-offset="50" data-wow-duration="2s">
                        <div class="fotr-media-item">
                            <h4 class="text-uppercase text-info">Connect with us</h4>
                            <div class="media fotr-media">
                                <div class="media-left">
                                    <div class="fotr-media-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6>Call Us</h6>
                                    <p><a href="tel:+{{$measurementIddata->number}}">+{{$measurementIddata->number}}</a></p>
                                </div>
                            </div>
                            <div class="media fotr-media">
                                <div class="media-left">
                                    <div class="fotr-media-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6>Email Us</h6>
                                    <p><a href="mailto:{{$measurementIddata->email}}">{{$measurementIddata->email}}</a></p>
                                </div>
                            </div>
                            <div class="media fotr-media">
                                <div class="media-left">
                                    <div class="fotr-media-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6>Careers</h6>
                                    <p><a href="{{$measurementIddata->hremail}}">{{$measurementIddata->hremail}}</a></p>
                                </div>
                            </div>
                            <div class="media fotr-media">
                                <div class="media-left">
                                    <div class="fotr-media-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6>Address</h6>
                                    <p>1003 & 1703, Lodha Supremus, Saki Vihar Rd, Pawai, Tunga Village, Chandivali, Andheri East, Mumbai, Maharashtra 400072</p>
                                </div>
                            </div>
                    <!--<div class="foter-search">
                        <form class="navbar-form" action="#">
                      <div class="form-group">
                          <label>Subscribe News Letter</label>
                      <div class="d-flex">
                        <input type="text" class="form-control" placeholder="Email ID">
                          <button type="submit" class="btn btn-primary ms-1">Subscribe</button>
                      </div>
                      </div>
                      
                    </form>
                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
        

        </div>
        <section class="cpyrgt-wrap wow fadeInUp" data-wow-offset="50" data-wow-duration="2s">
            <div class="row text-center">
                <div class="col-12 col-sm-12 col-md-12"><p>© Copyright 2024, All Rights Reserved by Roofsol Homes</p></div>
            </div>
        </section>
    </div>

</footer>
    <!-- whatsapp -->
<div class="fixed-links">
    <a class="call" href="tel:+{{$measurementIddata->number}}">
        <i class="fa fa-phone"></i> 
    </a>
    <a class="mail" href="mailto:{{$measurementIddata->email}}">
        <i class="fa fa-envelope"></i> 
    </a>
    <a class="whatsap" href="https://api.whatsapp.com/send?phone={{$measurementIddata->number}}" target="_blank">
        <i class="fa fa-whatsapp"></i> 
    </a>
    <a class="roofsol" href="https://roofsol.com/" target="_blank">
        <img src="{{asset('images/favicon.png')}}"/>
    </a>
</div>