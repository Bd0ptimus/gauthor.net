<!DOCTYPE html>
<html class="no-js">
@include('layouts.layoutMaster')
@include('layouts.auth.authLayoutsStyle')
<body>

    <div id="page" style="height:auto;">
        @include('layouts.navbar1')
        <div class="limiter">
            @if(isset($emailExpired))
                <div class="container-login100">

                    <div class="wrap-login100 d-block justify-content-center" style="padding: 250px 50px;">
                        <div class = " d-flex justify-content-center">
                            <h1 style="margin:auto;">{{$emailExpired}} </h1><br>
                        </div>
                    </div>
                </div>
            @else
                <div class="container-login100">
                    @php if($user->gender==1){ //user la nam
                        $vocative = "em";
                        $quote = "Em yêu anh ";
                    }else{
                        $vocative = "anh";
                        $quote = "Anh yêu Em ";
                    }
                    @endphp
                    <div class="wrap-login100 d-block justify-content-center" style="padding: 250px 50px;">
                        <div class = " d-flex justify-content-center">
                            <h1 style="margin:auto;">{{$user->nickname}} của {{$vocative}} check email để đặt lại mật khẩu nha </h1><br>
                        </div>
                        <div class = " d-flex justify-content-center">
                            <h1>{{$quote}} @foreach([1,2,3] as $key) <img src="{{ asset('storage/icons/heart-icon.png') }}"> @endforeach </h1>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
    @extends('layouts.footer')
    @include('layouts.auth.authLayoutsScript')

</body>
</html>
