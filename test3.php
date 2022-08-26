<?php

if(empty($_REQUEST["search_word"])){ // 검색어가 empty일 때 예외처리를 해준다.

$search_word ="";

}else{

$search_word =$_REQUEST["search_word"];

}

?>



<form class="navbar-form pull-left" method="get" action=""> 

<input type="text" name="search_word" class="form-control" placeholder="검색어를 입력 후 enter를 누르세요" autofocus>

</form>



<?php 

$sql = "SELECT * FROM faqContent where title LIKE '%$search_word%' "; 

?>



// 테이블 생성

<table>

while($info = mysqli_fetch_array($rs)){

            echo '<tr>';

            echo '<th>'.$info['title']."</th>"; 

            echo '<td>'.$info['content']."</td>";

            echo '<td>'.$info['hit']."</td>";

            echo '</tr>';

}

</table>
