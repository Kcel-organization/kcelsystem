<?php 
session_start();
include('connection.php');


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){

        $query = "select * from teacher where Username = '$username' limit 1";
        $result = mysqli_query($connection,$query);
        
        if($result){
            if($result && mysqli_num_rows($result)>0){

                $userdata = mysqli_fetch_assoc($result);

                
                if($userdata['Password'] === $password){

                    $_SESSION['id'] = $userdata['Teacher_ID'];
                    $_SESSION['username']=$userdata['Username'];
                    
                   
                    header("location: index.php");
                    die;
                }else{
                    echo "enter a valid username or password";
                }

            }
        }

        
    }else{
        echo "enter valid information";
    }

}


?>

<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
    <h1 style="text-align:center"> KINDERCARE E_LEARNING SYSTEM</h1>
       <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                      
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                        <form action="" method = "post" class="form-control">
                            <input class="input" type="text" placeHolder = "username" name = "username"><br><br>
                            <input class="input" type="password" placeHolder = "password"  name = "password"><br><br>
                            <button type = "submit" class="btn btn-primary">Login</button><br><br>
                            <div class="card-footer">
                            <a href="signup.php">Have no account? Signup</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
       </div>

    </body>
</html>