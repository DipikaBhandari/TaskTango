<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="container">
    <div id="video-container">
        <video id="loginVideo" autoplay loop muted>
            <source src="/video/tasktangovideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="login-container">
        <h2>You need to Log in first to visit the website</h2>
        <form method='POST'>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Password </label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
            </div>
            <button class="submit-btn" type="submit" name="btnLogin">Login</button>
        </form>
        <form class="register-form" action="/login/register" method="POST">
            <button class="register-btn btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" name="registerSubmit" type="submit">Don't have an account? Sign Up</button>
        </form>

    </div>
</div>

</body>
</html>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #7e8aa6;
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.7); /* slight background color for readability */
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        width: 500px;
    }

    .login-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #loginVideo {
        width: 100%;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .submit-btn {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #007bff; /* primary color */
        color: white;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #0056b3; /* darker shade of primary color on hover */
    }

    .register-btn {
        background: none;
        border: none;
        color: #007bff; /* primary color */
        cursor: pointer;
    }

    .register-btn:hover {
        text-decoration: underline;
    }

</style>