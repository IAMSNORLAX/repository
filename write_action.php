<?php
        $connect = mysqli_connect('localhost','team-h','Dnjswndbf3.14','DB_BOARD') or die("fail");

        $id = $_POST[name];
        $pw = $_POST[pw];
        $title = $_POST[title];
        $content = $_POST[content];
        $date = date('Y-m-d H:i:s');

        $URL = 'index.html';

        $query = "insert into board ('number', 'title', 'content', 'date', 'hit', 'id', 'pw')
                values(null, '$title', '$content', '$date', 0, '$id', '$pw')";

    $result = $connect->query($query);
    if($result){
    echo"<script>
            alert(' 글이 등록되었습니다.');
            location.replace('echo $URL?');
        </script>";

    }
    //else{
       // echo "F A I L";
   // }
    mysqli_close($connect);
?>

