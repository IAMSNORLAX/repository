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
    <table align = center>
    <div class =text>
    <text-align: right>
   
</div>

<h2 align=center> B O A R D</h2>
    <tr>
<td width = "50" align="center">번호</td>
<td width = "500" align="center">제목</td>
<td width = "100" align="center">작성자</td>
<td width = "200" align="center">날짜</td>
<td width = "50" align="center">조회수</td>
</tr>
</thead>

<tbody>
<?php
 $connect = mysqli_connect('localhost', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD') or die ("C O N N E C T  F A I L")
 $query = "select * from board order by number desc";
 $result = $connect->query($query);
 $total = mysqli_num_rows($result);

            while ($rows = mysqli_fetch_assoc($result)) {
            
                    
                    <td width="50" align="center"> echo $total </td>
                    <td width="500" align="center">
                        <a href="view.php?number= echo $rows['number']">
                             echo $rows['title'] 
                    </td>
                    <td width="100" align="center"> echo $rows['id']</td>
                    <td width="200" align="center"> echo $rows['date']</td>
                    <td width="50" align="center"> echo $rows['hit']</td>
                    </tr>
                
                $total--;
            }
 ?>
</tbody>
</table>

<div class = text>
    <font style="cursor: hand"onclick="location.href='write.php'">W R I T E</font>
</body>
</html>
