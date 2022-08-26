<?php
        $connect = mysqli_connect('localhost','team-h','Dnjswndbf3.14','DB_BOARD') or die("fail");

        $id = $_POST["name"];
        $pw = $_POST["pw"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $date = date('Y-m-d H:i:s');

     

        $query = "insert into board (title, content,id, pw, date, hit)
                values('$title', '$content','$id', '$pw', '$date', 0)";

    $result = $connect->query($query);
    if($result){
    echo"<script>
            alert(' 글이 등록되었습니다.');
            location.replace('index.php');
        </script>";

    }
    //else{
       // echo "F A I L";
   // }
    mysqli_close($connect);
?>

