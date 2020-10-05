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

    <script>alert();</script>
    <?php
    // require functions.php file
    require ('functions.php');

    //insert form values into user table
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST["registerBtn"])){

            echo $firstName= $_POST["firstName"];
            echo $lastName= $_POST["lastName"];
            echo $username= $_POST["username"];
            echo $email= $_POST["email"];
            echo $password= $_POST["password"];
            echo $registerDate= date('Y-m-d H:i:s', time());

            if($register->insertIntoUser($firstName, $lastName, $username, $email, $password, $registerDate)){
                header("location: index.php");
            }

        }
    }

    ?>

</head>
<body style="background: url('./assets/images/wp.jpg')">
    <main>
        <section id="register_area">
            <div class="text-center container py-3 overflow-auto">

               <img src="./assets/images/products/1.png" alt="" class="rounded-circle img-fluid" style="width: 120px;box-shadow:#00A5C4 -2px -2px 4px">

                <!-- brand name -->
                <div class="py-4 font-subheading" style="color: #00A5C4">
                    <h2>Gadget Hub</h2>
                </div>

                <form action="" method="post" enctype="application/x-www-form-urlencoded">

                    <div class="row justify-content-center">
                        <div class="col-8 col-md-4 font-bodyText">

                            <!-- first name -->
                            <div class="form-group row">
                                <label for="firstName">First Name:&nbsp;&nbsp;</label>
                                <input autofocus pattern="^[A-Za-z]+$" class="form-control" type="text" required name="firstName" id="firstName">
                            </div>

                            <!-- last name -->
                            <div class="form-group row">
                                    <label for="lastName">Last Name:&nbsp;&nbsp;</label>
                                    <input pattern="^[A-Za-z]+$" class="form-control" type="text" required name="lastName" id="lastName">
                            </div>

                            <!-- username -->
                            <div class="form-group row">
                                <label for="username">Username:&nbsp;&nbsp;</label>
                                <input pattern="^[A-Za-z0-9]+$" class="form-control" type="text" required name="username" id="username">
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label for="email">Email:&nbsp;&nbsp;</label>
                                <input class="form-control" type="email" required name="email" id="email">
                            </div>

                            <!-- password -->
                            <div class="form-group row">
                                <label for="password">Password:&nbsp;&nbsp;</label>
                                <input class="form-control" type="password" required name="password" id="password">
                            </div>

                            <div class="row pt-4">
                                <button name="registerBtn" class="btn btn-primary w-100">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>