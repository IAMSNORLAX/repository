<?php
$connect = mysqli_connect("localhost", "team-h", "Dnjswndbf3.14", "DB_BOARD") or die("fail");

                 
$title = $_POST['title'];               
$content = $_POST['content'];           
$date = date('Y-m-d H:i:s');   


$URL = './index.php';                   


$query = "INSERT INTO comment (id, content, date, pw) 
        values('$id','$content;','$date', '$pw')";




$result = $connect->query($query);


if ($result) {
?> <script>
        alert("<?php echo "댓글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "댓글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>

<meta http-equiv="refresh" content="0 url=/" />
