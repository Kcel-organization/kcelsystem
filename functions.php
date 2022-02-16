<?php 

function checkLogin($con){
    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];
        $query = "select * from teacher where Teacher_ID ='$id' limit 1";
        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result) >0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }else{
        header("Location: login.php");
        die;
    }

}

// function random($length){
//     $user_id = '';
//      $size = rand(3,$length);
    
//      for($i=0; $i < $size; $i++){
//          $user_id .= rand(0,9);
//      }
    
//      return $user_id;
//  }

