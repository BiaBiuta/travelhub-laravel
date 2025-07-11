<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class=" col-lg-8 w-100 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form id="formId" class="user" action="/register" method="POST">
                                @csrf
                                <x-form-field class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-form-input type="text"  name="firstName" id="firstName"
                                            placeholder="First Name"/>
                                        <p id="errors_name" class="small"></p>
                                    </div>

                                    <div class=" col-sm-6">
                                        <x-form-input type="text"  name="lastName" id="lastName"
                                            placeholder="Last Name"/>
                                        <p id="errors_last_name" class="small"></p>
                                    </div>

                                </x-form-field>
                                <x-form-field class=" row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-form-input type="email"  name="email" id="email"
                                            placeholder="Email Address"/>
                                        <p id="errors_email" class="small"></p>
                                    </div>

                                    <div class="col-sm-6">
                                        <x-form-input type="text" name="address" id="address"
                                            placeholder="Address"/>
                                        <p id="errors_address" class="small"></p>
                                    </div>


                                </x-form-field>
                                <x-form-field class=" row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-form-input type="password" 
                                            name="password" id="password" placeholder="Password"/>
                                        <p id="errors_password" class="small"></p>

                                    </div>
                                    <div class=" col-sm-6">
                                        <x-form-input type="password" 
                                            name="password_confirmation" id="password_confirmation" placeholder="Repeat Password"/>
                                        <p id="errors_reapeat_password" class="small"></p>
                                    </div>
                                </x-form-field>
                                <x-form-field class="  row">
                                    <!-- <label>Observation</label> -->
                                    <textarea class="form-control " id="observation" name="observation" placeholder="Observation"></textarea>
                                </x-form-field>
                                <x-button-submit id="registerButton" type="submit">
                                    Register Account
                                </x-button-submit>
                            </form>
                            <hr>
                            <div class=" text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>


</html>