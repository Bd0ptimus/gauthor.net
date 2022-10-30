<!DOCTYPE html>
<html class="no-js">
@include('layouts.layoutMaster')
@include('layouts.auth.authLayoutsStyle')
<body>


    <div id="page" style="height:auto;">
        @include('layouts.navbar1')
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="{{env('APP_URL')}}/loving-web/public/front/images/icons/login-icon/login.jpg" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" name="login" action="{{ route('auth.login') }}" method="post" enctype="multipart/form-data"> @csrf
                        <span class="login100-form-title">
                            {{isset($reloginMessage)?$reloginMessage:'Hello'}}
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email" value={{old('email')}}>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        @if ($errors->has('email'))
                            <small class="text-danger"> {{ $errors->first('email') }} </small><br>
                        @endif
                        @if ($errors->has('password'))
                            <small class="text-danger"> {{ $errors->first('password') }} </small><br>
                        @endif

                        @if (\Session::has('pass_email_error'))
                            <small class="text-danger"> {{ \Session::get('pass_email_error')}} </small><br>
                        @endif

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" value="Login" name="login-btn">
                                Đăng nhập
                            </button>
                        </div>



                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Quên
                            </span>
                            <a class="txt2" href="{{route('auth.forgot.index')}}">
                                Mật khẩu?
                            </a>
                        </div>

                        {{-- <div class="text-center p-t-136">
                            <a class="txt2" href="#">
                                Create your Account
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>

    </div>
    @extends('layouts.footer')
    @include('layouts.auth.authLayoutsScript')

</body>
</html>
