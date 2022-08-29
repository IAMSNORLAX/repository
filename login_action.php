<?php
        session_start();

        $connect = mysqli_connect('localhost','team-h','Dnjswndbf3.14','DB_BOARD') or die("fail");

        $id=htmlentities($_POST['id'],ENT_QUOTES);
        $pw=htmlentities($_POST['pw'],ENT_QUOTES);


        $query = "select * from member where id='$id'";
        $result = $connect->query($query);

        if(mysqli_num_rows($result)==1) 
            $row=mysqli_fetch_assoc($result);


      
        


            if($row['pw']==$pw){
                $_SESSION['userid']=$id;
                if(isset($_SESSION['userid'])){
                echo  "<script>
                        alert('L O G I N  S U C C E S S.');
                        location.replace('./index.php');
                    </script>";
                }
            }
               
              
            else{
                   echo"<script>
                        alert('E R R O R');
                        history.back();
                    </script>";
            }
?>
