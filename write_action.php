<?php
        $connect = mysqli_connect('localhost','team-h','Dnjswndbf3.14','DB_BOARD') or die("fail");

        $id = $_GET[name];
        $pw = $_GET[pw];
        $title = $GET[title];
        $content = $_GET[content];
        $date = date(Y-m-d H:i:s);

        $URL = 'index.html';

        $query = "insert into board (number, title, title content, date, hit, id, pw)
                valuse(null, '$title', '$content', '$date', 0, '$id', '$pw')";

    $result = $connect->query($query);
    if($result){
    echo"<script>
            alert(' 글이 등록되었습니다.');
            location.replace('echo $URL?');
        </script>";

    }
    else{
        echo "F A I L";
    }
    mysqli_close($connect);
?>
