<?php
    // include 'connect.php';
    //require "../generic/Constants.php";
    require "../pg_connect.php";

    session_start();

    if(!isset($_SESSION['pg_active_uid'])){
        header("location: ../logout.php?err=20");
        die(); //get out
    }

    $usrid =    $_SESSION["pg_active_uid"];
    $empid =    $_SESSION["pg_active_eid"];
    $usr_name = $_SESSION["pg_active_uname"];
    $empname =  $_SESSION["pg_active_ename"];
    $access =   $_SESSION["pg_active_ualvl"];

    // echo gettype($usrid);  *********** Gives datatype of a variable

    /* // ========== Manually setting timeout =============
    if(time() - $_SESSION['login_time'] >= 900){ //redirect if the page is inactive for 15 minutes
        session_destroy(); // destroy session.
        header("Location: logout.php");
        die(); 
    }
    else {        
       $_SESSION['login_time'] = time();   // update 'login_time' to the last time a page containing this code was accessed.
    } */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="icon" type="image/ico" href="../res/icons/stqc_icon.ico">

<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/AdminLTE.min.css">
<link rel="stylesheet" href="../css/_all-skins.min.css">
<!-- <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"> -->
<link href="../css/dataTables.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
<link rel="stylesheet" type="text/css"  href="../css/formValidation.css"/> 

<script src="../js/jQuery-2.1.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="../js/app.min.js"></script>
<!--<script src="js/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="js/datepicker.js"></script>
<script type="text/javascript" src="admin/js/formValidation.js"></script>
<script type="text/javascript" src="admin/js/bootstrap-validation.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/exporting.js" type="text/javascript"></script>-->

<!--  * * * * * * * * * * For Exam Calender * * * * * * *  * * * * *-->
<link href="../res/fullcalendar/core/main.min.css" rel="stylesheet" />
    <link href="../res/fullcalendar/daygrid/main.min.css" rel='stylesheet' />
    
    <link href='../res/fullcalendar/timegrid/main.min.css' rel='stylesheet' />

    <script src='../res/fullcalendar/core/main.js'></script>
    <script src='../res/fullcalendar/daygrid/main.js'></script>
    
    <script src='../res/fullcalendar/timegrid/main.js'></script>
    <script src='../res/fullcalendar/interaction/main.js'></script>

 <style>
/*
    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }
*/
    #calendar {
      max-width: 700px;
      margin: 20px auto;
    }

  </style>

<style>
/*.content-header > h1 {
    margin: 0;
    font-size: 24px;
    color: #1595C3;
    font-family: AdelleBasicBold, Cambria, Georgia, Times,Times New Roman;
}
#resp_img{
	max-width:100%;
	height:auro;
}        
    h3{
color: #248692;
font-weight: bold;
font-family: AdelleBasicBold, Cambria, Georgia, Times,Times New Roman;
text-align: center;
line-height: 1;
font-size:24px;
}
.inst_name {
    color: #3F3F3F;
    font-weight: bold;
    font-family: AdelleBasicBold, Cambria, Georgia, Times,Times New Roman;
    font-size: 20px;
}
*/
        </style>
    </head>

    <body class="skin-purple sidebar-mini">
        <div class="wrapper">
        <?php
            $headerMenuStr = getHeaderMenu("..", $usr_name, $empname,"", "","", "","", "");
            echo $headerMenuStr;        
        ?>

        <div class="content-wrapper" style="min-height: 563px;">
            <section class="content-header">
                <h1>Profile</h1>
            </section>
            <section class="content">
            
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Candidates</span>
                                <span class="info-box-number"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <?php $row = pg_fetch_object($result); ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Faculties</span>
                                <span class="info-box-number"><?php echo $row->count; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <?php $row = pg_fetch_object($result); ?>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Courses</span>
                                <span class="info-box-number"><?php echo $row->count; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php $row = pg_fetch_object($result); ?>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-file-text"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Course Registration</span>
                                <span class="info-box-number"><?php echo $row->count; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $row = pg_fetch_object($result); ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-teal"><i class="fa fa-calendar"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Upcoming exams</span>
                                <span class="info-box-number"><?php echo $row->count; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php $row = pg_fetch_object($result); ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-purple"><i class="fa fa-certificate"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Exams taken</span>
                                <span class="info-box-number"><?php echo $row->count; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }
                pg_free_result($result); //FREE the resultset
                // pg_close($pg_conn); 
                ?>

                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="box box-primary">
                            <div class="box-body no-padding">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
                            
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Designed and Developed by : <a href="../res/images/developer.jpg" target="_blank"><img src="../res/images/developer.jpg" height="20"></a>
            </div>
            <?php echo $COPYRIGHT_STR; ?>
        </footer>
    </div> <!-- /. wrapper -->
    
        <?php
            $sql="select exam_code, exam_date, exam_time, crs_name from mas_exam_details  med INNER JOIN course_det cd ON med.crs_id = cd.crs_id order by exam_date, exam_time";
            
            $result= pg_query($pg_conn, $sql);

            $arr = array();
            $colors = array("#f56954", //red
                        "#f39c12", //yellow
                        "#0073b7", //Blue
                        "#00c0ef", //Info (aqua)
                        "#00a65a", //Success (green)
                        "#3c8dbc", //Primary (light-blue)
                    );

            $i = 0;
            while ($row = pg_fetch_object($result)){
                $qsObj = new stdClass();  // for JSON Object
                //$qsObj->seqno = $c;  //****
                $qsObj->title = $row->crs_name . " (" . $row->exam_code . ")";

                if($row->exam_time != NULL){
                    $qsObj->start = $row->exam_date . "T" . $row->exam_time;
                } else {
                    $qsObj->start = $row->exam_date;
                }

                $qsObj->backgroundColor = $colors[ ($i % 6) ];
                $qsObj->borderColor = $colors[ ($i % 6) ];
                
                $i++;
                array_push($arr, $qsObj);
            }

            $arr = json_encode($arr);
            pg_free_result($result); //FREE the resultset
            pg_close($pg_conn); 
      
        ?>
   

    <script>

      
    document.addEventListener('DOMContentLoaded', function() {

        
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
            defaultView: 'dayGridMonth',
            defaultDate: '<?php echo date('Y-m-d');?>',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: <?php echo $arr;?>
      /*[
      {
        title: 'All Day Event',
        start: '2019-11-01'
      },
      {
        title: 'Long Event',
        start: '2019-11-07',
        end: '2019-11-10'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2019-11-09T16:00:00'
      },
      
    ] */
        });

        calendar.render();
    });

    </script>
</body>

<html>