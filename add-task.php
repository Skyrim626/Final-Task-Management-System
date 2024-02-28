
<?php 

    include("controller/taskcontroller.class.php");

    // Create Controller
    $taskController = new TaskController();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task </title>

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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>

    <!-- Scripts -->
    <script src="js/events.js" defer></script>

</head>
<body>

    <!-- Sidebar -->
    <?php 
        include_once("components/sidebar.component.php");
    ?>

        
    <div class="dashboard">
        <h1 class="mt-2">Add Task</h1>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description(optional)"></textarea>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority Level:</label>
                <select class="form-select" id="priority" name="priority">
                    <option value="low" selected>Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Due Date:</label>
                <input type="datetime-local" class="form-control" id="dueDate" name="dueDate" required>
            </div>
            <button type="submit" name="insertTask" class="btn btn-primary">Submit</button>
        </form>

      
    <?php 

// Checks the submitted button
if(isset($_POST['insertTask'])) {
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];

    $result = $taskController->insertNewTask($title, $description, $priority, $dueDate); // True or False returned value

    // pops a modal if the result is true
    if($result) {
       
           echo "<script>
           swal('Success!', 'Your task has been created!', 'success');
                </script>";
    }

    else {
        echo "swal('Invalid!', 'Your task has been created! Try again!', 'error')";
    }

}

?>

    </div>

   
    

</body>
</html>