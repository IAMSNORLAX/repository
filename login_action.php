<?php
        session_start();

        $connect = mysqli_connect('localhost','team-h','Dnjswndbf3.14','DB_BOARD') or die("fail");

        $id=$_GET['id'];
        $pw=$_GET['pw'];


        $query = "select * from member where id='$id'";
        $result = $connect->query($query);

        if(mysqli_num_rows($result)==1) 
            $row=mysqli_fetch_assoc($result);


            if($row['pw']==$pw){
                $_SESSION['userid']=$id;
                if(isset($_SESSION['userid'])){
                   echo  "<script> alert('로그인 되었습니다.');
                        location.replace('index.html');
                    </script>";
                    
                }
                else{
                    echo "session fail";
                }
            }
            
            else{
                echo  "<script>
                        alert('아이디 혹은 비밀번호가 잘못되었습니다.');
                        history.back();
                    </script>";
            }
        
        }
            else{
              echo  "<script>
                    alert('아이디 혹은 비밀번호가 잘못되었습니다.');
                    history.back();
                    </script>";

            }
?>

