    <div class="dap_ins">
        <form action="reply_ok.php?board_id=<?echo $board_id;?>&idx=<?php echo $bno; ?>" method="post">
            <input type="hidden" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" value=<?$_SESSION['userid']?>>
            <div style="margin-top:10px; ">
                <textarea name="content" class="reply_content" id="re_content" ></textarea>
                <button id="rep_bt" class="re_bt">댓글</button>
            </div>
        </form>
    </div>
