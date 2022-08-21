<?php
    $connect = mysqli_connect('20.249.82.171','Team-H','dnjswndbf3.14','DB_BOARD') or die("fail");

    $id=$_POST['id'];
    $pw=$_POST['pw'];
    $email=$_POST['email'];
    $name=$_POST['name'];

    $date = date('Y-m-d H:i:s');

    $query = "insert into member (id, pw, date) values ('$id', '$pw', '$date', 0)";


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
      
    
