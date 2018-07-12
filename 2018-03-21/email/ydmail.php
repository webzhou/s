<?PHP
require_once("phpmailer/class.phpmailer.php"); 
require_once("phpmailer/class.smtp.php");
//获取地址
$url = $_SERVER['HTTP_REFERER'];

//配置文件
$mailUser  = '2334471588@qq.com';
$mailSub = "test__".$_POST['name'].'-'.$_POST['phone'];
$mailBody ='<style>.h{width:100%;height:42px;line-height:42px;float:left;} .t{width:200px;float:left;color:red;}.c{width:288px;float:left;}</style>'. 
    '<div class="h"><div class="t">姓名：</div><div class="c">'.$_POST['name'].'</div></div>'.
    '<div class="h"><div class="t">电话：</div><div class="c">'.$_POST['phone'].'</div></div>'.
    '<div class="h"><div class="t">来源地址1：</div><div class="c">'.$url.'</div></div>';

$mailSever = 'hyjk888@hyjkbdfyy.com'; //邮件服务器
$mailSeverUser = 'xxx'; // SMTP服务器用户名
$mailSeverPass = 'xxx';// SMTP服务器密码

$mail             = new PHPMailer(); //PHPMailer对象
$mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
$mail->IsSMTP();  // 设定使用SMTP服务
$mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
$mail->Host       = 'smtp.ym.163.com';  // SMTP 服务器
$mail->Port       = 25;  // SMTP服务器的端口号
$mail->Username   = $mailSeverUser;  // SMTP服务器用户名
$mail->Password   = $mailSeverPass;  // SMTP服务器密码
$mail->SetFrom($mailSever, $mailSever);
$mail->AddReplyTo($mailSever, $mailSever);
$mail->IsHTML(true);
$mail->Subject = $mailSub;
$mail->Body = $mailBody;
    
$mail->AddAddress($mailUser, 'zyd');	//

if(empty($_POST['name'])||empty($_POST['phone'])){
	return;
}else{
	$status = $mail->send();
}
//return
if($status) {
  echo 1;
}else{
  echo '发送邮件失败，错误信息：'.$mail->ErrorInfo;
}
?>


