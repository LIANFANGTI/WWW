<?php
    @session_start();
    $_SESSION['var1']='����ֵ';
    $sn = session_id();
    $url="<a href="."\"p2.php?s=".$sn."\">��һҳ</a>";
    echo $url;
	echo $sn;
?>