<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table {
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #444444;
            padding: 10px;
        }

        td {
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }

        table .even {
            background: #efefef;
        }

        .text {
            text-align: center;
            padding-top: 20px;
            color: #000000
        }

        .text:hover {
            text-decoration: underline;
        }

        a:link {
            color: #57A0EE;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD') or die("connect failed");
    $query = "select * from board order by number desc";   
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result);  
       session_start();

    if (isset($_SESSION['userid'])) {
    ?><b><?php echo $_SESSION['userid']; ?></b>님 반갑습니다.
        <button onclick="location.href='logout.php'" style="float:right; font-size:15.5px;">로그아웃</button>
        <br />
    <?php
    } else {
    ?>
        <button onclick="location.href='login.php'" style="float:right; font-size:15.5px;">로그인</button>
        <br />
    
    
    
    <?php
    }
    ?>
    
    <p style="font-size:25px; text-align:center"><b>게시판</b></p>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
            </tr>
        </thead>
       
        <?php
        $indexnumber = 1;
         if(isset ($_GET['page'])){
          $page = ($_GET['page'];
            }else{
              $page = 1;
            }
              
              $query1 = ("select * from board");
              $result1 = mysqli_query($connect, $query1);
              $row_num = mysqli_num_rows($result1); //게시판 총 레코드 수
              $list = 5; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

              $query2 = ("select * from board order by number desc limit $start_num, $list");  
              $result2 = mysqli_query($connect, $query2);
              while($board = $result2->fetch_array()){
              $title=$board["title"]; 
                if(strlen($title)>30)
                { 
                  $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                }
                $query3 = ("select * from comment where number='".$board['number']."'");
                $result3 = mysqli_query($connect, $query3);
                $rep_count = mysqli_num_rows($result3);
                
              ?>

        <tbody>
           
                    <td width="50" align="center"><?php echo $indexnumber++?></td>
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $board['number'] ?>">
                            <?php echo $board['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $board['id'] ?></td>
                    <td width="200" align="center"><?php echo $board['date'] ?></td>
                    <td width="50" align="center"><?php echo $board['hit'] ?></td>
                    </tr>
                <?php
                $row_num--;
            }
                ?>
                

    
      <div id="search_box">
    <form action="search_result.php" method="get">
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
        <select name="catgo">
            <option value="title">제목</option>
             <option value="name">글쓴이</option>
             <option value="contentn">내용</option>
        </select> 
    </form>
    </div>

        </tbody>
       
    </table>
    <div id="page_num">
      <ul>
        <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<li><a href='?page=1'>처음</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면 빈값
            
          }else{
          $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          }else{
            $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>
    </div>

    <div class=text>
        <font style="cursor: hand" onClick="location.href='write.php'">글쓰기</font>
    </div>
 <div class=text>
        <font style="cursor: hand" onClick="location.href='index2.php'">정렬</font>
    </div>
    
</body>

</html>


