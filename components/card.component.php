
<!-- Custom Styles -->
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/utilities.css">

<!-- Component -->
<div class="card mb-4">
    <div class="card-header fw-medium">
        Due Date: <span class="date fw-400"><?php echo $row["Due_date"] ?></span>
    </div>
    <div class="card-body | d-flex flex-column gap-3">
        <h2 class="card-title fw-400">Title: 
        <span class="title fw-400"><?php echo $row["Title"] ?></span>
        </h2>   
        <h4 class="description-label card-text fw-400">Description: <span class="description fw-400" ><?php echo $row["Description"] ?></span> </h4>
        <h4 class="priority_level-label card-text fw-400">Priority Level: <span class="priority_level"><?php echo $row["Priority"] ?></span> </h4>

        <div class="card__btn-group ">
            <button href="edit_task.html" class="btn btn-primary " name="editTask" value="<?php echo $row['Task_ID'] ?>" type="submit">Edit</button> 
            <button href="delete_task.html" class="btn btn-primary " name="deleteTask" value="<?php echo $row['Task_ID'] ?>" type="submit">Delete</button>
        </div>
    </div>
</div>