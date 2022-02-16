<?php
session_start();
include 'connection.php';


function getRequests($con){
    $status = 'deactivated';
    $query = "select pupil.Pupil_ID, pupil.first_name, pupil.last_name, activation_request.Request_ID from pupil inner join activation_request on pupil.Pupil_ID = activation_request.Pupil_ID where pupil.status = '$status'";

    $results = mysqli_query($con,$query);

    if(mysqli_num_rows($results)>0){
        $data = mysqli_fetch_all($results,MYSQLI_ASSOC);
        return $data;
    }
   
}
$requests= getRequests($connection);

if($_SERVER['REQUEST_METHOD'] = 'POST'){
    if(isset($_POST['deactivatebtn'])){
        $pupilid = $_POST['deactivate'];
        $status = 'deactivated';
        $query = "update pupil set status = '$status' where Pupil_ID = '$pupilid'";
        mysqli_query($connection,$query);
        header('requests.php');
    }else if(isset($_POST['activatebtn'])){
        $pupilid = $_POST['activate'];
        $status = 'active';
        $query = "update pupil set status = '$status' where Pupil_ID = '$pupilid'";
        mysqli_query($connection,$query);
        header('location:requests.php');
    }
}



?>

<?php include 'layouts/header.php' ?>

    <h2 class = "text-center">Activation Requests</h2>
    <div class="row">
        <div class="col-3">
           <form action="" method="post">
                <div class="pb-3 h4">
                    <label for="">Deactivation</label>
                </div>
                    <input type="text" placeholder="Enter user code" name="deactivate">
                <div class="pt-3">
                    <button type="submit" class="btn-sm btn-outline-danger" name="deactivatebtn">Deactivate</button>
                </div>
           </form>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">userCode</th>
                        <th scope="col">First Nmae</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Request ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($requests != NULL): ?>
                            <?php foreach($requests as $request):?>
                                <tr>
                                    <td><?php echo $request['Pupil_ID']?></td>
                                    <td><?php echo $request['first_name']?></td>
                                    <td><?php echo $request['last_name']?></td>
                                    <td><?php echo $request['Request_ID']?></td>
                                </tr>
                  <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
            </table>
        </div>
        <div class="col-3">
            <div class="col-3">
               <form action="" method="post">
                    <div class="pb-3 h4">
                        <label for="">Activation</label>
                    </div>
                        <input type="text" placeholder="Enter user code" name="activate">
                    <div class="pt-3">
                        <button type="submit" class="btn-sm btn-outline-success" name="activatebtn">Activate</button>
                    </div>
               </form>
        </div>
    </div>


<?php include 'layouts/footer.php' ?>
