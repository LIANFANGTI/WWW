<?php
    session_id($_GET['s']);
    session_start();
    echo "���ݵ�session����var1��ֵΪ��".$_SESSION['var1'];
?>