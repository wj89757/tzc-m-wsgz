<?php
$openid = $_GET["openid"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>“治来水"投诉</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link href="css/order.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>  
  </head>

  <body id="wrap" style="">
    <style>
      .deploy_ctype_tip{z-index:1001;width:100%;text-align:center;position:fixed;top:50%;margin-top:-23px;left:0;}.deploy_ctype_tip p{display:inline-block;padding:13px 24px;border:solid #d6d482 1px;background:#f5f4c5;font-size:16px;color:#8f772f;line-height:18px;border-radius:3px;}
    </style>
    <div class="banner">
      <div id="wrapper">
        <div id="scroller" style="float:none">
          <ul id="thelist"><img src="img/logo.jpg" alt="微信投诉" style="width:100%">
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="cardexplain">
      <ul class="round">
        <li>
          <h2>"治来水"微信投诉</h2>
          <div class="text">
            "治来水"竭诚为您服务<br/>
          联系电话：18405865011/18405865735</div>
        </li>
      </ul>
      <form method="post" action="submit.php" id="form" onsubmit="return tgSubmit()">
        <ul class="round">
          <li class="title mb"><span class="none">请填写以下信息</span></li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>被举报河流*</th>
                  <td><input type="text" class="px" placeholder="请输入您要举报的河流" id="name" name="name" value="">
                    
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>被举报所在地*</th>
                  <td><input type="text" class="px" placeholder="请输入河流大概地址" id="mobile" name="mobile" value="">
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
            <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>举报日期*</th>
                  <td>
                    <select style="line-height:35px;" id="bookdate" name="bookdate" class="dropdown-select">
                      <option value="" selected="">请选择举报日期</option>
                      <?php
                      for ($i = 1; $i <= 6; $i++) {
                        $offset = strtotime("-".($i-1)." day");
                        $bDate = date("m月d日",$offset);
                        $optionString .= '<option value="'.$bDate.'">'.$bDate.'</option>';
                      }
                      echo $optionString;
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>您对此的容忍程度*</th>
                  <td><select style="line-height:35px;" id="bookexpert" name="bookexpert" class="dropdown-select"><option value="" selected="">请选择程度</option><option value="不能忍">不能忍</option><option value="一般般">一般般</option><option value="能忍受">能忍受</option></select>
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>请简短描述现场</th>
                  <td>
                  <textarea class="pxtextarea" name="topic_content" cols="30" rows="5" placeholder="请在此处输入文本" ></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
         
        
          
        </ul>

        <div class="footReturn" style="text-align:center">
          <input type="hidden" name="openid" value="<?php echo $openid;?>">
          <input type="submit" style="margin:0 auto 20px auto;width:90%" class="submit" value="提交信息">
        </div>
      </form>
      <script>
        function showTip(tipTxt) {
          var div = document.createElement('div');
          div.innerHTML = '<div class="deploy_ctype_tip"><p>' + tipTxt + '</p></div>';
          var tipNode = div.firstChild;
          $("#wrap").after(tipNode);
          setTimeout(function () {
            $(tipNode).remove();
          }, 1500);
        }
        function tgSubmit(){
          var name=$("#name").val();
          if($.trim(name) == ""){
            showTip('请输入河流')
            return false;
          }
		   var name=$("#mobile").val();
          if($.trim(name) == ""){
            showTip('请输入地址')
            return false;
          }
		  var bookdate=$("#bookdate").val();
          if($.trim(bookdate) == ""){
            showTip('请输入举报日期')
            return false;
          }
         
          var bookexpert=$("#bookexpert").val();
          if($.trim(bookexpert) == ""){
            showTip('请输入容忍程度')
            return false;
          }
          return true;
        }
      </script>
    </div>

  </body>
  
</html>