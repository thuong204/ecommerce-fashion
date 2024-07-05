<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/backend/css/login.css')}}">
    <title>Admin_login</title>
</head>

<body>
    <form action="{{URL::to('/admin-dashboard')}}" method="post">
        @csrf
        <div class="login-box">
            <div class="login-header">
                <header>SIGN IN NOW</header>
            </div>
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get("message");
            if ($message) {
                echo "<span style='color:black;font-size:20px'>" . $message . "</span>";
                $message = Session::forget("message");
            }
            ?>
            <div class="input-box">
                <input type="text" class="input-field" name="admin_email" autocomplete="on" required>
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="admin_password" autocomplete="off" required>
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
                <button type="submit" name="signup" class="signin">Sign In</button>
            </div>
        </div>
    </form>

</html>