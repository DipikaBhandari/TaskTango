<?php include __DIR__ . '/../header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>To Do Task</title>
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
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* No repeat */
            background-attachment: fixed; /* Fixed background */
        }

        .card {
            border-radius: 10px; /* Rounded corners for cards */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
        }

        .card-title {
            font-weight: bold; /* Bold font for card titles */
            margin-bottom: 0.5rem; /* Add margin below title */
        }

        .card-text {
            color: #555; /* Slightly darker color for card text */
        }

        /* Custom background colors based on category */
        .work {
            background-color: #ffe8e8; /* Light red for work tasks */
        }

        .home {
            background-color: #e8f8ff; /* Light blue for home tasks */
        }

        /* Styles for filter dropdown */
        .filter-dropdown {
            position: absolute;
            top: 140px; /* Adjust position below title */
            right: 150px; /* Adjust position to the right */
            z-index: 999;
            font-size: 20px; /* Smaller font size */
        }
        select.form-control{
            cursor: pointer;
        }
        /* Index styling */
        .index {
            margin-top: 20px;
            text-align: center;
        }

        .index-item {
            width: 150px;
            height: 60px;
            border-radius: 10px; /* Rounded corners for cards */
            box-shadow: 0 0 20px rgba(0, 109, 119, 0.16); /* Box shadow for cards */
            font-size: 40px;
            display: inline-block;
            margin-right: 20px;
        }
    </style>
</head>
<body>
<main>
    <div class="container">
        <h1 class="text-center mt-5" style="font-weight: bold; color: darkolivegreen">To Do Task</h1>
        <!-- Filter dropdown -->
        <div class="filter-dropdown">
            <label for="categoryFilter">Filter by Category:</label>
            <select id="categoryFilter" class="form-control">
                <option value="all">All</option>
                <option value="work">Work</option>
                <option value="home">Home</option>
            </select>
        </div>

        <div class="row justify-content-center" id="taskList">
            <?php foreach ($model as $article): ?>
                <?php
                // Determine the category and set the appropriate class for background color
                $categoryClass = '';
                if ($article['category'] === 'work') {
                    $categoryClass = 'work';
                } elseif ($article['category'] === 'home') {
                    $categoryClass = 'home';
                }
                ?>
                <div class="col-md-5 mb-4">
                    <div class="card <?php echo $categoryClass; ?>"> <!-- Add category class to card -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlentities($article['title']); ?></h5>
                            <p class="card-text"><?php echo htmlentities($article['content']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="index">
        <span class="index-item work" style="background-color: #ffe8e8;">Work</span>
        <span class="index-item home" style="background-color: #e8f8ff;">Home</span>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoryFilter = document.getElementById('categoryFilter');
        const taskItems = document.querySelectorAll('.card');
        if (categoryFilter) {
            // Event listener for category filter dropdown
            categoryFilter.addEventListener('change', function () {
                const selectedCategory = categoryFilter.value;

                // Loop through task items to show/hide based on selected category
                taskItems.forEach(function (taskItem) {
                    if (selectedCategory === 'all' || taskItem.classList.contains(selectedCategory)) {
                        taskItem.style.display = 'block';
                    } else {
                        taskItem.style.display = 'none';
                    }
                });
            });
        }
    });</script>
</body>
</html>

