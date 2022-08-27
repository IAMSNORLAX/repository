<?php
        session_start();

        $connect = mysqli_connect('localhost','team-h','Dnjswndbf3.14','DB_BOARD') or die("fail");

        $id=$_POST['id'];
        $pw=$_POST['pw'];


        $query = "select * from member where id='$id'";
        $result = $connect->query($query);

        if(mysqli_num_rows($result)==1) 
            $row=mysqli_fetch_assoc($result);


        if ( ($id=='') || ($pw=='') ) {  echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.');
        history.back();</script>";  exit;

        


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
