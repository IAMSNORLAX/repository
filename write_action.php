<?php



$connect = mysqli_connect("localhost", "team-h", "Dnjswndbf3.14", "DB_BOARD") or die("fail");

                 
$title = htmlentities($_POST['title'],ENT_QUOTES);               
$content = htmlentities($_POST['content'],ENT_QUOTES);           
$date = date('Y-m-d H:i:s');   



$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "./upload/".$filename;
move_uploaded_file($tmpfile,$folder);

$arr = array('php', 'phps', 'php3', 'php4', 'php5', 'php7', 'pht', 'phtml', 'htm',  'html',  'inc', 'phar');

$exts = explode('.', strtolower($folder));

foreach($arr as $val)
{
  if(in_array($val, $exts))
  {
    echo '<b>' . $val . '</b> 는 업로드 할 수 없습니다.';
    exit;
  }
}


$URL = './index.php';                   


$query = "INSERT INTO board (title, content, date, hit, id, file) 
        values('".$title."', '".$content."', '".$date."', 0, '".$_POST['name']."','".$o_name."')";




$result = $connect->query($query);


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

<meta http-equiv="refresh" content="0 url=/" />

