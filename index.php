<?php
    $connect = mysqli_connect('20.249.82.171', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD') or die("connect failed");
    $query = "select * from board order by number desc";   
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result); 

    session_start();

    if (isset($_SESSION['userid'])) {
    ?><b><?php echo $_SESSION['userid']; ?></b>, HELLO :)
        <button onclick="location.href='logout_action.php'" style="float:right; font-size:15.5px;">L O G O U T</button>
        <br />
    <?php
    } else {
    ?>
        <button onclick="location.href='login.php'" style="float:right; font-size:15.5px;">L O G I N</button>
        <br />
    <?php
    }
    ?>


<!DOCTYPE html>

<html>
<head>
    <meta charset = 'utf-8'>
</head>
<style>
    table{
        border-top: 1px
        border-collapse: collapse;
    }
    tr{
        border-bottom: 1px
        padding: 20px;
        
    }
    td{
        border-bottom: 1px
        padding: 20px;

    }
    table .even{
        background: #f7f0f0;
    }
    .text{
        text-align:center;
        padding-top:20px;

    }
    .text:hover{
        text-decoration: underline;
    }
    
</style>
<body>
<?php

?>

<h2 align=center> B O A R D</h2>
<table align = center>
    <div class =text>
    <text-align: right>
    <font style="cursor: hand"onclick="location.href='login.php'">L O G I N</font>
</div>
    <tr>
<td width = "50" align="center">번호</td>
<td width = "500" align="center">제목</td>
<td width = "100" align="center">작성자</td>
<td width = "200" align="center">날짜</td>
<td width = "50" align="center">조회수</td>
</tr>
</thead>

<tbody>

    <td width = "50" align = "center"><?php echo $ total?></td>
    <td width = "500" align = "center">
     <a href = "view.php?number=<?php echo $rows['number']?>">
     <?php echo $rows['title']?></td>
     <td width = "100" align = "center"><?php echo $rows['id']?></td>
    <td width = "200" align = "center"><?php echo $rows['date']?></td>
    <td width = "50" align = "center"><?php echo $rows['hit']?></td>
    
</tbody>
</table>

<div class = text>
    <font style="cursor: hand"onclick="location.href='write.php'">W R I T E</font>
</body>
</html>