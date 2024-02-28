<?php 

    include("view/taskview.class.php");
    include("controller/taskcontroller.class.php");


    // Create a View
    $taskView = new TaskView();

    // Create Controller
    $taskController = new TaskController();

    // Processing the form submission
    if(isset($_POST['deleteTask'])) {
      // Get the Task_ID of the task being deleted
      $taskID = $_POST['deleteTask'];
      
      $result = $taskController->deleteTaskbyID($taskID); // Returned value true or false
     
    }

    elseif(isset($_POST['editTask'])) {
      
      // Get the Task Assoc Array
      $taskDetail = $_POST['editTask'];

      header("Location:task.php?taskID=" . $taskDetail);
      
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task View</title>

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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>

</head>
<body>

    <!-- Sidebar -->
    <?php 
        include_once("components/sidebar.component.php");
    ?>

        
        <section class="dashboard mb-4">
            <h1>Task</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                <?php 
                    $result = $taskView->showAllTasks();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            include("components/card.component.php");
                        }
                    }
                    
                ?>
            </form>
        </section>

        <?php 
            
            if(isset($_POST['deleteTask'])) {
                 // Checks if the task is delete
                if($result) {
                  echo "<script>
            swal('Success!', 'Your task has been deleted!', 'success');
                  </script>";
                }

                else {
                  echo "<script>
            swal('Failed!', 'Your task has not been deleted!', 'error');
                  </script>";
                }
            }
            ?>
    
</body>
</html>