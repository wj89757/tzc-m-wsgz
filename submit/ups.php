<?php

header("Content-type:text/html;charset=utf-8");
//设置发件者初始信息从这开始

require("phpmailer/class.phpmailer.php"); 

/*****************************************************************/
 	$mail = new PHPMailer(); 
	$uniq_id = md5(uniqid(time()));
	$mail->SetLanguage('cn', "language/");
	$mail->IsSMTP();                                     // set mailer to use SMTP
	$mail->Host = "smtp.126.com";  // specify main and backup server
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = "tzcwsgz@126.com";  // SMTP username
	$mail->Password = "kghijewgscotqgxd"; // SMTP password
	$mail->From = "tzcwsgz@126.com";
	$mail->FromName = "root";
//以上是设置发件者初始信息到这结束;/**************************************************/

/*$mto=$_REQUEST["mto"];
$mailcc=$_REQUEST["mcc"];
$mailsubject=$_REQUEST["msubject"];
$mailbody=$_REQUEST["mbody"];//echo ($ mailto.$ mailcc.$ mailbody.$ mailsubject);*/
/************************接收表单信息*****************************************/
$openid     = $_POST["openid"];
$river       = $_POST["river"];	//河流名
$sex        = $_POST["sex"];
$age        = $_POST["age"];
$mobile     = $_POST["mobile"];  //地址
$bookdate   = $_POST["bookdate"];   //投诉时间
$bookexpert = $_POST["bookexpert"];   //容忍程度
$con = $_POST["topic_content"];
$loc = $_POST["location"];   //地理坐标
$emails = $_POST["eamil"];    //联系人邮箱
$content = "river:".$river.";<br/>address:".$mobile.";<br/>address-zuobiao:".$loc.";<br/>time:".date('omdH').";<br/>rongrenchengdu:".$bookexpert."<br/>"."miaoshu:".$con."<br/>email:".$emails;
/*********************************************************/


/*$mto=explode(";",$mto);
foreach($mto as $key=>$mto1){
	if (strpos($mto1, '@') !== false) {
	   $mail->AddAddress($mto[$key]);}
};
$mcc=explode(";",$mcc);
foreach($mcc as $key=>$mcc1){
	 if (strpos($mcc1, '@') !== false) {
 	   $mail->AddCC($mcc[$key]);}
};*/


	$uploaddir = 'ups/20151113/';  //建立ups/当前时间/的文件夹来存放文件'.date("omd").'
	if(@opendir($uploaddir))
	{
		//echo($uploaddir.' already exist!</br>');
		@closedir ($uploaddir);
	 }
	else
	{	echo 'Now mkdir will make "'.$uploaddir.'"for you </br>';
		@mkdir($uploaddir);
	}

	$uploadfile = $uploaddir. $_FILES['userfile']['name'];
	//echo($ uploadfile);
	//foreach ($ _FILES['userfile']['name']) {

	//print "<pre>\n";
	//返回一个URL连接
	function url($a,$b)
		 { 
		$url= "<a href='".$a.$b."' title='".$b."' >".$b."</a></br>";
        return "";//"$url\n"; 
		  }
	foreach ($_FILES["userfile"]["size"] as $key => $size) {
		if ($size != 0 ) 
		{
			$tmp_name = $_FILES["userfile"]["tmp_name"][$key];
			$name = $_FILES["userfile"]["name"][$key];
			move_uploaded_file($tmp_name, $uploaddir . $name);
			//$ url= "<a href='".$ uploaddir.$ name."' title='".$ name."' >".$ name."</a></br>";
			//把附件内容添加到邮件中开始:
		   $mail->AddAttachment($uploaddir.$name);         // add attachments
			//把附件内容添加到邮件中结束:
            //print url($uploaddir,$name);
		}
	  } 
	//echo "<p>"."文件路径：".$uploaddir.$name."</p>";
	//echo "<p>"."文件名：".$name."</p>";
  	/************************从下面开始进行mail发送动作;**************************************************/
	
	 $mail->AddAddress('1124119525@qq.com',"username");  // 收件人邮箱和姓名    
	 $mail->AddReplyTo("tzcwsgz@126.com","yourdomain.com");    
	 $mail->AddEmbeddedImage($uploaddir.$name, $uniq_id, "../img/logo.jpg");
			//$mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg");
			//访问嵌入式图片方法为:<img src=cid:$ uniq_id>
	 		//$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->CharSet = "utf-8";   // 这里指定字符集！    
	$mail->Encoding = "base64";    
  			 // $mail->AddAttachment('logo.jpg', "logo.jpg");     // optional name
	$mail->IsHTML(true);                                  // set email format to HTML
	$mail->Subject = /*$mailsubject.*/"weixintousu2";
	$mail->Body    = $content; 
									/*$mailbody.*"<html><head>   
									<meta http-equiv='Content-Language' content='zh-cn'>   
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>   
									</head>   
									<body>   
									I love php. 
								    <?php echo $content;?>
									<!--<img src='cid:$uniq_id'>-->
									</body>   
									</html>";*/
	$mail->AltBody = "text/html";
						//set_time_limit(3);//设定最长执行时间,单位为秒,以免因为发送文件而出现TIME_OUT执行错误
	// echo "Message has been sent555555";
 	$mail->Send();
	  /*if(!$mail->Send())    
		{    
			echo 'Error '."<br/>";    
			echo "Error" . $mail->ErrorInfo;    
			exit;    
		}    
		else {    
			echo "邮件发送成功!"."<br />";    
		}  */  
	// echo "Message has been 6666666666";
	//**************************邮件发送结束***************************************************/

/*
foreach ($ _FILES["userfile"]["error"] as $ key => $ error) {
    if ($ error == UPLOAD_ERR_OK ) {
        $ tmp_name = $ _FILES["userfile"]["tmp_name"][$ key];
        $ name = $ _FILES["userfile"]["name"][$ key];
        move_uploaded_file($ tmp_name, $ uploaddir . $ name);
        //$ url= "<a href='".$ uploaddir.$ name."' title='".$ name."' >".$ name."</a></br>";
        print url($ uploaddir,$ name);          
        }
  }
  */
   /*返回文件链接数组 print "\nFile is valid, and was successfully uploaded.  You can access to your files by clicking below links:\n";
  //  echo()
        print_r($_FILES);      
        if ($handle = opendir($uploaddir)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            echo url($uploaddir,$file)." \n";
        }
    }
    closedir($handle);
}
print "</pre>";*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>"治来水"微信投诉</title>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link href="../css/order.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
  </head>

  <body id="wrap" style="">
    <div class="banner">
      <div id="wrapper">
        <div id="scroller" style="float:none">
          <ul id="thelist">
            <li style="float:none">
              <img src="../img/logo.jpg" alt="" style="width:100%">
            </li>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="cardexplain">
      <ul class="round roundyellow" id="success" style="margin-top:1px" >
        <li style="height:40px;line-height:40px; font-size:14px; text-align:center">提交成功，我们将核实并尽快反映到有关部门!</li>
      </ul>
      <ul class="round">
        <li class="title mb"><span class="none">您提交的信息</span></li>
        <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>被举报河流：</th>
                <td><?php echo $river;?></td>
              </tr>
            </tbody>
          </table>
        </li>
       <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>被举报所在地：</th>
                <td><?php echo $mobile;?></td>
              </tr>
            </tbody>
          </table>
        </li>
      <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>地理坐标：</th>
                <td><?php echo $loc;?></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>举报日期：</th>
                <td><?php echo $bookdate;?></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>容忍程度：</th>
                <td><?php echo $bookexpert;?></td>
              </tr>
            </tbody>
          </table>
        </li>
         <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>描述：</th>
                <td><?php echo $con;?></td>
              </tr>
            </tbody>
          </table>
        </li>
      </ul>
    </div>
  </body>
</html>