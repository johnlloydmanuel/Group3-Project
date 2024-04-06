<?php
echo(password_hash("hotdog", PASSWORD_BCRYPT));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" href="resources/placeholder-logo.png" type="image/x-icon">
</head>
<body style="background-color: #F38F1D;">
    <div class="container-fluid" style="background-color: #F38F1D;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-5 mb-5">
                <div class="card w-75 m-auto" style="height: 30rem; border-radius: .4rem;">
                    <img src="resources/placeholder-logo.png" class="card-img-top w-25 h-25 m-auto" alt="logo of logo">
                    <div class="card-body">
                        <h1 class="card-title text-center">LOREM IPSUM</h1>
                     <form action="verify.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="user-email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="user-pass">
                        </div>
                        <button type="submit" name="btn-login" class="btn btn-warning text-white w-100" style="font-weight: 500;">Login</button>
                     </form>
                    </div>
                  </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
</html>