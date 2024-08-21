@extends('app')
@section('content')

<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
        
       <div class="account_dashboard">
           <div class="page-header text-center">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-10">
                 <h2>My Dashboard <span class="text-warning">@if($orderdata){{$orderdata->solar_name}}@endif</span></h2>
                <div class="page-header-btns">
                @include('user.sec-header')
                </div>
                </div>
            
            </div>
          </div>
           <div class="row">
           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
               <div class="form-box">
               @include('user.project')
               </div>
               </div>
               </div>
           <div class="row">
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               
           <div class="row">
            @foreach($financedata as $finance)
               <div class="col-6 col-sm-6 col-md-4 col-lg-3 text-center">
                   <div class="partner-logo">
                        <img src="{{asset($finance->image)}}"/>
                   </div>
                </div>
            @endforeach
                <!-- <div class="col-6 col-sm-6 col-md-4 col-lg-3 text-center">
                   <div class="partner-logo">
                       <img src="{{asset('asset2/images/partner-logo0.png')}}"/>
                   </div>
               </div>
               <div class="col-6 col-sm-6 col-md-4 col-lg-3 text-center">
                   <div class="partner-logo">
                        <img src="{{asset('asset2/images/partner-logo0.png')}}"/>
                   </div>
               </div>
               <div class="col-6 col-sm-6 col-md-4 col-lg-3 text-center">
                    <div class="partner-logo">
                       <img src="{{asset('asset2/images/partner-logo0.png')}}"/>
                   </div>
               </div> -->
           </div>

           <div class="loan-calculator">
        <div class="top">
            <h2>Loan EMI Calculator</h2>

            <form action="#">
                <div class="group">
                    <div>
                        <div class="title">Amount </div>
                        <input class="loan-amount" type="text" value="30000" />
                    </div>

                    <div>
                        <div class="title">Interest Rate (in %)</div>
                        <input class="interest-rate" type="text" value="8.5" />
                    </div>

                    <div>
                        <div class="title">Tenure (in months)</div>
                        <input class="loan-tenure" type="text" value="240" />
                    </div>
                </div>
                <!-- <div class="groups">
                    <div>
                        <div class="title">Processing Fees (P) (in %)</div>
                        <input class="processing-fee" type="text" value="1.2" />
                    </div>

                    <div>
                        <div class="title">Down Payment (D)</div>
                        <input class="down-payment" type="text" value="3000" />
                    </div>
                </div> -->
            </form>
            <div class="group1">
                <button class="calculate-btn">Calculate</button>
            </div>
        </div>

        <div class="result">
            <div class="left">
                <!-- <div class="total-down-payment">
                    <h3>Total Down Payment (TDP)<br />(TDP = D + P)</h3>
                    <div class="value">12</div>
                </div> -->

                <div class="loan-emi">
                    <h3>Loan EMI </h3>
                    <div class="value">123</div>
                </div>

                <div class="total-interest">
                    <h3>Total Interest Payable </h3>
                    <div class="value">1234</div>
                </div>

                <div class="total-amount">
                    <h3>Total Payment </h3>
                    <div class="value">12345</div>
                </div>
            </div>

            <div class="right">
                <canvas height="400" id="myChart" width="400"></canvas>
            </div>
        </div>
    </div>
       </div>
           </div>
      
      </div> 
		</div>
    </section>
    <style type="text/css">
        .loan-calculator {
            font-family: "Inter", sans-serif;
            margin: 30px auto;
            width: 98%;
            background: #fff;
            box-shadow: 12px 12px 50px -11px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            color: #14213d;
            overflow: hidden;
            display: flex;
            flex-direction: row;
            padding-bottom: 0px;
        }

        .loan-calculator,
        .loan-calculator * {
            box-sizing: border-box;
        }

        .loan-calculator .top {
            background: #43A2AD;
            color: #fff;
            padding: 32px;
            width: 50%;
        }

        .loan-calculator .top h2 {
            margin-top: 0;
        }

        .loan-calculator form {
            padding-right: 10px;
            padding-left: 10px;
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 30px;
            justify-content: space-between;
        }

        /* .loan-calculator form .group {
            display: flex;
            flex-direction: row;
            gap: 10px;
            padding-bottom: 4px;
            justify-content: space-between;
        } */

        .loan-calculator form .group {
            display: flex;
            flex-direction: column;
            gap: 25px;
            padding-bottom: 40px;
            justify-content: space-between;
        }

        .loan-calculator form .groups {
            display: flex;
            flex-direction: row;
            gap: 15px;
            justify-content: center;
        }

        .loan-calculator .title {
            margin-bottom: 12px;
        }

        .loan-calculator form input {
            font-size: 20px;
            padding: 8px 20px;
            border-radius: 10px;
            width: 100%;
            color: #000;
        }

        .loan-calculator .result {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 32px;
        }

        .loan-calculator .result .left {
            width: 100%;
            padding: 8px 32px;
        }

        .loan-calculator .left h3 {
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .loan-calculator .result .value {
            font-size: 30px;
            font-weight: 900;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(20, 33, 61, 0.2);
        }

        .loan-calculator .result .value::before {
            content: "\20B9";
            font-size: 27px;
            font-weight: 400;
            margin-right: 6px;
            opacity: 0.4;
        }

        .loan-calculator .group1 {
            padding-top: 32px;
            text-align: center;
        }

        .loan-calculator .group1 .calculate-btn {
            background: #F6931D;
            color: #fff;
            border: none;
            padding: 8px 32px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 900;
            cursor: pointer;
            margin: 24px 0;
        }

        .loan-calculator .right {
            width: 50%;
        }

        @media (max-width: 650px) {
            .loan-calculator {
                width: 90%;
                max-width: 500px;
                min-height: 1400px;
            }

            .loan-calculator form .group {
                flex-direction: column;
                gap: 20px;
            }

            .loan-calculator form .groups {
                flex-direction: column;
                gap: 20px;
            }

            .loan-calculator .result {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
    <script>

        const loanAmountInput = document.querySelector(".loan-amount");
        const interestRateInput = document.querySelector(".interest-rate");
        const loanTenureInput = document.querySelector(".loan-tenure");
        // const processingFeeInput = document.querySelector(".processing-fee");
        // const downPaymentInput = document.querySelector(".down-payment");

        const loanEMIValue = document.querySelector(".loan-emi .value");
        const totalInterestValue = document.querySelector(".total-interest .value");
        const totalAmountValue = document.querySelector(".total-amount .value");
        // const totalDownPaymentValue = document.querySelector(".total-down-payment .value");

        const calculateBtn = document.querySelector(".calculate-btn");

        let loanAmount = parseFloat(loanAmountInput.value);
        let newAmount = 0;
        for (let i = 0; i < 1; i++) {
            newAmount = loanAmount;
        }
        let interestRate = parseFloat(interestRateInput.value);
        let loanTenure = parseFloat(loanTenureInput.value);
        // let processingFee = parseFloat(processingFeeInput.value);
        // let downPayment = parseFloat(downPaymentInput.value);

        let interest = interestRate / 12 / 100;
        // let processFee = processingFee / 100;

        let myChart;

        const checkValues = () => {
            let loanAmountValue = loanAmountInput.value;
            let interestRateValue = interestRateInput.value;
            let loanTenureValue = loanTenureInput.value;
            // let processingFeeValue = processingFeeInput.value;
            // let downPaymentValue = downPaymentInput.value;

            let regexNumber = /^[0-9]+$/;
            if (!loanAmountValue.match(regexNumber)) {
                loanAmountInput.value = "20000";
            }

            if ((!loanTenureValue.match(regexNumber)) || (loanTenureValue > 360)) {
                loanTenureInput.value = "180";
            }

            // if ((!downPaymentValue.match(regexNumber)) || (downPaymentValue > newAmount)) {
            //     downPaymentInput.value = "2000";
            // }

            let regexDecimalNumber = /^(\d*\.)?\d+$/;
            if (!interestRateValue.match(regexDecimalNumber)) {
                interestRateInput.value = "7.5";
            }
            // if (!processingFeeValue.match(regexDecimalNumber)) {
            //     processingFeeInput.value = "1.2";
            // }
        };

        const displayChart = (totalInterestPayableValue, processingFees) => {
            const ctx = document.getElementById("myChart").getContext("2d");
            myChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ["Total Interest", "Principal Loan Amount"],
                    datasets: [
                        {
                            data: [totalInterestPayableValue, loanAmount],
                            backgroundColor: ["#43A2AD", "#F6931D"],
                            borderWidth: 0,
                        },
                    ],
                },
            });
        };

        const updateChart = (totalInterestPayableValue) => {
            myChart.data.datasets[0].data[0] = totalInterestPayableValue;
            myChart.data.datasets[0].data[1] = loanAmount;
            // myChart.data.datasets[0].data[2] = processingFees;
            myChart.update();
        };

        const refreshInputValues = () => {
            loanAmount = parseFloat(loanAmountInput.value);
            interestRate = parseFloat(interestRateInput.value);
            loanTenure = parseFloat(loanTenureInput.value);
            // processingFee = parseFloat(processingFeeInput.value);
            // downPayment = parseFloat(downPaymentInput.value);
            interest = interestRate / 12 / 100;
            // processFee = processingFee / 100;
        };

        const calculateEMI = () => {
            checkValues();
            refreshInputValues();
            // loanAmount = loanAmount - downPayment;
            loanAmount = loanAmount
            let emi =
                loanAmount *
                interest *
                (Math.pow(1 + interest, loanTenure) /
                    (Math.pow(1 + interest, loanTenure) - 1));

            return emi;
        };

        const updateData = (emi) => {
            loanEMIValue.innerHTML = Math.ceil(emi);

            // let processingFees = Math.ceil(loanAmount * processFee);

            // let totalDownPay = Math.ceil(downPayment + processingFees);
            // totalDownPaymentValue.innerHTML = totalDownPay;

            let totalAmount = Math.ceil(loanTenure * emi);
            totalAmountValue.innerHTML = totalAmount;

            let totalInterestPayable = Math.ceil(totalAmount - loanAmount);
            totalInterestValue.innerHTML = totalInterestPayable;

            if (myChart) {
                updateChart(totalInterestPayable);
            } else {
                displayChart(totalInterestPayable);
            }
        };

        const init = () => {
            let emi = calculateEMI();
            updateData(emi);
        };

        init();

        calculateBtn.addEventListener("click", init);
    </script>
@endsection