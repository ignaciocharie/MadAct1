<?php
session_start();
include('Connection.php');

if(isset($_POST['delete_entry']))
{
    $entry_id = $_POST['delete_entry'];

    try {
        $query = "DELETE FROM entries WHERE entry_id=? LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->bindParam(1,$entry_id, PDO::PARAM_INT);
        $query_execute = $statement->execute();

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: index.php');
            exit(0);
        }
    
    } catch(PDOException $e) {
        echo $e->getMessage();
    } 
}

if(isset($_POST['update_entry']))
{
    $entry_id = $_POST['entry_id'];
    $entry_title = $_POST['title'];
    $entry_desc = $_POST['entry_desc'];

    try {

        $query = "UPDATE entries SET entry_title=:title, entry_desc=:entry_desc WHERE entry_id=:entry_id LIMIT 1";
        $statement= $conn->prepare($query);
        $statement->bindParam(':title',$entry_title);
        $statement->bindParam(':entry_desc',$entry_desc);
        $statement->bindParam(':entry_id',$entry_id);
        $query_execute = $statement->execute();
        
        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: index.php');
            exit(0);
        }

    }catch(PDOException $e) {
        echo $e->getMessage();
    }
}

if(isset($_POST['save_entry']))
{
    $entry_title = $_POST['title'];
    $entry_desc = $_POST['entry_desc'];

    try {

        $query ="INSERT INTO entries (entry_title, entry_desc) VALUES ( ?, ?)";
        $statement = $conn->prepare($query);
        $statement->bindParam(1, $entry_title);
        $statement->bindParam(2, $entry_desc);
        $query_execute = $statement->execute();

        if($query_execute)
        {
            $_SESSION['message'] = "Added Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Added";
            header('Location: index.php');
            exit(0);
        }


    } catch (PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }
}

?>