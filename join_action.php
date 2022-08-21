<?php
    $connect = mysqli_connect('localhost','','','') or die("fail");

    $id=$_get[id];
    $pw=$_get[pw];

    $date = date('Y-m-d H;i;s');

    $query = "insert into member (id, pw, email, name, date) values ('$id', '$pw', '$email', '$name', '$date', 0)";


    $result - $connect->query($query);

    if($result) {
     ?>         <script>
              alert('가입 되었습니다.');
              location.replace("index.php");
              </script>
   <?php }
      
    