<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
function callback_remove() {
	option::pdel('s_check');
}