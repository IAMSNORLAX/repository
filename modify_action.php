<?php
$connect = mysqli_connect('localhost', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD') or die("connect failed");

$number = htmlentities($_POST['number'],ENT_QUOTES);
$title = htmlentities($_POST['title'],ENT_QUOTES);
$content = htmlentities($_POST['content'],ENT_QUOTES);

$date = date('Y-m-d H:i:s');

$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) {
?>
    <script>
        alert("수정되었습니다.");
        location.replace("./read.php?number=<?= $number ?>");
    </script>
<?php } else {
    echo "다시 시도해주세요.";
}
?>
