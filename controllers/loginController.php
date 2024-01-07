<?php
// require 'pg_connect.php';
require 'connect_config.php';

if(isset($_POST['btnlogin'])) {
    $usr_name = $_POST['usrname'];
    $usr_pass = $_POST['usrpass'];
    $empid = 0;
    $usrid = 0;
    $usrpass = "";
    $access = 0;
    $empname = "";
    $status = 1; // success

    $pg_conn = $result = NULL;

    try {

    $pg_conn = connnect_to_server();
    
    // $sql="select * from mas_user where uname='$usr_name' and upass='$usr_pass'";
    $sql = "select upass, uid, fd.empid, access_lvl, last_access, init||' '||name as ename from mas_user mu INNER JOIN faculty_det fd ON mu.empid = fd.empid where uname = '$usr_name' and fd.access_validity > now()";
    
    $result = pg_query($pg_conn, $sql);  //execute query

    $row_count = pg_num_rows($result); //number of rows in resultset
    
    if ($row_count == 1) {  // should be 1

        $row = pg_fetch_object($result);  // loop not required   --> while ($row = pg_fetch_row($result)){  $row[0] , $row[1]} 
            $usrpass = $row->upass;
    
            if($usrpass == $usr_pass){
                $empid = (int)$row->empid;  // conversion Not necessary....I guess
                $usrid = (int)$row->uid;
                $empname = $row->ename;
                $access = (int)$row->access_lvl;
            } else { // password mismatch
                $status = 0;
            }
        
        
    } else { // no user exist
        $status = 0;
    }

    // pg_free_result($result); //FREE the resultset
    // pg_close($pg_conn);
    
    if($status != 0) {
        //ini_set( 'session.cookie_httponly', 1 );   //makes it HttpOnly
        /*
        session_set_cookie_params([
            'lifetime' => 300,      //forcefully logout
            'path' => '/',
            'domain' => null,
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
        */

        session_start();  //ideally should return a new session, but most likely to return an existing session
        session_regenerate_id(true);  //changing the session id

        $_SESSION["pg_active_uid"] = $usrid;
        $_SESSION["pg_active_eid"] = $empid;
        $_SESSION["pg_active_uname"] = $usr_name;
        $_SESSION["pg_active_ename"] = $empname;
        $_SESSION["pg_active_ualvl"] = $access;
        
        header("location: ../stock_files/home.php");
    } else {
        header("location: ../index.php?err=1");	
    }
    //exit;  finally block won't execute

    } catch(Exception $e) {
        
        savelogdata("[at]:" . pathinfo($e->getFile())['basename'] . " =>> " . $e->getMessage()); //substr($filename, strrpos($filename, '\\'))  where $filename = $e->getFile();
        header("location: ../index.php?err=2");
        //die();  finally block won't execute
    } finally {
        if($result != NULL){
            // savelogdata('Closing result.');
            pg_free_result($result); //FREE the resultset
        }

        if($pg_conn != NULL){
            // savelogdata('Closing connection.');
            pg_close($pg_conn);
        }
    }
}
?>