<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>面试宝典</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="keywords" content="面试宝典网，面试宝典官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<meta name="description" content="慕课网（IMOOC）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<link rel="stylesheet" href="/css/base.css" type="text/css" />
<script type="text/javascript">

      var OP_CONFIG={"module":"user","page":"setprofile","userInfo":{"uid":3071208,"nickname":"\u51e4\u9896","head":"http:\/\/img.mukewang.com\/images\/unknow-80.png","usertype":"1","roleid":0}};
  var isLogin = 1;
var is_choice = "";
  var seajsTimestamp="v=201604211612";
  </script>
 
<!--
<link rel="stylesheet" href="/static/component/logic/login/login-regist.css" type="text/css" />
<link rel="stylesheet" href="/static/css/settings.css" type="text/css" />
-->
<link rel="stylesheet" href="/css/common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/profile-less.css" type="text/css" />
<link rel="stylesheet" href="/css/user-common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/layer.css" type="text/css" />
<link rel="stylesheet" href="/css/user_settings_avtou-less.css" type="text/css" />
<link rel="stylesheet" href="/css/login-regist.css" type="text/css" />
</head>
<body >

<?php $__env->startSection('sidebar'); ?>
@parent
<div id="main">

<div class="settings-cont clearfix">

  <div class="setting-left l">
    <ul class="wrap-boxes">
      <li >
        <a href="/user/setprofile">个人资料</a>
      </li>
      <li class="active">
         <a href="/user/setavator" class="onactive">头像设置</a>
       </li>
       
      <li >
        <a href="/user/setphone">手机设置</a>
                    <span class='unbound'>未绑定</span>
              </li>
      
      <li >
        <a href="/user/setverifyemail">邮箱验证</a>
                    <span class='unbound'>未绑定</span>
              </li>
      <li >
        <a href="/user/setresetpwd">修改密码</a>
      </li>
      <li >
        <a no-pjajx href="/user/setbindsns">绑定帐号</a>
      </li>
    </ul>
  </div>
  <div class="setting-right">
    <div class="setting-right-wrap wrap-boxes settings" >

<?php /*头像设置start*/ ?>
<div class="setting-wrap setting-avator clearfix" id="setting-avator">
	<div class="avator-img l">
        <form enctype="multipart/form-data" method="post" action="postpic">
		<div>
            <img width="220" height="220" src="/
		<?php
            if(Session::get('user_filedir')){
                echo Session::get('user_filedir');
            }else{
                echo "images/unknow-160.png";
            };?>">
        </div>
		<div><input type="submit" class="glyphicon glyphicon-home" value="提交"></div>
	</div>
	<div class="avator-btn-group">
		<div class="avator-btn-inner" id="avator-btns">
            <?php /*<div class="avator-btn-snswrap"></div>*/ ?>

	        <div class="avator-btn-wrap">

		            <a class="avator-btn-fake" hidefocus="true" href="javascript:void(0)">上传头像</a>
		            <input type="file" accept="image/*" id="upload" name="fileField" title="上传头像">
		            <?php /*<input type="hidden" value="1" name="type">-}}
	            </form>
                {{--<iframe frameborder="0" style="display:none;" name="uploadtarget" id="uploadtarget" src="about:blank"></iframe>
	        </div>*/ ?>
                </form>
		</div>
		<div style="display:none;" class="avator-upload-wrap">
			<span class="rlf-btn-green btn-block" aria-role="button" id="avator-btn-save" hidefocus="true">保存</span>
		</div>
	</div>

</div>
<?php /*头像设置end*/ ?>

    </div>
  </div>
  
</div>

</div>
<?php $__env->stopSection(); ?>
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="/user/feedback" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app" >
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>



<!--script-->
<script src="/jss/ssologin.js"></script>
<script type="text/javascript" src="/js/sea.js"></script>
<script type="text/javascript" src="/js/sea_config.js?v=201604211612"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>

 


<div style="display: none">
</div>
</body>
</html>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>