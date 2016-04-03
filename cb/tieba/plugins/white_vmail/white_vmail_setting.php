<?php
if (!defined("SYSTEM_ROOT")) {
	msg("Insufficient Permissions");
}
if (ROLE != 'admin') {
	msg('无权访问！');
}
/**
* 变量名称
* @param $verifyKey 发送邮件中的key，用于验证用户身份是否与$verifyCode匹配
* @param $query SQL查询语句
* @param $url 验证链接地址
* @param $verifyCode 验证码
* @param $pluginName 插件名
*/
function sendMail($userMail, $uid) {
	global $m;
	global $today;
	$pluginName = 'white_vmail';

	// 获取8位数的随机验证码并加密
	$verifyCode = rand_int(8);
	$verifyKey = sha1(md5($verifyCode));

	$url = SYSTEM_URL.'?plugin='.$pluginName.'&key='.$verifyKey;

	$title = '邮箱验证 -- '.SYSTEM_NAME;
	$text = 'Hi, 感谢使用贴吧云签到，请登录云签到之后点击链接，验证你的邮箱。<hr/>验证链接：'.$url;
	$mailResult = misc::mail($userMail, $title, $text);
	if ($mailResult != TRUE) {
		msg("向".$userMail."发送邮件失败。");
	}

	$m->query("UPDATE ".DB_PREFIX."users SET white_vmail_send = 1, white_vmail_code = ".$verifyCode." WHERE id = ".$uid);
	Redirect(SYSTEM_URL."index.php?mod=admin:setplug&plug=white_vmail");
}

function del($id) {
	global $m;
	$result = $m->query("SELECT * FROM `".DB_PREFIX."users` WHERE `id`=".$id."");
	$row = $m->fetch_array($result);
	$tieba = $row['t'];
	$m->query("DELETE FROM `".DB_PREFIX."users` WHERE `id`=".$id);
	$m->query("DELETE FROM `".DB_PREFIX."baiduid` WHERE `uid`=".$id);
	$m->query("DELETE FROM `".DB_PREFIX."users_options` WHERE `uid`=".$id);
	$m->query("DELETE FROM `".DB_PREFIX.$tieba."` WHERE `uid`=".$id);
	Redirect(SYSTEM_URL."index.php?mod=admin:setplug&plug=white_vmail");
}

function set($id) {
	global $m;
	$m->query("UPDATE `".DB_PREFIX."users` SET `white_vmail_verify`=1 WHERE `id`=".$id);
	Redirect(SYSTEM_URL."index.php?mod=admin:setplug&plug=white_vmail");
}

function showUsers() {
	global $m;
	$query = "SELECT id, name, email, white_vmail_send, white_vmail_verify FROM `".DB_PREFIX."users` ORDER BY id ASC";
	$result = $m->query($query);
	echo '<div id="mok_me" class="panel panel-primary"><div class="panel-heading">邮箱有效性验证</div><div class="panel-body"><table class="table" style="margin-bottom:0"><thead><tr>';
	echo '<th style="width:7%">UID</th><th style="width:13%">用户名</th><th style="width:23%">Email</th><th style="width:10%">发送状态</th><th style="width:10%">验证状态</th><th style="width:12%">验证</th><th style="width:12%">操作</th><th style="width:13%">设置状态</th></tr></thead>';
	
	while ($row = $m->fetch_array($result)) {
		if ($row['white_vmail_verify'] == 0) {
			$verifyStatus = '<td style="padding:5px 0px 0px 0px;"><a class="btn btn-danger">未验证</a></td>';
		} else {
			$verifyStatus = '<td style="padding:5px 0px 0px 0px;"><a class="btn btn-success">已验证</a></td>';
			$Ban = ' disabled';
		}
		if ($row['white_vmail_send'] == 0) {
			$sendStatus = '<td style="padding:5px 0px 0px 0px;"><a class="btn btn-danger">未发送</a></td>';
		} else {
			$sendStatus = '<td style="padding:5px 0px 0px 0px;"><a class="btn btn-success">已发送</a></td>';
		}
		$sendMail = "<td style='padding:5px 0px 0px 0px;'><a href='".SYSTEM_URL."index.php?mod=admin:setplug&plug=white_vmail&action=send&email=".$row['email']."&uid=".$row['id']."' class='btn btn-primary'".$Ban.">发送邮件</a></td>";
		$delUser = "<td style='padding:5px 0px 0px 0px;'><a href='".SYSTEM_URL."index.php?mod=admin:setplug&plug=white_vmail&action=del&email=".$row['email']."&uid=".$row['id']."' class='btn btn-primary' onclick='return confirm(\"确认删除？\");'>删除用户</a></td>";
		$setUser = "<td style='padding:5px 0px 0px 0px;'><a href='".SYSTEM_URL."index.php?mod=admin:setplug&plug=white_vmail&action=set&email=".$row['email']."&uid=".$row['id']."' class='btn btn-primary'".$Ban.">设为已验证</a></td>";
		echo '<tbody><tr>';
		echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td>".$sendStatus.$verifyStatus.$sendMail.$delUser.$setUser."</tr>";
	}
	echo '</tbody></table></div></div>';
}

showUsers();

if (isset($_GET['action']) && $_GET['action'] == 'send' && isset($_GET['email']) && isset($_GET['uid'])) {
	sendMail($_GET['email'], $_GET['uid']);
}

if (isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['email']) && isset($_GET['uid'])) {
	del($_GET['uid']);
}

if (isset($_GET['action']) && $_GET['action'] == 'set' && isset($_GET['email']) && isset($_GET['uid'])) {
	set($_GET['uid']);
}

echo '<link rel="stylesheet" href="css/main.css" type="text/css" />';
?>
