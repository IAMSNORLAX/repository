<?php 
    $connect = mysqli_connect('localhost,')
    $number = $_POST['number'];
    session_start();
    $query = ""
    $result = $connect->query($query);
    $rows - mysqli_fetch_assoc($result);
?>

<table class="view_table" align=center>
<tr>
    <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
</tr>
<tr>
    <td class="view_id">WRITER</td>
    <td class="view_id"><?php echo $rows['id']?></td>
    <td class="view_hit">VIEWS</td>
    <td class="view_hit2"<?php echo $rows['hit']?></td>
</tr>

<tr>
    <td colspan="4" class="view_content" vallign="top">
    <?php echo $rows['content']?></td>
</tr>
</table>

<div class="view_btn">
        <buttion class="view_btn1" onclick="location.href='index.html'">TO BOARD</button>
        <buttion class="view_btn1" onclick="location.href='modify.php?number=<?=number?>&id=<?$_SESSION['userid']?>'">EDIT</button>
        <buttion class="view_btn1" onclick="location.href='delete.php?number=<?=number?>&id=<?$_SESSION['userid']?>'">DELETE</button>
