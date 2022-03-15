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
                
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Entry
                                <a href="index.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <form action="config.php" method="POST">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" name="entry_desc" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_entry" class="btn btn-primary">Save Entry</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>