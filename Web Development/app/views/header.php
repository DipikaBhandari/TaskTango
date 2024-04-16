
    <title>TaskTango</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }

        .navbar {
            background-color: #5572bd; /* Dark gray background for navbar */
            font-weight: bold; /* Bold font for navbar */
            height: 90px; /* Set navbar height */
        }

        .navbar-brand {
            font-size: 26px;
            color: #fff; /* White color for navbar brand */
            line-height: 90px; /* Vertically center navbar brand */
        }

        .nav-link {
            color: #fff; /* White color for navbar links */
            font-weight: 600;
            transition: color 0.3s;
            line-height: 90px; /* Vertically center navbar links */
        }

        .nav-link:hover {
            color: #c8cbcf; /* Light gray color on hover */
        }

        .nav-item {
            margin-right: 20px;
        }

        .add-task-link {
            display: flex;
            align-items: center;
            color: #ffffff; /* White color for "Add Task" link */
            font-weight: 700;
            transition: color 0.3s;
        }

        .add-task-link:hover {
            color: #c8cbcf; /* Light gray color on hover */
        }

        .add-task-icon {
            margin-right: 5px;
        }

        /* Style for video */
        #video-container {
            position: fixed;
            top: 0;
            left: 145px;
            width: 150px; /* Set width of video */
            z-index: 999; /* Ensure video appears above other content */
            pointer-events: none; /* Allow clicks to pass through */
        }

        #video {
            width: 100%;
            height: 90px;
            object-fit: cover; /* Ensure video fills container */
        }
    </style>

<body>
<main>
    <!-- Video player in header -->
<!--    <div id="video-container">-->
<!--        <video id="video" autoplay loop muted>-->
<!--            <source src="/video/tasktangovideo.mp4" type="video/mp4">-->
<!--            Your browser does not support the video tag.-->
<!--        </video>-->
<!--    </div>-->

    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="/">TaskTango</a>
                <!-- Navbar toggler for responsive design -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/home/displayHome">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/article">Manage articles</a>
                        </li>
                    </ul>
                </div>
                <!-- "Add Task" link with icon -->
                <div>
                    <a href="/article/create" class="add-task-link">
                        <i class="fas fa-pen add-task-icon"></i> <!-- Pen icon -->
                        Add Task
                    </a>
                </div>
            </div>
        </nav>
    </div>
</main>
</body>
