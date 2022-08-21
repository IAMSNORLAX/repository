
<?php
$con = mysqli_connect(localhost,team-h,Dnjswndbf3.14,DB_BOARD);    
          
	if (mysqli_connect_errno($con)){         
		echo "DB 연결 실패:" . mysqli_connect_error(); 
    }else{         
    	echo "DB 연결 성공" ;	 
     }  
?>
 