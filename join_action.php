<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 1 );
?>

<?php
    $connect = mysqli_connect("localhost","team-h","Dnjswndbf3.14","DB_BOARD")

    $id=$_POST['id'];
    $pw=$_POST['pw'];

    $query1 = "select * from member where id ='$id'";
    $result1 = $connect->query($query1);
    $count = mysqli_num_rows($result1);

    if ($count) {
    echo "<script>alert('ID ALREADY EXIST');history.back();</script>";
    } else {

        $query = "insert into member(id, pw, date, permit) values('$id', '$pw', now(), 0)";

        $result = $connect->query($query);

if ($result) {
    ?> <script>
        alert('SIGN UP SUCCESS');
        location.replace("login.php");
        </script>

    <?php } else {
        ?> <script>
            alert("SIGU UP FAILED");
            </script>
    <?php }

    }
    mysqli_close($connect);
    ?>


    $result = $connect->query($query);

    if ($result) {
    ?>       <script>
              alert('가입 되었습니다.');
              location.replace("./index.php");
              </script>
   <?php }
            else{
?>              <script>

                        alert("fail");
                </script>
<?php    }

                mysqli_close($connect);
?>
      
    
