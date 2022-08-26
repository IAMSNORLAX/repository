<?php 

$connect - mysqli_connect('localhost','team-h','Dnjswndbf3.14', 'DB_BOARD');

$sql="select * from board order by no desc";
$result-mysqli_query($con,$sql);

while($row-mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

    <tr>
    <td><?=$row['name']?></td>
    <td><?=$row['title']?></td>
    <td><?=$row['content']?></td>
    </tr>
<?php}
?>
