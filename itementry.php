<?php
require 'pg_connect.php';
?>
<html>
    <body>
        <?php
        $sql = "SELECT * FROM mas_category";
        $result =  pg_query($pg_conn, $sql);
        
        $slist = "";
        
        while( $row = pg_fetch_object($result) ){ // the loop continues untill the data pointer reaches NULL
            $slist = $slist."<option value=".$row->cat_id.">".$row->cat_name."</option>";
        } 
        ?>
        <form action="saveitem.php" method="post">
        <select name="ddlcategory" id="ddlcategory" >
                        
                        <option value="0">Select category</option>
                        <!-- <option value="1">Tripura</option>
                        <option value="2">West Bengal</option> -->
                        <?php
                            echo $slist;
                        ?>
                    </select>
                    <br>
                    <input type="text" id="txtname" name="txtname" placeholder="enter itemname"><br>
                    <textarea id="txtdesc" name="txtdesc" rows="4" cols="50">
                    </textarea><br>
                    <input type="text" id="txtsite" name="txtsite" placeholder="enter sitename">
                    <input type="text" id="txtrate" name="txtrate" placeholder="enter rating">
                    <input type="text" id="txtprice" name="txtprice" placeholder="enter price">
                    <input type="text" id="txtsales" name="txtsales" placeholder="enter sales"><br>


                    <input type="text" id="txtsite2" name="txtsite2" placeholder="enter sitename">
                    <input type="text" id="txtrate2" name="txtrate2" placeholder="enter rating">
                    <input type="text" id="txtprice2" name="txtprice2" placeholder="enter price">
                    <input type="text" id="txtsales2" name="txtsales2" placeholder="enter sales"><br>
                    <button type="submit" > save </button>

</form>
                    
    </body>
</html>
<head>
    <style>
      body {
        font-family: Arial, sans-serif;
      }

      form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
      }

      select,
      input,
      textarea,
      button {
        margin-bottom: 10px;
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
      }

      button {
        background-color: #00acd6;
        color: white;
        cursor: pointer;
      }

      button:hover {
        background-color: #007bb5;
      }
    </style>
  </head>
