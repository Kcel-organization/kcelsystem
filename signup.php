 <?php 

include('connection.php');
//include 'functions.php';

function random($length){
    $user_id = '';
     $size = rand(3,$length);
    
     for($i=0; $i < $size; $i++){
         $user_id .= rand(0,9);
     }
    
     return $user_id;
 }


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)&& !empty($Fname) && !empty($Lname)){

        $Teacher_ID = random(5); // random method to generate teacher_id
        $query = "insert into teacher (Teacher_ID, Fname, Lname, Username, Password) values('$Teacher_ID','$Fname','$Lname','$username','$password')";
        mysqli_query($connection,$query);
        header("location: login.php");
        die;
    }else{
        echo "enter valid information";
    }

}


?>

<html>
    <head>
        <title>
            Signup
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Signup</h3></div>
                        <div class="card-body">
                        <form action="" method = "post" class="form-control">
                            <input class="input" type="text" placeHolder = "First Name" name = "Fname"><br><br>
                            <input class="input" type="text" placeHolder = "Last Name" name = "Lname"><br><br>
                            <input class="input" type="text" placeHolder = "username" name = "username"><br><br>
                            <input class="input" type="password" placeHolder = "password"  name = "password"><br><br>
                            <button type = "submit" class="btn btn-primary">Signup</button><br><br>
                            <div class="card-footer">
                            <a href="login.php">Have an account? Login</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
       </div>

    </body>
</html>