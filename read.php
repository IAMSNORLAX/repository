<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <style>
        .read_table {
            border: 1px solid #444444;
            margin-top: 30px;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
            text-align: center;
            background-color: #3C3C3C;
            color: white;
            width: 1000px;
        }

        .read_id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
            height: 33px;
        }

        .read_id2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
            height: 33px;
        }

        .read_hit2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
            height: 500px;
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 40px;
        }

        .read_btn1 {
            height: 45px;
            width: 90px;
            font-size: 20px;
            text-align: center;
            background-color: #3C3C3C;
            border: 2px solid black;
            color: white;
            border-radius: 10px;
        }

        .read_comment_input {
            width: 700px;
            height: 500px;
            text-align: center;
            margin: auto;
        }

        .read_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        .read_com_id {
            width: 100px;
        }

        .read_comment {
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'team-h', 'Dnjswndbf3.14', 'DB_BOARD');
    $number = $_GET['number'];  
    session_start();
    $query = "select title, content, date, hit, id, file from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);

    $hit = "update board set hit = hit + 1 where number = $number";
    $connect->query($hit);

    if (isset($_SESSION['userid'])) {
    ?><b>
        <?php echo $_SESSION['userid']; ?>
    </b>님 반갑습니다.
    <button onclick="location.href='./logout.php'" style="float:right; font-size:15.5px;">로그아웃</button>
    <br />
    <?php
    } else {
    ?>
    <button onclick="location.href='./login.php'" style="float:right; font-size:15.5px;">로그인</button>
    <br />
    <?php
    }
    ?>

    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title">
                <?php echo $rows['title'] ?>
            </td>
        </tr>
        <tr>
            <td class="read_id">작성자</td>
            <td class="read_id2">
                <?php echo $rows['id'] ?>
            </td>
            <td class="read_hit">조회수</td>
            <td class="read_hit2">
                <?php echo $rows['hit'] + 1 ?>
            </td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?>
            </td>
        </tr>
    </table>

    <div class="read_btn">
        <button class="read_btn1" onclick="location.href='./index.php'">목록</button>&nbsp;&nbsp;
        <?php
        if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
        <button class="read_btn1" onclick="location.href='./modify.php?number=<?= $number ?>'">수정</button>&nbsp;&nbsp;
        <button class="read_btn1" a onclick="ask();">삭제</button>

        <!--- 댓글 불러오기 -->
        <div class="reply_view">
            <h3>댓글목록</h3>
            <?php
$sql3 = query("select * from reply where con_num='".$bno."' order by idx desc");
while($reply = $sql3->fetch_array()){
?>
            <div class="dap_lo">
                <div><b>
                        <?php echo $reply['name'];?>
                    </b></div>
                <div class="dap_to comt_edit">
                    <?php echo nl2br("$reply[content]"); ?>
                </div>
                <div class="rep_me dap_to">
                    <?php echo $reply['date']; ?>
                </div>
                <div class="rep_me rep_menu">
                    <a class="dat_edit_bt" href="#">수정</a>
                    <a class="dat_delete_bt" href="#">삭제</a>
                </div>
                <!-- 댓글 수정 폼 dialog -->
                <div class="dat_edit">
                    <form method="post" action="/BBS/rep_modify_ok.php">
                        <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden"
                            name="b_no" value="<?php echo $bno; ?>">
                        <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
                        <textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
                        <input type="submit" value="수정하기" class="re_mo_bt">
                    </form>
                </div>
                <!-- 댓글 삭제 비밀번호 확인 -->
                <div class='dat_delete'>
                    <form action="/BBS/reply_delete.php" method="post">
                        <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden"
                            name="b_no" value="<?php echo $bno; ?>">
                        <p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
                    </form>
                </div>
            </div>
            <?php } ?>

            <!--- 댓글 입력 폼 -->
            <div class="dap_ins">
                <form action="/BBS/reply_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
                    <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
                    <div style="margin-top:10px; ">
                        <textarea name="content" class="reply_content" id="re_content"></textarea>
                        <button id="rep_bt" class="re_bt">댓글</button>
                    </div>
                </form>
            
        </div>
        <!--- 댓글 불러오기 끝 -->
        <div id="foot_box"></div>
   


    <div>
        파일 : <a href="./upload/<?php echo $rows['file'];?>" download>
            <?php echo $rows['file']; ?>
        </a>
    </div>


    <script>
        function ask() {
            if (confirm("게시글을 삭제하시겠습니까?")) {
                window.location = "./delete.php?number=<?= $number ?>"
            }
        }
    </script>

    <?php } ?>

    </div>
</body>

</html>
