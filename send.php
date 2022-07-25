<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Origin,  Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('db/config.php');

function _secure($var){
	global $my_connect;
	return mysqli_real_escape_string($my_connect, $var);
}

date_default_timezone_set("Asia/Baghdad");
$current_time = date('Y/m/d&h:i:s_A');

$data = Array();
$i = 0;
$data[$i] = array();

if(isset($_POST['site_link']) && isset($_POST['dept_name'])
	&& isset($_POST['phone']) && isset($_POST['email'])
	&& isset($_POST['site_type']) && isset($_POST['reason'])){
		
	$site_link = _secure($_POST['site_link']);
	$dept_name = _secure($_POST['dept_name']);
	$phone = _secure($_POST['phone']);
	$email = _secure($_POST['email']);
	$site_type = _secure($_POST['site_type']);
	$reason = _secure($_POST['reason']);
	
	$in = "insert into fake_site values('', '$site_link', '$dept_name', '$phone', '$email', '$site_type', '$reason', '$current_time')";
	$q = mysqli_query($my_connect, $in);
	
	if($q === true){
		$data[$i]['error'] = 0;
		$data[$i]['message_title'] = "تم";
		$data[$i]['error_message'] = " شكراً لتعاونكم معنا - تم ارسال الاستمارة بنجاح ";
	}else{
		$data[$i]['error'] = 1;
		$data[$i]['message_title'] = "تنبيه !";
		$data[$i]['error_message'] = " لم تتم عملية الارسال ";
	}
}else{
	$data[$i]['error'] = 1;
	$data[$i]['message_title'] = "تنبيه !";
	$data[$i]['error_message'] = " يجب ملء جميع الحقول";
}
$out = array_values($data);
echo json_encode($out, JSON_UNESCAPED_UNICODE);
?>