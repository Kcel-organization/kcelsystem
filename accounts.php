<?php 
session_start();
include 'connection.php';


function getTeacher($con){
    $id = $_SESSION['id'];

    $query = "select * from teacher where Teacher_ID = '$id' limit 1";

    $results = mysqli_query($con,$query);

    if(mysqli_num_rows($results)>0){
        $data = mysqli_fetch_row($results);
    }
    return $data;

}
 $teacher= getTeacher($connection);

 

function getpupils($con){

    $query = "select * from pupil";

    $return  = mysqli_query($con, $query);

    if(mysqli_num_rows($return)){
        $rows  = mysqli_fetch_all($return,MYSQLI_BOTH);
    }
    return $rows;
}

function searchpupil($con){

    $search = $_GET['search'];
    $query = "select * from pupil where first_name like '%$search%' or last_name like '%$search%'";

    $return  = mysqli_query($con, $query);

    if(mysqli_num_rows($return)){
        $rows  = mysqli_fetch_all($return,MYSQLI_BOTH);
        return $rows;
}
    }
    

// $pupildata = getpupils($connection);


if($_SERVER['REQUEST_METHOD'] == "POST"){

   if(isset($_POST['Addpupil'])){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $usercode = $_POST['usercode'];
    $phone = $_POST['phone'];
    

    if(!empty($Fname) && !empty($Lname) && !empty($usercode)){

        $query = "insert into pupil (Pupil_ID, first_name, last_name, Phone_Number) values('$usercode','$Fname','$Lname','$phone')";
        mysqli_query($connection,$query);
        header("location: accounts.php");
        die;
    }else{
        echo "enter valid information";
    }
   }

}

if(isset($_GET['searchbtn'])){
    $pupildata = searchpupil($connection);
}else
    $pupildata = getpupils($connection);


?>

<?php include 'layouts/header.php' ?>
    <h2 class="text-center">Accounts</h2>

    <h4>my Account</h4>
    <div class="form-control">
        <label for="First Name"> First Name</label>
        <input type="text" name="Fname" value="<?php echo $teacher[1]?>"><br><br>
        <label for="First Name" >Last Name</label>
        <input type="text" name="Lname" value="<?php echo $teacher[2]?>"><br><br>
        <label for="First Name" >Username</label>
        <input type="text" name = "username" value="<?php echo $teacher[3]?>"><br><br>
       <div>
       <button class="btn-sm btn-primary" name="edit">Edit</button>
      
       </div>
    </div>


    <div>
    <h4 class="pt-5">Pupil Accounts</h4>
    </div>

    <div class = "pb-5 hidden" id="addform">
        <form action="" method="post" class="form-control">
            <label for="">user code</label>
            <input type="text" name="usercode"><br><br>
            <label for="">First Name</label>
            <input type="text" name="Fname"><br><br>
            <label for="">Last Name</label>
            <input type="text" name="Lname"><br><br>
            <label for="">Phone</label>
            <input type="text" name="phone"><br><br>
            
           <div class="d-flex">
                <div style="margin-right: 40px;"><button type="submit" class="btn-sm btn-success" name="Addpupil">Add Pupil</button></div>
                <div><button type="submit" class="btn-sm btn-danger" name="Addpupil">cancel</button></div>
           </div>
        </form>
    </div>

    <div class="" id="pupiltable">
    <table class="table">
                <thead>
                    <tr>
                    <th scope="col">userCode</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">phone number</th>
                    <th scope="col">status</th>
                    </tr>
                </thead>
                <tbody>
                 <?php if($pupildata != null): ?>
                    <?php foreach($pupildata as $pupil):?>
                        <tr>
                            <td><?php echo $pupil['Pupil_ID']?></td>
                            <td><?php echo $pupil['first_name']?></td>
                            <td><?php echo $pupil['last_name']?></td>
                            <td><?php echo $pupil['Phone_number']?></td>
                            <td><?php echo $pupil['status']?></td>
                        </tr>
                  <?php endforeach ?>
                 <?php endif ?>
                </tbody>
            </table>
            <button class="btn-sm btn-danger" id="addpupil">Add Pupil</button>
    </div>
<?php include 'layouts/footer.php'?>