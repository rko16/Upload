@extends('app')
@section('content')
<section class="login-wrap">
    <div class="container">
        <div class="form-box">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 welcome-login flex-last mt-5">
                <div class="title pt-3">
                    <h2>Our <span class="text-warning"></span>Solar Story <span class="text-warning">Powering</span> a Sustainable Future <span class="text-warning">Solution</span></h2>
                    </div>
                    <div class="login-testimonial">
        <div class="owl-carousel owl-carousel-single">
            @foreach($reviews as $review)
                      <div class="item">
                        <div class="client_message">
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
                            <p>
                              "{{$review->discription}}"
                            </p>
                            <div class="client_info media">
                                <div class="media-left pe-0">
                                  <div class="testimonial_icon">
                                  <img src="{{$review->image}}"/>
                                </div>
                              </div>
                                <div class="media-body ps-0">
                                <div class="name">
                                  <h5 class="mb-0">{{$review->name}}</h5>
                                  <!-- <h6>Co-Founder, Design.co</h6> -->
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      @endforeach
            </div>
       </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                   <div class="login-white-box shadow-none">
                        <div class="title pt-3">
                            <h3>Start your solar  <span class="text-warning">journey</span></h3>
                        </div>
                        
                        <form action="{{ route('getregister') }}" method="POST" enctype="multipart/form-data" id="form">
                          @csrf


                            @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <label>Full Name</label>
                                <input id="name" type="text" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" name="name" required />
                            </div>
                             <div class="form-group">
                                <label>Email address</label>
                                <input id="email" type="email" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" name="email"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-ctrl form-control" autocomplete="off" placeholder="Enter Password" name="password" required/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password_confirmation" type="text" class="form-ctrl form-control" autocomplete="off" placeholder="Confirm Password" name="password_confirmation" required/>
                            </div>
                            <div class="form-group">
                            <label>Mobile Number</label>
                            <div class="input-group">
                            <input type="text" autocomplete="off" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2" id="number" name="number" required>



                            
                            </div>
                            </div>


                            <div class="col-12 col-12 col-lg-12">
                        <div class="form-group">
                        <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
              <label class="form-check-label label-trms" for="invalidCheck">
              I have accept the <a href="#">terms &amp; conditions</a>
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
            </div>
                        </div>
                        
                        <div class="form-group">
                               <button type="submit" class="btn btn-warning btn-lg btn-submit btn-block">Register</button>
                            </div>
                           
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <div class="form-group">
                               <button type="submit" style="display:none;" id="regbtn" class="btn btn-warning btn-lg btn-submit btn-block">Register</button>
                               <!-- <button type="submit" data-bs-toggle="modal"  class="btn btn-warning btn-lg btn-submit btn-block">Verify OTP</button> -->
                            </div>

                            <div class="form-group SignUp-txt text-center">
                                <p>Already have an account? <a href="{{route('userloginpage')}}"> Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="VerifyOTPModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verification Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>-->
      <div class="modal-body form-box otp-box p-0">
                   <div class="login-white-box shadow-none">
                        <div class="title">
                            <h3>Verification Code</h3>
                            <p>Enter the verification code sent on your register mobile number</p>
                        </div>
                        <form action="register.php">
                            <div class="form-group">
                                <input type="hidden" name="otp_value" id="otp_value">
                                                                <input type="number" id="input1" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">

                                                                <input type="number"  id="input2" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">

                                <input type="number" id="input3" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                                <input type="number"  id="input4" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                                <input type="number" id="input5" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                                <input type="number" id="input6" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                            </div>
                            <div class="form-group flex-wrap resend-otp text-center">
            <p class="w-100 mb-1">The new OTP send within <span id="timer"> </span> <span id="timer1" style="display: none;" > </span> seconds </p>
           
            <p class="w-100"><a class="text-decoration-none" id="resend_otp" href="#">Resend OTP</a> </p>
            </div>
                             
                            <div class="form-group">
                                <button id="verifyotp1" type="button" onclick="verifyotp()" class="btn btn-warning  btn-lg btn-submit btn-block">Verify</button>
                            </div>
                        </form>
            </div>
      </div>
      
    </div>
  </div>
</div>

<script>



     var timerOn = false;  // To control the state of the timer
        var timerInterval;
        var initialTime = 300; // 5 minutes in seconds

        function startTimer(remaining) {
             
           
            timerOn = true;  // Start the timer

            $('#timer1').css('display', 'block');
            $('#timer').remove();
            
            function updateTimer() {
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;
              
                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('timer1').innerHTML = m + ':' + s;
              
                remaining -= 1;
              
                if (remaining >= 0 && timerOn) {
                    timerInterval = setTimeout(updateTimer, 1000);
                } else {
                    if (!timerOn) {
                        // Do validate stuff here
                        console.log("Timer was stopped");
                    } else {
                        // Do timeout stuff here
                        $('#verifyotp1').hide();
                    }
                }
            }

            updateTimer();
        }

        startTimer(initialTime); 
//    let timerOn = true;

// function timer(remaining) {

//     $('#timer').val('');
//   var m = Math.floor(remaining / 60);
//   var s = remaining % 60;
  
//   m = m < 10 ? '0' + m : m;
//   s = s < 10 ? '0' + s : s;
//   document.getElementById('timer').innerHTML = m + ':' + s;
  
//   remaining -= 1;
  
//   if(remaining >= 0 && timerOn) {
//     setTimeout(function() {
//         timer(remaining);
//     }, 1000);
//     return;
//   }

//   if(!timerOn) {
//     // Do validate stuff here
//     return;
//   }
  
//   // Do timeout stuff here
 
// }

// timer(235);

        $(document).ready(function() {
            $('#startButton').click(function() {
                stopTimer();  // Ensure the timer stops before starting a new one
                startTimer(initialTime);  // Start timer with 5 minutes (300 seconds)
            });

            $('#stopButton').click(function() {
                stopTimer();
            });
        });


function timer1(remaining) {

 
    $('#timer1').css('display','block');;
    $('#timer1').css('display','block');;
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer1').innerHTML = m + ':' + s;
  
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here
 
}


function  verifyotp()
{  
   


    var verifyotp = $('#otp_value').val();
     var input1 = document.getElementById('input1').value;
            var input2 = document.getElementById('input2').value;
            var input3 = document.getElementById('input3').value;
            var input4 = document.getElementById('input4').value;
            var input5 = document.getElementById('input5').value;
            var input6 = document.getElementById('input6').value;

            // Concatenate the values
            var mergedValue = input1 + input2 + input3 + input4 + input5 + input6;

            

            if(verifyotp == mergedValue)
            {
                $("#VerifyOTPModal").modal("hide");
                swal('Mobile-no verify successfully');
                $('#regbtn').show();
            }else{
                swal('Please Enetr  Valid Otp');
            }

}


    </script>

@endsection
