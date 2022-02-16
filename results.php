<?php 
session_start();
include 'connection.php';

function getscores($con){

    $query = "select * from score";

    $results = mysqli_query($con,$query);
    
    if(mysqli_num_rows($results)>0){
        $scores = mysqli_fetch_all($results,MYSQLI_BOTH);
        return $scores;
    }
}


if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['commentbtn'])){
       if($_POST['comment']){
     
         foreach($_POST['comment'] as $key => $value){
             $query = "update score set comment = '$value' where Pupil_ID = '$key'";
             mysqli_query($connection,$query);
             header("location: results.php");
         }
       }
    }
}
 
 
 

$scores = getscores($connection);

?>

<?php include 'layouts/header.php' ?>

<h2 class="text-center">Results</h2>

    <form action="" method="post">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">userCode</th>
                    <th scope="col">Assignment ID</th>
                    <th scope="col">Score (%)</th>
                    <th scope="col">Duration (sec)</th>
                    <th scope="col">Add comment</th>
                    </tr>
                </thead>
                <tbody>
                 <?php if($scores != null): ?>
                    <?php foreach($scores as $score): ?>
                        <?php if(empty($score['comment'])): ?>
                            <tr>
                                <td><?php echo $score['Pupil_ID']?></td>
                                <td><?php echo $score['Assignment_ID']?></td>
                                <td><?php echo $score['Score']?></td>
                                <td><?php echo $score['Duration']?></td>
                                <td><input type="text" name="comment[<?php echo $score['Pupil_ID'] ?>]"></td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                 <?php endif ?>
                </tbody>
        </table>

        <button type="submit" class="btn btn-primary" name="commentbtn">Submit</button>

    </form>

<?php include 'layouts/footer.php' ?>