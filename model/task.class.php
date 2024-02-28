<?php

include("./services/databaseservice.inc.php");

/**
 * A class that is responsible for communicating to the DatabaseService
 * It is responsible to fetch data's from the Database
 */
class Task extends DatabaseService{
    
    // A method that gets all the tasks from the Database
    protected function getAllTasks() {

        // SQL Command
        $sql = "SELECT * FROM task;";
        
        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

          // Returns the Result
          return $query_result;

    }


    // A function that gets the task data by an ID
    protected function getTask($id) {

        /// SQL Command
        $sql = "SELECT * FROM task WHERE Task_ID='$id';";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        // Returns the Result
        return $query_result;

    }

    // A method that sets/inserts a task to the database
    protected function setTask($title, $description, $priority, $dueDate) {

        // SQL Command
        $sql = "INSERT INTO `task` (`Title`, `Description`, `Priority`, `Due_date`) VALUES ('$title', '$description', '$priority', '$dueDate');";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        // Checks if the query is executed properly
        if($query_result) {
            // echo "Task Inserted Successfully <br>";
           return $query_result;
        }
    
        else {
           // echo "Task Inserted Invalid <br>";
           return $query_result;
        }

    }

    // A method that updates a task in the database
    protected function updateTask($id, $title, $description, $priority, $dueDate) {

        // SQL Command
        $sql = "
            UPDATE task
            SET Title = '$title',
            Description = '$description',
            Priority = '$priority',
            Due_date = '$dueDate'
            WHERE Task_ID = '$id';
        ";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        // Checks if the query is executed properly
        if($query_result) {
            // echo "Task Inserted Successfully <br>";
           return $query_result;
        }
    
        else {
           // echo "Task Inserted Invalid <br>";
           return $query_result;
        }
                
    }

    // A method that deletes a task in the database
    protected function deleteTask($id) {

        // SQL Command
        $sql = "DELETE FROM task WHERE Task_ID = '$id';";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        return $query_result; // Returns the query result

    }

    // A method that gets the total number of tasks in the database
    protected function getTotalTasks() {

        // SQL Command
        $sql = "SELECT COUNT(*) as 'Total_tasks' FROM task;";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        return $query_result; // Returns the query result
        
    }

    // A method that gets the total number of medium tasks
    protected function getAllMediumTasks() {

         // SQL Command
         $sql = "SELECT COUNT(*) as 'Total_tasks' FROM task WHERE Priority = 'medium';";

         // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        return $query_result; // Returns the query result

    }

    // A method that gets the total number of high tasks
    protected function getAllHighTasks() {
        // SQL Command
        $sql = "SELECT COUNT(*) as 'Total_tasks' FROM task WHERE Priority = 'high';";

        // Connects to the Database and Execute Query
       $query_result = mysqli_query($this->connectLocal(), $sql);

       return $query_result; // Returns the query result
    }

}