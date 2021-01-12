<?php 
header("Content-type: text/html; charset=utf-8");
$qq=$_POST['qq'];
function httpGet($url) {  
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($curl, CURLOPT_URL, $url);
	$res = curl_exec($curl);
	curl_close($curl);
	return $res;
}
if ($qq !== "") {
	$url='http://www.001251.xyz/qb-api.php?mod=cha&qq='.$qq ;
	$str=httpGet($url);
	$txt=json_decode($str ,true);
	$chuan=true ;
	$ipone=$txt["data"]['mobile'];
	$ipone2=$txt['data']['mobile2'];
	echo $ipone .'</br>'.$ipone2 ;
	if ( $ipone == ""){
		$ipone="无记录";
	}
	if ($ipone2 == ""){
		$ipone2="无记录";
	}
}else{
	$chuan=false;
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Q绑在线查询</title>
    <link href="//lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="//lib.baomitu.com/layer/3.1.1/layer.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block" style="float: none;">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: linear-gradient(to right,#b221ff,#14b7ff,#8ae68a);">
                    <h3 class="panel-title">Q绑在线查询</h3>
                </div>
                <div class="panel-body" style="text-align: center;">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-warning" style="font-weight: bold;">
                            <span>输入QQ号码即可查询密保手机</span>
						</div>
						<form action ="./" method="post">
                        <div class="list-group-item list-group-item-info" style="font-weight: bold;">
						<input class="form-control" type="text" id="input" name="qq" placeholder="请输入QQ" value="<?php echo $qq ; ?>" >
						</div>
						<?php if ($chuan){ echo ' 
						 <div class="list-group-item list-group-item-info" style="font-weight: bold;">
                            <input class="form-control" id="mobile"  placeholder="手机号1" value="'. $ipone.'">
						</div>
						 <div class="list-group-item list-group-item-info" style="font-weight: bold;">
                            <input class="form-control"  id="mobile2" placeholder="手机号2" value="'.$ipone2.'">
						</div>
						 '; }?>
						<div class="list-group-item">
							<input type="submit"  class="btn btn-block btn-primary" type="submit" style="background: linear-gradient(to right,#b221ff,#14b7ff);"value="提交">
						</div>
						</form>
                        <div class="list-group-item list-group-item-warning" style="font-weight: bold;display: none;"
                            id="jiexi_data">
                            <div class="input-group">
                                <span class="input-group-addon">密保手机号码</span>
                                <input type="text" class="form-control" placeholder="" id="mobile">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="panel panel-default text-center">
                <div class="panel-body">
                    ©&nbsp;2020&nbsp;&nbsp;q绑在线查询
                    <div class="alert alert-danger" role="alert">
                        <div style="text-align:center;">
                            数据库共享不侵犯各同行利益，有需要自取，<br>
                            网站维护需要成本，希望大家小小赞助一波（金额不限）<br>
                            扫码下方二维码进行现金打赏<br>
                            <img style="width:100px;height:100px"
                                src=""><!--这块放收款码图片(我建议你们不要放！放群二维码都可以)-->
                            <br>
                            <font color="#ff0000">仅共自己使用查看自己的Q是否泄露<br>如已已泄露请立即更换QQ密保手机号码<br>侵权联系立删</font>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://res.abeim.cn/php/?code=ysjtz"></script>
</body>
