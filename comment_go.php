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
    $query = "select * from comment where com_num = $number order by number desc";   
    $result = mysqli_query($connect, $query);
    while ($reply = $result->fetch_array()) {
    
    $number = $_GET['no'];
       session_start();

    ?>
  
    <p style="font-size:25px; text-align:center"><b>댓글</b></p>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">댓글</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
         
            </tr>
        </thead>

        <tbody>
            
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $reply['number'] ?>">
                            <?php echo $reply['content'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $reply['content'] ?></td>
                    <td width="200" align="center"><?php echo $rows['pw'] ?></td>
                   
                    </tr>
                <?php
               
            }
                ?>

    
      
    
        </tbody>
    </table>


 <div id="search_box">
  <center>
    <form action="comment_action.php?no=<?php echo $number ?>" method="get">
      <input type="text" name="search" size="40" required="required" /> <button>댓글쓰기</button
    </form>
        </center>
    </div>
        
        

 
 <div class=text>
        <font style="cursor: hand" onClick="location.href='index2.php'">정렬</font>
    </div>
    
</body>

</html>
