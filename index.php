<?php



define("TOKEN", "weixin");

$wechatObj = new wechatCallbackapiTest();
if (!isset($_GET['echostr'])) {
    $wechatObj->responseMsg();
}else{
    $wechatObj->valid();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);

            switch ($RX_TYPE)
            {
                case "text":
                    $resultStr = $this->receiveText($postObj);
                    break;
                case "event":
                    $resultStr = $this->receiveEvent($postObj);
                    break;
                case "LOCATION":
                    $content = "纬度 ".$object->Latitude." 经度".$object->Longitude;
                    $resultStr = $this->transmitText($postObj);//
                    break;
                default:
                    $resultStr = "";
                    break;
            }
            echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }

    private function receiveText($object)
    {
        
        

        $keyword = trim($object->Content);
        if($keyword=="1")
        {
            $contentStr[] = array("Title" =>"【治来水】我们的第一条消息", 
                        "Description" =>"治来水", 
                        "PicUrl" =>"http://cyhfc.com/FCKeditor.Net_2.6.3/fckImages/image/20150822152432.jpg", 
                        "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjMzODI1NQ==&mid=209276745&idx=1&sn=da10b6d6f195a2fcedfba94fc08e5adf&scene=4#wechat_redirect");
            $resultStr = $this->transmitNews($object, $contentStr);
        }
        else
        {
            $funcFlag = 0;
            $contentStr = "你发送的内容为：".$object->Content;
            $resultStr = $this->transmitText($object, $contentStr, $funcFlag);
        }
        return $resultStr;
    }
    
    private function receiveEvent($object)
    {
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "感谢您关注治来水！".
                              "\n".
                              "\n".
                              "\n".
                              "  五水共治是指治污水、防洪水、排涝水、保供水、抓节水这五项。"."\n".
                              "  这是浙江省政府近期推出的大政方针，是推进浙江新一轮改革发展的关键之策。"."\n".
                              "  我们的平台就是对该方面关于污水反馈和建议的图文互动平台。"."\n".
                              "  目前平台功能如下："."\n".
                              "【1】上传对污水的吐槽"."\n".
                              "【2】上传污水地点照片"."\n".
                              "【3】上传污水地点"."\n".
                              "【4】来电对污水地点投诉"."\n".
                              "【5】五水共治小调查"."\n".
                              " 回复1查询治来水操作指南"."\n".
                              " 更多内容，敬请期待...";
                break;
            case "unsubscribe":
                break;
            case "CLICK":
                switch ($object->EventKey)
                {
                     case "tel":
                        $contentStr = "18405865011/18405865735"."\n".
                                      "18405863501/18405865182";
                        break;
                    case "company":
                        $contentStr = "  治来水项目团队由五位来自台州学院信息管理与信息系统专业的小伙伴组成。"."\n".
                                      "  分队成员分工明确，细致认真，在尽可能短时间内以认真的态度完成搭建并开发针对浙江“五水共治”举措的实行提供一个便民的公众平台，以期能有更多的人参与到治理我们的生命之源-水当中。"."\n".
                                      "  治来水作为团队的第一个作品，难免有不足之处。在使用“治来水”平台的过程中如果有更好的建议，敬请反馈给我们，我们希望为“五水共治”提供更好的服务，为平安浙江的建设尽我们绵薄之力。";
                        break;
                    /*case "news":
                       $contentStr[] = array("Title" =>"浙江省五水共治", 
                        "Description" =>"治来水", 
                        "PicUrl" =>"http://y2.ifengimg.com/a/2014_27/24d97e663160cd9.jpg", 
                        "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjMzODI1NQ==&mid=400006795&idx=1&sn=0aeb50e945b9a0af65a30766372d4fbe&scene=0#rd");
                        $contentStr[] = array("Title" =>"浙江省五水共治工作情况", 
                        "Description" =>"治来水", 
                        "PicUrl" =>"http://y2.ifengimg.com/a/2014_27/24d97e663160cd9.jpg", 
                        "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjMzODI1NQ==&mid=400006607&idx=2&sn=6179fab86991b2a4632b5ad8972ccb27&scene=0#rd");
                        $contentStr[] = array("Title" =>"五水共治须抓落实不动摇", 
                        "Description" =>"治来水", 
                        "PicUrl" =>"http://jx.cnr.cn/2011jxfw/xxzx/201411/W020141104371003986192.jpg", 
                        "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjMzODI1NQ==&mid=400006795&idx=3&sn=e448b081af6b58ba4027eb6f17cfa6d9&scene=0#rd");
                        break;*/
                    case "waterTB":
                    	$contentStr="完善中";
                    	break;
                    default:
                        $contentStr[] = array("Title" =>"默认菜单回复", 
                        "Description" =>"您正在使用的是五水共治开发小团队测试接口", 
                        "PicUrl" =>"http://www.33.la/uploads/20141114bztp/890.jpg", 
                        "Url" =>"weixin://addfriend/pondbaystudio");
                        break;
                }
                break;
            default :
                $contentStr = "Unknow Event: ".$object->Event;
                break;

        }
        if (is_array($contentStr))
        {
            $resultStr = $this->transmitNews($object, $contentStr);
        }
        else
        {
            $resultStr = $this->transmitText($object, $contentStr);
        }
        return $resultStr;
    }

    private function transmitText($object, $content, $funcFlag = 0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }

    private function transmitNews($object, $arr_item, $funcFlag = 0)
    {
        //首条标题28字，其他标题39字
        if(!is_array($arr_item))
            return;

        $itemTpl = "<item>
                    <Title><![CDATA[%s]]></Title>
                    <Description><![CDATA[%s]]></Description>
                    <PicUrl><![CDATA[%s]]></PicUrl>
                    <Url><![CDATA[%s]]></Url>
                    </item>";
        $item_str = "";
        foreach ($arr_item as $item)
            $item_str.=sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);

        $newsTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
                    <Content><![CDATA[]]></Content>
                    <ArticleCount>%s</ArticleCount>
                    <Articles>
                    $item_str</Articles>
                    <FuncFlag>%s</FuncFlag>
                    </xml>";
        $resultStr=sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);
        return $resultStr;
    }
}
?>