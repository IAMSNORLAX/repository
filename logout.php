<?php
    session_start();
    session_destroy();
    ?>
<script>
    alert("YOU'VE BEEN LOGGED OUT");
    location.replace('index.html');
    </script>