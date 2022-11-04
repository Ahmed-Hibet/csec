<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CSEC-Registration</title>
</head>
<body>
    <?php
        include 'nav.php';
    ?>
    <form action="validate_registration.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="form-group col-md-4">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
            <div class="form-group col-md-4">
                <label>ID</label>
                <input type="text" class="form-control" name="id" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Year</label>
                <input type="number" class="form-control" name="year" max = "6" min = "1" required>
            </div>
            <div class="form-group col-md-4">
                <label>Phone number</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group col-md-4">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <legend class="col-form-label">Gender</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male" checked>Male
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female">Female
                </div>
            </div>
            <div class="col-md-6">
                <legend class="col-form-label">Education level</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="education" value="undergraduate" checked>Undergraduate
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="education" value="postgraduate">Postgraduate
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Department</label>
                <input type="text" class="form-control" name="department" required>
            </div>
            <div class="form-group col-md-4">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group col-md-4">
                <label>Confirm password</label>
                <input type="password" class="form-control" name="confirmPassword" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
    </form>
</body>
</html>