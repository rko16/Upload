@extends('app')
@section('content')
<div class="wrap bg-light">
    <div class="container mt-5 pt-2">
        <div class="form-box">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                     <div class="login-white-box bg-white">
                        <div class="title">
                            <h3>Verification Code</h3>
                            <p>Enter the verification code sent on your register mobile number</p>
                        </div>
                        
                        <form action="{{ route('otp.loginforget') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="otp">Enter OTP:</label>
                                <input type="text" id="otp" name="otp" class="form-ctrl form-control" required>
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
                            
                             <input type="hidden" value="{{!empty($userData['number'])?$userData['number']:''}}" id="number">
                            <input type="hidden" value="{{!empty($user->email)?$user->email:''}}" id="email">
                            <button  id="verifyotp1" type="submit" class="btn btn-warning btn-lg btn-submit btn-block">Verify OTP</button>
                            <div class="form-group flex-wrap resend-otp text-center">
            <p class="w-100 mb-1">The new OTP send within <span id="timer"> </span> seconds </p>
            <p class="w-100"><a style="display:none" class="text-decoration-none" id="resend_otp" href="#">Resend OTP</a> </p>

            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
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
  else {
                      $('#resend_otp').show();
                         // Do timeout stuff here
                        //$('#verifyotp1').hide();
                    }
  
  // Do timeout stuff here
  
}

timer(235);
    </script>


    <script type="text/javascript">
         var timerOn1 = false;  // To control the state of the timer
        var timerInterval;
        var initialTime = 235; // 5 minutes in seconds

        function startTimer(remaining) {
             
           
            timerOn1 = true;  // Start the timer

           
            
            function updateTimer() {
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;
              
                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('timer').innerHTML = m + ':' + s;
              
                remaining -= 1;
              
                if (remaining >= 0 && timerOn1) {
                    timerInterval = setTimeout(updateTimer, 1000);
                } else {
                    if (!timerOn1) {
                        // Do validate stuff here
                        console.log("Timer was stopped");
                    } else {
                        // Do timeout stuff here
                        $('#verifyotp1').hide();
                        $('#resend_otp').show();
                    }
                }
            }

            updateTimer();
        }

        startTimer(initialTime); 
         $(document).ready(function() {
            $('#resend_otp').click(function() {
                $('#verifyotp1').show();
                $('#resend_otp').hide();
                
                startTimer(235);  // Start timer with 5 minutes (300 seconds)
                send();
            });

        });
        
        var site_path = "{{ url('/') }}";
 var csrfToken = '{{ csrf_token() }}'; 

function send() {
    var phoneNumber = $('#number').val();
    var email = $('#email').val();
    $.ajax({
        type: 'POST',
        url: site_path + '/otp-send',
        data: { 
            phone: phoneNumber,
            email: email,
            '_token': csrfToken
        },
        success: function (response) {

            
            
            if (response.success) {
               
                $('#otp_value').val(response.otp);
                $('#number').prop("readonly", true);
                $("#VerifyOTPModal").modal("show");
                //$('#regbtn').show();
            } else {
                   swal(response.message);
            }
        },
        error: function (response) {
           swal('Otp not Send')
        }
    });
}
        
        
    </script>

@endsection
