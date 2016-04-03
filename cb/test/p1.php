<?php
    @session_start();
    $_SESSION['var1']='传递值';
    $sn = session_id();
    $url="<a href="."\"p2.php?s=".$sn."\">下一页</a>";
    echo $url;
	echo $sn;
?>