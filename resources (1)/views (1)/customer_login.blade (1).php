<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<style>
    body {
        margin-top: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-position: center;
        background-size: cover;
    }

    .login-box {
        position: relative;
        width: 470px;
        height: 520px;
        padding: 10px 30px;
        background: #FFF;
        border: 1px solid #ddd;
    }

    .login-header {
        display: flex;
        flex-direction: column;
        text-align: center;
        margin: 20px 0 50px 0;
    }


    .login-header header {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        font-size: 30px;
        margin-bottom: Spx;

    }

    .login-header p {
        color: #555;
    }

    .input-box {
        position: relative;
        width: 100%;
    }

    .input-box label {
        position: absolute;
        top: 15px;
        left: 15px;
        color: #555;
        transition: .15s ease-in-out;
    }

    .input-box .input-field {
        font-size: 1em;
        color: #333;
        padding-left: 15px;
        padding-bottom: 15px;
        padding-top: 15px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: none;
        width: 96%;
        height: 25px;
        margin-bottom: 10px;

    }

    .input-box input[type="password"] {
        margin-bottom: 10px;
    }

    .input-box .input-field:focus {
        border: 2px solid #8749F2;
    }

    .input-field:focus~label,
    .input-field:valid~label {
        top: -8px;
        left: 12px;
        font-size: 12px;
        color: #7931F5;
        background: #FFF;
        padding: 0 5px;
    }

    .input-field:valid~label {
        color: #555;
    }

    .forgot {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;

    }

    section {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #555;
    }

    #check {
        margin-right: 10px;

    }

    section .forgot-link {
        font-weight: 500;
        text-decoration: none;
        color: #7931F5;
    }

    .input-submit {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 15px;
        color: #FFF;
        background: #7931F5;
        border: none;
        border-radius: 5px;
        width: 100%;
        height: 35px;
    }

    .middle-text {
        position: relative;
        width: 100%;
        margin: 30px 0;
    }

    .or-text {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        position: absolute;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #FFF;
        color: #777;
        padding: 15px;
        margin-top: -10px;
    }

    hr {
        border: 1px solid #ddd;
    }

    .social-sign-in {
        display: flex;
        gap: 15px;
    }

    .input-google,
    .input-twitter {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-google {
        width: 100%;
        height: 50px;
        padding: 0 30px;
        background: #FFF;
        border: 1px solid #ccc;
    }

    .input-google img {
        width: 25px;
    }

    .input-google p {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 15px;
        width: 100%;
    }

    .input-twitter {
        justify-content: center;
        width: 70px;
        height: 50px;
        background: #FFF;
        border: 1px solid #CCC;
    }

    .input-twitter img {
        width: 50px;
    }

    .input-google:hover,
    .input-twitter:hover,
    .input-submit:hover {
        opacity: 0.9;
    }

    .sign-up {
        position: absolute;
        bottom: -30px;
        right: 0;
    }

    .no-sign-up {
        position: absolute;
        bottom: -33px;
        left: 0;
    }

    .no-sign-up a {
        text-decoration: none;
        font-size: 15 px;
        color: red;
    }

    .sign-up p {
        font-size: 14px;
    }

    .sign-up p>a {
        text-decoration: none;
    }

    @media only screen and (max-width:510px) {
        .login-box {
            padding: 10px 30px;
            margin: 20px;
        }

    }

    @media only screen and (max-width:415px) {
        .login-box {
            padding: 10px 25px;
            margin: 15px;
        }

    }
</style>

<body>
    <form action="{{URL::to('/login-check')}}" method="post" enctype="multipart/form-data">
        @csrf
        <?php
        use Illuminate\Support\Facades\Session;
        $message = Session::get("message");
        if ($message) {
            echo "<span style='color:red;font-size:20px'>" . $message . "</span>";
            $message = Session::forget("message");
        }
        ?>

        <div class="login-box">
            <div class="login-header">
                <header>Welcome</header>
                <p>We are happy to have you back!</p>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="email" autocomplete="off" required>
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" name="check">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </section>
            </div>
            <div class="input-box">
                <button type="submit" name="signup" class="input-submit">Sign In</button>
            </div>
            <div class="middle-text">
                <hr>
                <p class="or-text">Or</p>
            </div>
            <div class="social-sign-in">
                <button class="input-google">
                    <img src="{{asset('public/backend/images/google.png')}}" alt="">
                    <p>Sign In with Google</p>
                </button>
                <button class="input-twitter">
                    <img src="{{asset('public/backend/images/twitter.png')}}" alt">
                </button>
            </div>
            <div class="sign-up">
                <p>Don't have account <a href="{{URL::to('signup_cus')}}">Sign up</a></p>
            </div>
            <div class="no-sign-up">
                <p><a href="{{URL::to('index')}}">No Sign up</a></p>
            </div>
        </div>
    </form>

</html>