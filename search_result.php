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
    $keyword = $_GET['search'];
    $sql = "select * from DB_BOARD where board like '%$keyword%'";
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

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) { 
                if ($total % 2 == 0) {
            ?>
                  
                    <?php } ?>
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $rows['number'] ?>">
                            <?php echo $sql?>
                    </td>
                    <td width="100" align="center"><?php echo $rows['id'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
    
      <div id="search_box">
    <form action="search_result.php" method="get">
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
        </tbody>
    </table>

    <div class=text>
        <font style="cursor: hand" onClick="location.href='write.php'">글쓰기</font>
    </div>
 <div class=text>
        <font style="cursor: hand" onClick="location.href='index2.php'">정렬</font>
    </div>
    
</body>

</html>
