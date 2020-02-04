<!DOCTYPE html>
<html>
<head>
    <?php require __DIR__.'/../partials/includes-css.php'; ?>
    <title>
        <?php Functions::displayConfig('app_config','app_title'); ?> 
        Sample
    </title>
</head>
<body>
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                Add Record
            </div>
            <div class="card-body">
                <form method="post" action="store">
                    <div class="form-group">
                        <label for="user">User</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="status" class="form-control" name="status" id="status" placeholder="Enter Status">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>