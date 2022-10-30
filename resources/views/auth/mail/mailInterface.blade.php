{{-- <html>
<head>
    <title>Activation Email - Allaravel.com</title>
</head>
<body>
    <p>
        Chào mừng {{ $user->name }} đã đăng ký thành viên tại Allaravel.com. Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
        </br>
        <a href="{{ $user->activation_link }}">{{ $user->activation_link }}</a>
    </p>
</body>
</html> --}}



<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>

    <style>
        html *{
            /* font-family: Montserrat; */
        }
        body{
            background-image: url('https://i.postimg.cc/QxDVWsDh/8b8022afd5e5decd8d228d72f1ce2bcb.png');
            display:block;
            justify-content: center;
        }

        .click-btn{
            padding : 20px 40px;
            background-color: pink;
            color : white;
            border-radius : 30px 30px 30px 30px;
            text-decoration: none;
        }

        .click-btn:hover{
            border:1px solid pink;
            background-color: white;
            color:pink;
            transition: 0.5s;
        }
        .text-container{
            display:flex;
            justify-content: center;
        }
    </style>
<body class ="body" style="background-image: url('https://i.postimg.cc/QxDVWsDh/8b8022afd5e5decd8d228d72f1ce2bcb.png'); display:block; justify-content: center; ">
    @php if($user->gender==1){ //user la nam
        $vocative = "em";
    }else{
        $vocative = "anh";
    }
    @endphp
    <div class = 'text-container'>
        <h1>
            Hế lô {{$user->nickname}} của {{$vocative}}!
        </h1>
    </div>
    <div class = 'text-container'>
        <p>
            Ơ kìa! Lại quên mật khẩu hỏ? Lần sau đừng quên nữa tình yêu nha!
        </p>
    </div>
    <div class = 'text-container'>
        <p>
            Bấm vào đây để đặt lại mật khẩu nè.
        </p>
    </div>
    <div class = 'text-container'>
        <a href="{{$user->activation_link}}" class="click-btn">Bấm vào đây nè</a>
    </div>



</body>
</html>
