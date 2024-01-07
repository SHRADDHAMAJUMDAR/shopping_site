<?php
include 'pg_connect.php';

$i_cat    =$_POST['ddlcategory'];
//echo $s_name;
$i_name     =$_POST['txtname'];
$i_desc  =$_POST['txtdesc'];
$i_site   =$_POST['txtsite'];
$i_rate   =$_POST['txtrate'];
$i_price    =$_POST['txtprice'];
$i_sales   =$_POST['txtsales'];
$i_site2   =$_POST['txtsite2'];
$i_rate2   =$_POST['txtrate2'];
$i_price2    =$_POST['txtprice2'];
$i_sales2   =$_POST['txtsales2'];


$sql="insert into items(item_id,item_name,item_desc,item_cat) values((select max(item_id)+1 from items),$1, $2,$3)";
$pstmt=pg_prepare($pg_conn,"prep",$sql);
$r=pg_execute($pg_conn,"prep",array($i_name,$i_desc,$i_cat));

$sql="insert into ratings(item_id,site_name,rating_value,price,sales) values((select max(item_id) from items),$1, $2,$3,$4)";
$pstmt=pg_prepare($pg_conn,"prep1",$sql);
$r=pg_execute($pg_conn,"prep1",array($i_site,$i_rate,$i_price,$i_sales));

$sql="insert into ratings(item_id,site_name,rating_value,price,sales) values((select max(item_id) from items),$1, $2,$3,$4)";
$pstmt=pg_prepare($pg_conn,"prep2",$sql);
$r=pg_execute($pg_conn,"prep2",array($i_site2,$i_rate2,$i_price2,$i_sales2));












$s = 0;

if($r){ //save successful;
    $s = 1;
}


    if($r  != NULL){
       pg_free_result($r);// free the result set
    }
    if($pg_conn  != NULL){
      pg_close($pg_conn);//closing the connection 
    }

    header("location: itementry.php?status=".$s);
    /* for($i=1;$i<=10;$i++)*/
?>

