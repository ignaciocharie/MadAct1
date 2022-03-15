<?php
session_start();
include('Connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Todo List </title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4 text-center">
                    <h1>Todo List</h1>
                </div>

                <?php
                if(isset($_SESSION['message'])) {
                    echo "<h4 class='alert alert-success'>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TODO
                                <a href="add-entry.php" class="btn btn-primary float-end">Add Entry</a>
                            </h4>
                        </div>

                        <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query ="SELECT * FROM entries";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?=$row['entry_id']?></td>
                                                <td><?=$row['entry_title']?></td>
                                                <td><?=$row['entry_desc']?></td>
                                                <td>
                                                    <a href="update-entry.php?id=<?=$row['entry_id']?>" class="btn btn-info">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="config.php" method="POST">
                                                        <button type="submit" name="delete_entry" value="<?=$row['entry_id']?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                    }
                                    else
                                    {
                                       ?>
                                       <tr>
                                           <td colspan="5">No Record Found</td>
                                       </tr> 
                                       <?php
                                    }
                            ?>
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>