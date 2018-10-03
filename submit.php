<?php
$openid     = $_POST["openid"];
$name       = $_POST["name"];
$sex        = $_POST["sex"];
$age        = $_POST["age"];
$mobile     = $_POST["mobile"];
$bookdate   = $_POST["bookdate"];
$bookexpert = $_POST["bookexpert"];

$con = $_POST["topic_content"];

$loc = $_POST["location"];
//$longitudephp = $_POST["longitude"];


		$content = "被举报河道：".$name.";<br/>地址：".$mobile.";<br/>地理坐标：".$loc.";<br/>时间:".$bookdate.";<br/>容忍程度：".$bookexpert."<br/>描述:".$con;
/**
	 * 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
	 * 1. 用户名和密码是否正确；
	 * 2. 检查邮箱设置是否启用了smtp服务；
	 * 3. 是否是php环境的问题导致；
	 * 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
	 * 5. 如果还是不能解决，可以访问：http://www.daixiaorui.com/read/16.html#viewpl 
	 *    下面的评论中，可能有你要找的答案。
	 */

	require_once "email.class.php";
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.126.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "tzcwsgz@126.com";//SMTP服务器的用户邮箱
	$smtpemailto = "1124119525@qq.com";//发送给谁
	$smtpuser = "tzcwsgz@126.com";//SMTP服务器的用户帐号
	$smtppass = "kghijewgscotqgxd";//SMTP服务器的用户密码
	$mailtitle = "weixintousu";//邮件主题
	$mailcontent = "<pre>".$content."</pre>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
		echo "<a href='index.html'>点此返回</a>";
		exit();
	}
	//echo "恭喜！邮件发送成功！！";
	$chenggong="您已成功提交，我们核实并将尽快反映到有关部门！";
	//echo "<a href='index.html'>点此返回</a>";
	echo "</div>";




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
    <link href="css/order.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </head>

  <body id="wrap" style="">
    <div class="banner">
      <div id="wrapper">
        <div id="scroller" style="float:none">
          <ul id="thelist">
            <li style="float:none">
              <img src="img/logo.jpg" alt="" style="width:100%">
            </li>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="cardexplain">
      <ul class="round roundyellow" id="success" >
        <li style="height:40px;line-height:40px; font-size:14px; text-align:center"><?php echo $chenggong;?></li>
      </ul>
      <ul class="round">
        <li class="title mb"><span class="none">您提交的信息</span></li>
        <li class="nob" style="height:30px;line-height:30px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
            <tbody>
              <tr>
                <th>被举报河流：</th>
                <td><?php echo $name;?></td>
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
                <th>坐标：</th>
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