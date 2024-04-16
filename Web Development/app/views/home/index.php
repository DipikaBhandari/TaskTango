<?php
session_start(); // Start the session

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'];

// Check if the logout form is submitted
if(isset($_POST['logout'])){
    // Unset session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to home page
    header("Location: /");
    exit();
}

// Include header.php only if user is logged in
if ($isLoggedIn) {
    include __DIR__ . '/../header.php';
}
?>
<title>Task Manager</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- Custom styles -->
<style>

    .main-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: calc(100vh - 100px); /* Full viewport height minus header height */
        padding: 0 20px;
    }
    .left-section {
        margin-left: 200px;
        width: 20%;
        z-index: 2; /* Ensure left section appears above background */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }
    .right-section {
        margin-right: 150px;
        width: 80%;
        height: 100%;
        position: relative; /* Set position to relative for absolute positioning of elements */
    }
    .todo-animation {
        position: absolute;
        top: 50%;
        left: 70%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        height: auto;
        z-index: 1; /* Ensure animation appears below text content */
    }
    .text-content {
        text-align: left;
        color: #090000; /* White text color */
        z-index: 2; /* Ensure text content appears above background */
        position: relative; /* Set position to relative for absolute positioning of elements */
    }
    h1 {
        font-size: 40px;
        width: 10%;
        font-weight: bold;
        margin-bottom: 30px;
        color: #5572bd; /* White color for heading */
    }
    p {
        color: #090000; /* White color for paragraph */
        width: 80%; /* Adjust width for better readability */
    }
    .btn-get-started {
        padding: 10px 30px;
        font-size: 18px;
        font-weight: bold;
        background-color: #f0ad4e; /* Orange background color for button */
        border: none;
        color: #fff; /* White text color for button */
        border-radius: 25px; /* Rounded corners */
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none; /* Remove default button underline */
    }
    .btn-get-started:hover {
        background-color: #ec971f; /* Darker orange on hover */
    }
    /* Animation for flying pens or copies */
    @keyframes flying {
        0% { transform: translate(-100%, -100%); opacity: 0; }
        100% { transform: translate(200%, 200%); opacity: 1; }
    }
    .pen {
        position: absolute;
        height: 100px;
        animation: flying 10s linear infinite;
        opacity: 0.5;
    }
</style>

<body>


<div class="main-container">
    <div class="left-section">
        <div class="text-content">
            <?php if ($isLoggedIn): ?>
                <h1>Welcome Back!</h1>
                <p>We're thrilled to have you back! Get ready to dive into a world of productivity and organization with TaskTango. Your tasks await, and we're here to help you conquer them all. Let's make today amazing together!</p>
                <!-- Logout button -->
                <form method="post">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            <?php else: ?>
                <h1>Welcome To TaskTango</h1>
                <p>This is the ultimate tool to organize your tasks efficiently and boost your productivity. With TaskTango, you can easily manage your to-do lists and set deadlines.</p>
                <a href="/user/login" class="btn btn-get-started">Let's Get Started</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="right-section">
        <!-- Animated to-do list image -->
        <img src="/image/todo.jpg" alt="To-Do List Animation" class="todo-animation">
        <!-- Flying pens or copies -->
        <img src="/image/contract.png" alt="Pen" class="pen" style="left: 5%; top: 30%;">
        <img src="/image/contract.png" alt="Pencil" class="pen" style="left: 50%; top: 50%;">
        <img src="/image/contract.png" alt="Pencil" class="pen" style="left: 20%; top: 80%;">
    </div>
</div>
</body>
