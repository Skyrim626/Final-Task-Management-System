<?php

    include_once("view/taskview.class.php");
    include_once("controller/taskcontroller.class.php");

    // Get the Task Id
    $taskID = $_GET["taskID"];

    // Create a View
    $taskView = new TaskView();

    // Create a Controller
    $taskController = new TaskController();
    
    // Get the result
    $result = $taskView->showTaskByID($taskID);

    if(isset($_POST["updateTask"])) {   

        $id = $result['Task_ID'];        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $dueDate = $_POST['dueDate'];

        $result = $taskController->updateTaskByID($id, $title, $description, $priority, $dueDate);

        header("Location: index.php");

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task </title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/index.css">

    <!-- CDJNS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="js/events.js" defer></script>
    <script src="js/view.js" defer></script>

</head>
<body>

    <!-- Sidebar -->
    <?php 
        include_once("components/sidebar.component.php");
    ?>

        
    <div class="dashboard">
        <h1>Edit Task</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['Title'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" value="<?php echo $result['Description'] ?>" required><?php echo $result['Description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority Level:</label>
                <select class="form-select" id="priority" name="priority" data-priority="<?php echo $result['Priority'] ?>">
                    
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Due Date:</label>
                <input type="datetime-local" class="form-control" id="dueDate" name="dueDate" value="<?php echo $result['Due_date'] ?>" required>
            </div>            

            <div class="mb-3">
                <label for="" class="form-label">Date Created:</label>
                <input type="datetime-local" class="form-control" id="" value="<?php echo $result['Date_Created'] ?>" disabled>
            </div>      
            <button type="submit" class="btn btn-primary" name="updateTask">Save Changes</button>
        </form>
    </div>
        
</body>
</html>