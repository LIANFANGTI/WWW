<?php
    session_id($_GET['s']);
    session_start();
    echo "传递的session变量var1的值为：".$_SESSION['var1'];
?>