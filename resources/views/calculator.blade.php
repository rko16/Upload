<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Savings Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .result-container {
            background-color: #eaf8fa;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #ffa500;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #e69500;
        }
        .errorTxt {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-container">
                <h3>Solar Savings Calculator</h3>
                <form id="solarForm" action="{{ route('calculate') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="solarType">Do you need solar?</label>
                        <div id="solarType" class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active m-2">
                                <input type="radio" name="options" value="1" id="residential" checked> Residential
                            </label>
                            <label class="btn btn-secondary m-2">
                                <input type="radio" name="options" value="2" id="housingSociety"> Housing Society
                            </label>
                            <label class="btn btn-secondary m-2">
                                <input type="radio" name="options" value="3" id="commercial"> Commercial
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="monthlyBill">Average Monthly Bill</label>
                        <input type="hidden" name="customerdetail" value="{{ $auth->id }}" class="form-control" id="customerId">
                        <input type="number" name="monthlyBill" class="form-control" id="monthlyBill" placeholder="00000" value="{{ old('monthlyBill') }}">
                        <div class="errorTxt"></div>
                    </div>
                    <div class="form-group">
                        <label for="electricityCost">Average Electricity Cost (Rs/Unit)</label>
                        <input type="number" name="electricityCost" class="form-control" id="electricityCost" step="0.01" value="{{ old('electricityCost') }}">
                        <div class="errorTxt"></div>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <select class="form-control" id="state" name="generation">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                                <option value="{{$state->generation}}"> {{$state->name}} </option>
                            @endforeach
                        </select>
                        <div class="errorTxt"></div>
                    </div>
                    <input type="submit" class="btn btn-custom btn-block" value="Click to calculate">
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div id="resultContainer" class="result-container">
                <h3>Solar Calculations</h3>
                <ul class="list-group" >
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Solar Plant Capacity (KWp)
                        <span id="capacity">_____</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Space Required (sqft)
                        <span id="space">_____</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Annual Green Energy Generated (sqft)
                        <span id="greenEnergy">_____</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Annual Savings (Rs)
                        <span id="annualSavings">_____</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Price
                        <span id="price">_____</span>
                    </li>
                </ul>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="order" value="1">
                    <input type="hidden" name="id" id="inquryid" value="inquryid">
                    <input type="submit" class="btn btn-custom btn-block" value="Order">
                </form>
                <a href="{{ route('home') }}">
                    <button type="button" class="btn btn-outline-secondary btn-block mt-2">Cancel</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        jQuery(function($) {
        var validator = $('#solarForm').validate({
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
                    required: true
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
                error.appendTo(element.closest('.form-group').find('.errorTxt'));
            }
        });
    });

        $('#solarForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            if ($(this).valid()) {
                $.ajax({
                    url: '{{ route("calculate") }}',
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
</body>
</html>
