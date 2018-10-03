<!--看了百度地图API,有些东西没有给出例子，与时我就仿照marker的示例，做了一个label的示例-->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><!--默认的文件，并设定文字编码-->

<?php   
    //$jingwei="new BMap.Point($longitude,$latitude);";//与其他联动时使用的
    $jingwei="new BMap.Point(116.19926,39.72372);";// 给定坐标时用的   
?>
<title>环评项目定位</title>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script> <!--引用百度地图API-->
<script type="text/javascript" src="http://dev.baidu.com/wiki/static/map/API/examples/script/convertor.js"></script>  <!--引用坐标转换脚本-->
</head>
<body>    
    <div style="width:700px;height:250px;margin-left: auto;margin-right: auto;border:1px solid gray"id="container"></div><!--显示地图的容器-->
</body>
</html>
<script type="text/javascript">
translateCallback = function (point){ //转换坐标
    map.clearOverlays();  
    var marker = new BMap.Marker(point); //创立标注  
    map.addOverlay(marker); //在地图上画出标注
    
    var label = new BMap.Label("阎村站",{position:point}); //创立标签点   
    map.addOverlay(label); //在地图上画出标签
    label.addEventListener("click",function()//添加标签的点击事件
                                  {
                                      window.open("amcharts/samples/xzdq.php?jc=yc&dqjcd=阎村",'_blank') ;//超级链接                                
                                  }
    ) 
 
marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画   
    
    map.centerAndZoom(point,15); //设置中心点
    map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
    map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
    map.addControl(new BMap.MapTypeControl());          //添加地图类型控件
    map.setCurrentCity("房山");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);//鼠标缩放
}

var map = new BMap.Map("container",{mapType: BMAP_NORMAL_MAP});      //设置普通地图为底图
var gpsPoint = <?php echo $jingwei?>//将PHP的经纬度值传给JS
    BMap.Convertor.translate(gpsPoint,0,translateCallback);//调用坐标转换函数
</script>

PS:欢迎朋友们来交流。