<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <?php
        include 'nav.php';
    ?>


    <form action = "validate_login.php" method = "POST">
        <div class = "form-group">
            <label>ID</label>
            <input type = "text" class = "form-control" name = "id" required>
        </div>
        <div class = "form-group">
            <label>Password</label>
            <input type = "password" class = "form-control" name = "password" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name = "checkbox">
            <label class="form-check-label">Check me out</label>
        </div>
        <button type = "submit" class = "btn btn-primary" name = "submit">Submit</button>
    </form>
    
</body>
</html>