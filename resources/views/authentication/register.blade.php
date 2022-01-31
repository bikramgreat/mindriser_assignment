<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="theme_layout/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="theme_layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="theme_layout/dist/css/adminlte.min.css">

    <style>
        .form_error_p
        {
            color: red;
        }
        #school_logo_div
        {
            background: #aec3f;
            height:100px;
        }

        #School_image_logo
        {
            height: 100px;
            width: 100%;
            border-radius: 10%;

        }

        @media (max-width: 1000px)
        {
            #school_logo_div
            {
                background: #aec3f;
                height:180px;
            }


            #School_image_logo
            {
                height: 180px;
            }


        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="index2.html" class="logo">
            <span class="logo-lg"><b>BuyAndSell</b>Saman</span>
        </a>
    </div>


    {{--        @if($errors->any())--}}
    {{--          @foreach($errors->all() as $error)--}}
    {{--              <li>{{$error}}</li>--}}
    {{--            @endforeach--}}
    {{--        @endif--}}

    <div class="card">
        <div class="card-body register-card-body">
            <form action="{{route('authentication.user-register')}}" method="Post"  name="signup_form" enctype="multipart/form-data">
                @csrf
                <div class="form-group has-feedback">
                    <label>Name  <span style="color: red">*</span> :</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" value="{{old('name')}}" required name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-asterisk"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form_error_p" id="form_error_first_name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group has-feedback">
                    <label>contact Email:</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" oninput="email_vlidation('contactEmail','form_error_email')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="form_error_p" id="form_error_email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>




                <div class="form-group has-feedback">
                    <label id="label_password">Password<span style="color: red">*</span> :</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="" required oninput="password_strangth('password')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form_error_p" id="form_error_password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>



                <div class="form-group has-feedback">
                    <label>Retype password  <span style="color: red">*</span> :</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" value="" oninput="password_conformation_check('password','repassword','form_error_repassword')" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="form_error_p" id="form_error_repassword"><p></p></div>
                    </div>
                </div>


                <div class="row">

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <a href="login" class="text-center">already have a membership go to login</a>
    </div>




    <!-- /.form-box -->
</div>
<!-- /.register-box -->


<!-- jQuery -->
<script src="theme_layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="theme_layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="theme_layout/dist/js/adminlte.min.js"></script>
<script>
    $(function () {
        $("#phoneNumber").inputmask({"mask": "9999999999"});

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });

    $('.form-control').on('input',function () {
        // alert('fdsaf')
        $('.form_error_p').html('')

    });
</script>
</body>
</html>

