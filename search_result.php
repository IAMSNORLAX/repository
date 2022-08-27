<?php

  $connect = mysqli_connect('localhost', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD') or die("connect failed");
  $query = "select * from board order by number desc";   
  $result = mysqli_query($connect, $query);
  $total = mysqli_num_rows($result);  
  session_start();
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
</head>
<body>
<div id="board_area"> 
<!-- 18.10.11 검색 추가 -->
<?php
 
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>
    <?php if($catagory=='title'){
        $catname = '제목';
    } else if($catagory=='id'){
        $catname = '작성자';
    } else if($catagory=='content'){
        $catname = '내용';
    } ?>
  <h1><?php echo $catname; ?>:<?php echo $search_con; ?> 검색결과</h1>
  <h4 style="margin-top:30px;"><a href="index.php">홈으로</a></h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70"> 번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
          $sql2 = query("select * from board where $catagory like '%$search_con%' order by number desc");
      <?php echo mysql_error;?>
          while($board = $sql2->fetch_array()){
           
          $title=$board["title"]; 
            if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
            //$sql3 = query("select * from reply where con_num='".$board['number']."'");
            //$rep_count = mysqli_num_rows($sql3);
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['number']; ?></td>
          <td width="500">
            <?php 
              
              if($board['number'])
              { ?><a href='read.php?number=<?php echo $board["number"];?>'><?php echo $title;
              }else{?>

        <!--- 추가부분 18.08.01 --->
        <?php
          $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
          $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음
          
       
          ?>
        <!--- 추가부분 18.08.01 END -->
        <a href='read.php?number=<?php echo $board["number"]; ?>'><span style="background:yellow;"><?php echo $title; }?></span><span class="re_ct"></span></a></td>
          <td width="120"><?php echo $board['id']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>

        </tr>
      </tbody>

      <?php } ?>
    </table>
    <!-- 18.10.11 검색 추가 -->
    <div id="search_box2">
      <form action="search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="id">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
    </form>
  </div>
</div>
</body>
</html>
