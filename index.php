<?php 
session_start();
include('connection.php');


function random($length){
    $user_id = '';
    $size = rand(1,$length);
    
    for($i=0; $i < $size; $i++){
        $user_id .= rand(0,9);
    }
    
    return $user_id;
}

function getAssignment($con){

    $id = $_SESSION['id'];
    $query = "select * from assignment where Teacher_ID = '$id' ";

    $results = mysqli_query($con,$query);

    if(mysqli_num_rows($results)>0){
        $data = mysqli_fetch_all($results,MYSQLI_BOTH);
        return $data;
    }
    
}

function search($con){
    $id = $_SESSION['id'];
    $search = $_GET['search'];

    $query = "select * from assignment where Teacher_ID = '$id' and Assignment_Date like '%$search%'";

    $rows = mysqli_query($con,$query);

    if(mysqli_num_rows($rows)>0){
        $data = mysqli_fetch_all($rows,MYSQLI_BOTH);
        return $data;
    }
}



$Assignment_id = random(2);

$Teacher_id = $_SESSION['id']; 


if($_SERVER['REQUEST_METHOD']=="POST"){
   $startTime = $_POST['start_time'].':00';
   $endTime = $_POST['end_time'].':00';
   $date = $_POST['date'];
   $char1 =$_POST['one'];
   $char2 =$_POST['two'];
   $char3 =$_POST['three'];
   $char4 =$_POST['four'];
   $char5 =$_POST['five'];
   $char6 =$_POST['six'];
   $char7 =$_POST['seven'];
   $char8 =$_POST['eight'];

   
   $assignment= $char1.$char2.$char3.$char4.$char5.$char6.$char7.$char8;



if(!empty($startTime) && !empty($endTime) && !empty($date) && !empty($assignment)){

    $query= "insert into assignment(Assignment_ID,	Assignment, Start_time, End_time, Assignment_Date, Teacher_ID) values('$Assignment_id ', '$assignment', '$startTime','$endTime','$date', '$Teacher_id')";
    mysqli_query($connection,$query);
    header("location: index.php");
    die;
}
}

if(isset($_GET['searchbtn'])){
    $ASSIGNMENTS = search($connection);

}else
    $ASSIGNMENTS = getAssignment($connection);



?>


<?php include 'layouts/header.php'?>

           <!----------home page------------>
           <div class="text-center">
                <h2>Assignments</h2>
           </div>
           <table class="table">
                <thead>
                    <tr>
                    <th scope="col">AssignmentID</th>
                    <th scope="col">Assignment</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                   <?php if($ASSIGNMENTS != NULL): ?>
                    <?php foreach($ASSIGNMENTS as $assignments): ?>
                       <tr>
                           <td><?php echo $assignments['Assignment_ID']?></td>
                           <td><?php echo $assignments['Assignment']?></td>
                           <td><?php echo $assignments['Start_time']?></td>
                           <td><?php echo $assignments['End_time']?></td>
                           <td><?php echo $assignments['Assignment_Date']?></td>
                       </tr>
                    <?php endforeach?>
                    <?php endif ?>
                </tbody>
            </table>
            <di class="d-flex">
                <div class="pb-3" id="btndiv" style="margin-right: 40px;">
                    <button class="btn-sm btn-success " id="addAssignment">Add Assignment</button>
                </div>
                
            </di>

            <!---------add assignment--->
           <div class="hidden" id="assignment">
            <h4>Add Asssignment</h4>
                <form action="" method="POST" class="form-control">
                    <label for="">Start time</label>
                    <input type="time" name="start_time" id=""><br><br>
                    <label for="" >End Time</label>
                    <input type="time" name="end_time" id=""><br><br>
                    <label for="" style="margin-right: 30px;">Date</label>
                    <input type="date" name = "date"><br><br>
                    <label for="">characters</label>
                    <select name="one" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <select name="two" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <select name="three" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <select name="four" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <select name="five" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <select name="six" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select> <select name="seven" id="">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <select name="eight" id="">
                         <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                   <div class="pt-3">
                   <button type="submit" class="btn btn-primary">add</button>
                   <button type="submit" class="btn btn-danger" id = "cancelbtn">cancel</button>
                   </div>
                </form>
           </div>
            
            
        </div>
    </div>
<?php include 'layouts/footer.php'?>