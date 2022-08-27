<?php
$connect = mysqli_connect("localhost", "team-h", "Dnjswndbf3.14", "DB_BOARD") or die("fail");

$id = $_POST['name'];                 
$title = $_POST['title'];               
$content = $_POST['content'];           
$date = date('Y-m-d H:i:s');            

$URL = './index.php';                   


$query = "INSERT INTO board (number, title, content, date, hit, id,file) 
        values(null,'$title', '$content', '$date', 0, '$id','$name')";


$result = $connect->query($query);


if($_FILES['upload_file'] != NULL){
    $tmp_name = $_FILES['upload_file']['tmp_name'];
    $name = $_FILES['upload_file']['name'];
    $path = "./files/$username";
    if(!file_exists($path)){
        mkdir($path, 0777, true);
        chmod($path, 0777);
        $up = move_uploaded_file($tmp_name, "$path/$name");
    }else{
        $up = move_uploaded_file($tmp_name, "$path/$name");
    }
}else{
    $name = "NULL";
}

 

if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>

