<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
    .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1998;
    }
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-weight: 300;
    }
    body {
        font-family: 'Tajawal', sans-serif;
        color: white;
        font-weight: 300;
    }
    body ::-webkit-input-placeholder {
        /* WebKit browsers */
        color: white;
        font-weight: 300;
        font-family: 'Tajawal', sans-serif;
    }
    body :-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    font-family: 'Tajawal', sans-serif;
        color: white;
        opacity: 1;
        font-weight: 300;
    }
    body ::-moz-placeholder {
        /* Mozilla Firefox 19+ */
        font-family: 'Tajawal', sans-serif;
        color: white;
        opacity: 1;
        font-weight: 300;
    }
    body :-ms-input-placeholder {
        /* Internet Explorer 10+ */
        font-family: 'Tajawal', sans-serif;
        color: white;
        font-weight: 300;
    }
    .wrapper {
        background: #536DFE;
        background: -webkit-gradient(linear, left top, right bottom, from(#536DFE), to(#4B62E5));
        background: linear-gradient(to bottom right, #536DFE 0%, #4B62E5 100%);
        position: absolute;
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
    }
    .wrapper.form-success .container h1 {
        -webkit-transform: translateY(85px);
                transform: translateY(85px);
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 80px 0;
        height: 400px;
        text-align: center;
    }
    .container h1 {
        font-family: 'Tajawal', sans-serif;
        font-weight: 700 !important;
        font-size: 40px;
        -webkit-transition-duration: 1s;
                transition-duration: 1s;
        -webkit-transition-timing-function: ease-in-put;
                transition-timing-function: ease-in-put;
        font-weight: 200;
    }
    form {
        padding: 20px 0;
        position: relative;
        z-index: 2;
    }
    form input {
        font-family: 'Tajawal', sans-serif;
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        outline: 0;
        border: 1px solid rgba(255, 255, 255, 0.4);
        background-color: rgba(255, 255, 255, 0.2);
        width: 250px;
        border-radius: 3px;
        padding: 10px 15px;
        margin: 0 auto 10px auto;
        display: block;
        text-align: center;
        font-size: 18px;
        color: white;
        -webkit-transition-duration: 0.25s;
                transition-duration: 0.25s;
        font-weight: 300;
    }
    form input:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }
    form input:focus {
        background-color: white;
        width: 300px;
        color: #536DFE;
    }
    form button {
        font-family: 'Tajawal', sans-serif;
        font-weight: 700;
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        outline: 0;
        background-color: white;
        border: 0;
        padding: 10px 15px;
        color: #4b62e5;
        border-radius: 3px;
        width: 250px;
        cursor: pointer;
        font-size: 18px;
        -webkit-transition-duration: 0.25s;
                transition-duration: 0.25s;
    }
    form button:hover {
        background-color: #f5f7f9;
    }
    .bg-bubbles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    .bg-bubbles li {
        position: absolute;
        list-style: none;
        display: block;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.15);
        bottom: -160px;
        -webkit-animation: square 25s infinite;
        animation: square 25s infinite;
        -webkit-transition-timing-function: linear;
        transition-timing-function: linear;
    }
    .bg-bubbles li:nth-child(1) {
        left: 10%;
    }
    .bg-bubbles li:nth-child(2) {
        left: 20%;
        width: 80px;
        height: 80px;
        -webkit-animation-delay: 2s;
                animation-delay: 2s;
        -webkit-animation-duration: 17s;
                animation-duration: 17s;
    }
    .bg-bubbles li:nth-child(3) {
        left: 25%;
        -webkit-animation-delay: 4s;
                animation-delay: 4s;
    }
    .bg-bubbles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        -webkit-animation-duration: 22s;
                animation-duration: 22s;
        background-color: rgba(255, 255, 255, 0.25);
    }
    .bg-bubbles li:nth-child(5) {
        left: 70%;
    }
    .bg-bubbles li:nth-child(6) {
        left: 80%;
        width: 120px;
        height: 120px;
        -webkit-animation-delay: 3s;
                animation-delay: 3s;
        background-color: rgba(255, 255, 255, 0.2);
    }
    .bg-bubbles li:nth-child(7) {
        left: 32%;
        width: 160px;
        height: 160px;
        -webkit-animation-delay: 7s;
                animation-delay: 7s;
    }
    .bg-bubbles li:nth-child(8) {
        left: 55%;
        width: 20px;
        height: 20px;
        -webkit-animation-delay: 15s;
                animation-delay: 15s;
        -webkit-animation-duration: 40s;
                animation-duration: 40s;
    }
    .bg-bubbles li:nth-child(9) {
        left: 25%;
        width: 10px;
        height: 10px;
        -webkit-animation-delay: 2s;
                animation-delay: 2s;
        -webkit-animation-duration: 40s;
                animation-duration: 40s;
        background-color: rgba(255, 255, 255, 0.3);
    }
    .bg-bubbles li:nth-child(10) {
        left: 90%;
        width: 160px;
        height: 160px;
        -webkit-animation-delay: 11s;
                animation-delay: 11s;
    }
        @-webkit-keyframes square {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }
        100% {
            -webkit-transform: translateY(-700px) rotate(600deg);
                    transform: translateY(-700px) rotate(600deg);
        }
        }
        @keyframes square {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }
        100% {
            -webkit-transform: translateY(-700px) rotate(600deg);
                    transform: translateY(-700px) rotate(600deg);
        }
        }



    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="center">
                <h1>مرحبا</h1>
                <?php
                if(session('failed')){

                    echo  "<div class='display-error'><p style='font-size:20px;color:red'>" . session("failed") ."</p></div>";
                }

                ?>

                <form class="form" action="{{route('login.submit')}}" method="post">
                    @csrf()

                    @if(session()->has('error'))
                        <p >{{session()->get('error')}}</p>
                    @endif
                    <input name="student_id" type="text" placeholder="اسم المستخدم" value="{{old('student_id')}}">
                    @error('student_id')
                        <p >{{$message}}</p>
                    @enderror
                    <input name="password" type="password" placeholder="كلمة السر" required>
                     @error('password')
                        <p>{{$message}}</p>
                    @enderror
                    <button type="submit" id="login-button">تسجيل دخول</button>
                </form>
            </div>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>
</html>
