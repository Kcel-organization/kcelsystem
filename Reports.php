<?php
session_start();
include 'connection.php';

function countAssignments($con){
    $teacher_id = $_SESSION['id'];
    $query = "SELECT  COUNT(Assignment_ID) FROM assignment where Teacher_ID = '$teacher_id'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        $count = mysqli_fetch_row($result);
        return $count;
    }
}

function pupilsattempted($con){
    $teacher_id = $_SESSION['id'];
    $query = "SELECT COUNT(distinct Pupil_ID) FROM score where Teacher_ID = '$teacher_id'";
    $results = mysqli_query($con, $query);

    if(mysqli_num_rows($results)>0){
        $count = mysqli_fetch_row($results);
        return $count;
    }

}


function countpupils($con){
    $teacher_id = $_SESSION['id'];
    $query = "SELECT  COUNT(Pupil_ID) FROM pupil";
    
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        $count = mysqli_fetch_row($result);
        return $count;
    }
}

function aveargeScore($con){
    $teacher_id = $_SESSION['id'];
    $query = "SELECT  AVG(Score) FROM score where Teacher_ID = '$teacher_id'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        $count = mysqli_fetch_row($result);
        return $count;
    }
}


function aveargeDuration($con){
    $teacher_id = $_SESSION['id'];
    $query = "SELECT  AVG(Duration) FROM score where Teacher_ID = '$teacher_id'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        $count = mysqli_fetch_row($result);
        return $count;
    }
}

function getresults($con){
    $id = $_SESSION['id'];
    $query = "select pupil.first_name, pupil.last_name, score.Assignment_ID, score.Score, score.Duration from pupil inner join score on pupil.Pupil_ID = score.Pupil_ID where score.Teacher_ID = '$id'";
    $results = mysqli_query($con,$query);

    if(mysqli_num_rows($results)>0){
        $data = mysqli_fetch_all($results,MYSQLI_ASSOC);
        return $data;
    }

}

$numAssignments = countAssignments($connection);
$avgScore = aveargeScore($connection);
$avgDuration = aveargeDuration($connection);
$data = getresults($connection);
$pupils = pupilsattempted($connection);
$totalpupils=countpupils($connection);
$pupilsmissed=$totalpupils[0]-$pupils[0];


?>

<input type="hidden" value="<?php echo $avgScore[0] ?>" id="score">
<input type="hidden" value="<?php echo $avgDuration[0] ?>" id="duration">
<input type="hidden" value="<?php echo $pupils[0] ?>" id="pupils">

<?php include 'layouts/header.php' ?>

    <h2 class = "text-center">Reports</h2>

       <div class="row">
      
            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Missed By</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php if($pupilsmissed != null): ?>
                                                    <?php echo $pupilsmissed. " Pupil(s)" ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Average Score</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php if($avgScore != null): ?>
                                                    <?php echo $avgScore[0] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Average Duration</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php if($avgDuration != null): ?>
                                                    <?php echo $avgDuration[0].' sec' ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Attempted By</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pupils[0]." pupils" ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


       </div>

       <div class="row">
                    <div class="col-lg-7">
                            <table class=" table">
                                <tr>
                                    <th>first Name</th>
                                    <th>Last Name</th>
                                    <th>Assignment Id</th>
                                    <th>Score</th>
                                    <th>Duration</th>
                                </tr>
                               <?php if($data != null): ?>
                                    <?php foreach($data as $info): ?>
                                        <tr>
                                            <td><?php echo $info['first_name'] ?></td>
                                            <td><?php echo $info['last_name'] ?></td>
                                            <td><?php echo $info['Assignment_ID'] ?></td>
                                            <td><?php echo $info['Score'] ?></td>
                                            <td><?php echo $info['Duration'] ?></td>
                                        </tr>
                                    <?php endforeach?>
                                <?php endif?>
                            </table>
                        </div>
             <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistics</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" >
                                    <div class="chart-pie pt-4 pb-2" style="height: 270px;">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i>Average score
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Avearge Duration
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> pupils
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
       </div>




<?php include 'layouts/footer.php' ?>
