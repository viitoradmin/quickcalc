<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quick Calculator</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- Styles -->
    <style>
        .error{
            color: red;
        }
        .txt.error{
            border: 1px solid red !important;
        }
        .txt.error:focus{
            outline: none;
        }
        .btn span{
            opacity: 0.5;
            font-size: 47px;
        }
        .btn.active span {
            opacity: 2;
        }
        form_main {
            width: 100%;
        }
        .form_main h4 {
            font-family: roboto;
            font-size: 20px;
            font-weight: 300;
            margin-bottom: 15px;
            margin-top: 20px;
            text-transform: uppercase;
        }
        .heading {
            border-bottom: 1px solid #fcab0e;
            padding-bottom: 9px;
            position: relative;
        }
        .heading span {
            background: #9e6600 none repeat scroll 0 0;
            bottom: -2px;
            height: 3px;
            left: 0;
            position: absolute;
            width: 75px;
        }
        .form {
            border-radius: 7px;
            padding: 6px;
        }
        .txt[type="text"] {
            border: 1px solid #ccc;
            margin: 10px 0;
            padding: 10px 0 10px 5px;
            width: 100%;
        }
        .txt_3[type="text"] {
            margin: 10px 0 0;
            padding: 10px 0 10px 5px;
            width: 100%;
        }
        .txt2[type="submit"] {
            background: #242424 none repeat scroll 0 0;
            border: 1px solid #4f5c04;
            border-radius: 25px;
            color: #fff;
            font-size: 16px;
            font-style: normal;
            line-height: 35px;
            margin: 10px 0;
            padding: 0;
            text-transform: uppercase;
            width: 30%;
        }
        .txt2:hover {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            color: #5793ef;
            transition: all 0.5s ease 0s;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-bottom: 16px solid blue;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center set-box-center form-space">
            <div class="col-md-5 col-md-offset-4 well">
                <div class="form_main">
                    <h4 class="heading"><strong>Quick </strong> calculator <span></span></h4>

                    <form id="calForm">
                        <div class="form">
                        <div class="form-group">
                            <input type="text" required="" placeholder="Please input value 1" value="" required name="value1" id="value1" class="txt">
                        </div>
                        <div class="form-group">
                            <select name="options" required="" id="options" class="txt form-control">
                                <option value=""><span>Select operator</span></option>
                                <option value="+"><span>&#128125;</span> Addition</option>
                                <option value="-"><span>&#x1F480;</span> Subtraction</option>
                                <option value="*"><span>&#128123;</span> Multiplication</option>
                                <option value="/"><span>&#128125;</span> Division</option>

                            </select>
                        </div>
                        <div class="form-group">
                        <input type="text" required="" placeholder="Please input value 2" value=""  required name="value2" id="value2" class="txt">
                        </div>
                        <div class="form-group">
                        <input type="submit" value="submit" id="submit"  name="submit" class="txt2">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Result show here" value=""  name="result" id="result" class="txt">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 set-box-center col-md-offset-1 loader-space" style="margin-top: 20%;">
            <div class="col-md-4 col-md-offset-4"><div class="loader"></div></div>
        </div>

    </div>
</div>
<script>
    $('.loader-space').css('display','none');
    $("#calForm").validate({
        rules: {
            value1: {
                required: true,
                number: true
            },
            value2: {
                required: true,
                number: true
            }
        },
        messages : {
            value1 : {
                required:'Please enter a value',
                number:'Please enter a valid number'
            },
            value2 : {
                required:'Please enter a value',
                number:'Please enter a valid number'
            }
        },
        submitHandler: function(form) {
            $('.form-space').css('display','none');
            $('.loader-space').css('display','');
            var value1 = $("#value1").val();
            var value2 = $("#value2").val();
            var options =  $("#options").val() || '+';
            $.post("{{ route('calculate-data-api') }}", {value1:value1,value2:value2,options: options}, function(result){
                if(result.success==true){
                    setTimeout(function() {
                        $("#result").val(result.data);
                        $('.form-space').css('display', '');
                        $('.loader-space').css('display', 'none');
                    }, 100);
                }
            });
        }
    });
</script>
</body>
</html>
