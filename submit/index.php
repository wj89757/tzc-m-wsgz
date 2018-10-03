<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- 分别为：屏幕宽度和设备一直，初始缩放比例，最大缩放比例和禁止用户缩放 -->
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>"治来水"投诉</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/bootstrap-datetimepicker.css" />
  <link rel="stylesheet" href="../css/order.css"/>
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/fileinput.min.css" media="all" />  
</head>
<body>
  <div class="wxapi_container">
    <div class="banner">
      <div id="wrapper">
        <div id="scroller" style="float:none">
          <ul id="thelist">
            <img src="../img/logo.jpg" alt="微信投诉" style="width:100%"></ul>
        </div>
      </div>
    </div>
  </div>

  <div class="cardexplain">
    <ul class="round">
      <li>
        <h2>"治来水"微信投诉</h2>
        <div class="text">
          "治来水"竭诚为您服务
          <br/>
          联系电话：18405865011/18405865735
        </div>
      </li>
    </ul>
    <form id="form" method="post" action="ups.php" enctype="multipart/form-data">
      
      <ul class="round">
        <li class="title mb">
          <span class="none">请填写以下信息</span>
        </li>
        <div class="row">
          <div class="col-md-12">
            <ol class="reg_error input-group"></ol>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-phone"></span>
              </div>
              <input type="text" class="form-control" name="location" value="<?php if(empty($location)){$location=$_POST['location']; echo $location;}?>" placeholder="[必填]点击从地图选点或者手动输入地址" >
              <a href="map.html" class="input-group-addon">选位置</a>
            </div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-tint"></span>
              </div>
              <input type="text" placeholder="[必填]请输入您要举报的河流" class="form-control" id="name" name="river"/>
            </div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-map-marker"></span>
              </div>
              <input type="text" placeholder="[必填]请输入河流位置" class="form-control" id="mobile" name="mobile"/>
            </div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-camera"></span>
              </div>
              <input id="file-5" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-preview-file-icon="" name="userfile[]">
            </div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </div>
              <input type="text" name="bookdate" class="form-control" value="[必填]请选择投诉时间" id="datetimepicker" data-date-format="yyyy-mm-dd hh:ii" readonly></div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-signal"></span>
              </div>
              <select id="bookexpert" name="bookexpert" class="form-control">
                <option value="" selected="" disabled="">请选择程度</option>
                <option value="不能忍">不能忍</option>
                <option value="一般般">一般般</option>
                <option value="能忍受">能忍受</option>
              </select>
            </div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-envelope"></span>
              </div>
              <input id="telphone" type="text" placeholder="[必填]请输入您的邮箱" class="form-control" name="eamil"/>
            </div>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-edit"></span>
              </div>
              <textarea id="telphone" placeholder="[选填]请简短描述现场" class="form-control" name="topic_content" ></textarea>
            </div>
          </div>
        </div>
      </ul>
      <div class="footReturn" style="text-align:center">
        <input type="hidden" name="openid" value="<?php echo $openid;?>
        ">
        <input type="submit" class="btn btn-info btn-lg btn-block" value="提交信息">
      </div>
    </form>
  </div>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=haBz31hiMKdXbAxs8fRdWs1G"></script>
  <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
  <script type="text/javascript" src="../js/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/jquery.form.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.js"></script>
  <script src="../js/fileinput.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="../js/index.js"></script>
  <script src="../js/fileinput_locale_zh.js" type="text/javascript"></script>
  <script type="text/javascript">
    $('#datetimepicker').datetimepicker({
      language: 'zh-CN',  
    });
    $('#datetimepicker').datetimepicker('setStartDate', '2016-01-01');
  </script>
</body>
</html>