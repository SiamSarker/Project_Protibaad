<?php
    session_start();
    if(isset($_SESSION['username']) && !empty($_SESSION['username'])){

      if(isset($_GET['id']) && !empty($_GET['id'])){
            $id=$_GET['id'];
            try{

              $conn=new PDO("mysql:host=localhost:3306;dbname=protibaad;", "root", "");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sqlquary="UPDATE blog SET status = 'Approved' WHERE file_id = $id";
              $conn->exec($sqlquary);

              ?>
              <script>location.assign("adminblog.php");</script>
              <?php
            }
            catch(PDOException $ex){
                ?>
                    <script>location.assign("adminblog.php");</script>
                <?php
            }


        }
        else{
          ?>
          <script>location.assign("admin.php");</script>
          <?php
        }
    }
    else{
      ?>
      <script>location.assign("index.php");</script>
      <?php
    }
?>