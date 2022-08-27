<?php
 $connect = mysqli_connect('localhost', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD');
     $bno = $_GET['number'];  
$date = date('Y-m-d H:i:s'); 
     session_start();
   
    
    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){
        $sql = query("insert into comment(number,id,content, date ,pw) values('".$bno."','".$_POST['dat_user']."','".$_POST['content']."','".$date."', '".$userpw."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='/read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
?>
