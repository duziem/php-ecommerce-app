<!Doctype html>
<html lang="en">
<head>
    <title>E-commerce Application</title>
    <meta charset="UTF-8">
    <meta name="view-port" content="width=device-width, initial-scale=1, maximum-scale= 1">

    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <!--Bootstrap CSS Package-->
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <?php
    // require functions.php file
    require ('functions.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST["loginBtn"])){

            $email= $_POST["email"];
            $password= $_POST["password"];

            $_isRegistered= $login->_userExists($email, $password);
            if ($_isRegistered){

                $user= $login->getUser($email, $password);//get the user data
                $_SESSION['user_id']= $user[0]['user_id'];
                $userId= $_SESSION['user_id'];

                header("location: index.php?user_id=" . $userId);
                /*
                $userId= $user[0]['user_id'];// get the user data

                header("location: index.php?user_id=" . $userId);
                */
            }
        }
    }
    ?>

</head>
<body style="background: url('./assets/images/wp.jpg')">
<main>
    <section id="register_area">
        <div class="text-center container py-3 overflow-auto">

            <img src="./assets/images/products/1.png" alt="" class="rounded-circle img-fluid" style="width: 120px;box-shadow:#00A5C4 -4px -4px 4px">

            <!-- brand name -->
            <div class="py-4 font-subheading" style="color: #00A5C4">
                <h2>Gadget Hub</h2>
            </div>

            <form action="" method="post" enctype="application/x-www-form-urlencoded">

                <div class="row justify-content-center">
                    <div class="col-8 col-md-4 font-bodyText">

                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email">Email:&nbsp;&nbsp;</label>
                            <input class="form-control" type="email" required name="email" id="email" autofocus>
                        </div>

                        <!-- password -->
                        <div class="form-group row">
                            <label for="password">Password:&nbsp;&nbsp;</label>
                            <input class="form-control" type="password" required name="password" id="password">
                        </div>

                        <div class="row pt-4">
                            <button name="loginBtn" class="btn btn-primary w-100">Log in</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
</body>
</html>