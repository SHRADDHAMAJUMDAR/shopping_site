<?php
    session_start();

    //deleter session attributes
    session_unset();

    //delete cookies ..(if any)

    //..other cleanup

    if(session_destroy()){
        header("location: index.php?status=10");
    }
?>
