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
<link rel="stylesheet" href="../css/base.css" type="text/css" />
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
</head>
<body >
@extends('layouts.master')
@section('sidebar')
@parent
<div id="main">

<div class="settings-cont clearfix">

  <div class="setting-left l">
    <ul class="wrap-boxes">
      <li class="active">
        <a href="/user/setprofile" class="onactive">个人资料</a>
      </li>
      <li >
         <a href="/user/setavator">头像设置</a>
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
        
{{--个人资料start--}}
<div id="setting-profile" class="setting-wrap setting-profile">
    <form id="profile" >
    
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="nick" >昵称</label>
            <div class="rlf-group">
                <input type="text" name="nickname" id="nick"  autocomplete="off"  data-validate="nick"  class="input rlf-input rlf-input-nick" value="{{ $user['user_name'] }}" placeholder="请输入昵称."/>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="job">职位</label>
            <div class="rlf-group">
                <select class="input rlf-select" name="job" hidefocus="true" id="job">
                    <option value="0">请选择职位</option>
                    @foreach($work as $val)
                        @if($user['z_id']==$val['z_id'])
                            <option value="{{$val['z_id']}}" selected="selected">{{$val['z_name']}}</option>
                        @else
                            <option value="{{$val['z_id']}}">{{$val['z_name']}}</option>
                        @endif
                    @endforeach
                </select>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="province-select">城市</label>
            <div class="rlf-group profile-address">
                <select class='input' id="province-select"  hidefocus="true">
                    <option value="">选择省份</option>
                    @foreach($province as $val)
                        <option value="{{$val['region_id']}}">{{$val['region_name']}}</option>
                    @endforeach
                </select>

                <select class='input' id="city-select" hidefocus="true">
                    <option value="0">选择城市</option>
                </select>

                <select class='input mr0' id="area-select" hidefocus="true">
                    <option value="0">选择区县</option>
                </select>

                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" >性别</label>
            <div class="rlf-group rlf-radio-group">
                @if($user['user_sex']==0)
                <label ><input type="radio" hidefocus="true" value="0" checked="checked"  name="sex">保密</label>
                <label ><input type="radio" hidefocus="true" value="1"  name="sex" >男</label>
                <label ><input type="radio" hidefocus="true" value="2"  name="sex" >女</label>
                @elseif ($user['user_sex']==1)
                <label ><input type="radio" hidefocus="true" value="0"  name="sex">保密</label>
                <label ><input type="radio" hidefocus="true" value="1"  checked="checked" name="sex" >男</label>
                <label ><input type="radio" hidefocus="true" value="2"  name="sex" >女</label>
                @else ($user['user_sex']==2)
                <label ><input type="radio" hidefocus="true" value="0"  name="sex">保密</label>
                <label ><input type="radio" hidefocus="true" value="1"  name="sex" >男</label>
                <label ><input type="radio" hidefocus="true" value="2"  checked="checked" name="sex" >女</label>
                @endif
            </div>
            <p class="rlf-tip-wrap"></p>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="aboutme">个性签名</label>
            <div class="rlf-group">
                <textarea name="aboutme" id="aboutme" cols="30" rows="5" class="textarea">{{$user['user_content']}}</textarea>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for=""></label>
            <div class="rlf-group">
                <span id="profile-submit"  hidefocus="true"  aria-role="button" class="rlf-btn-green btn-block profile-btn">保存</span>
            </div>
        </div>
    </form>
    
</div>
{{--个人资料end--}}

    </div>
  </div>
  
</div>

</div>
@endsection
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
<script src="/js/ssologin.js"></script>
<script type="text/javascript" src="/js/sea.js"></script>
<script type="text/javascript" src="/js/sea_config.js?v=201604211612"></script>
<script type="text/javascript">seajs.use("/s tatic/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/user/profile.js"></script>
<script>
    $(function(){
        //三级联动
        $('.input').change(function(){
            if($(this).attr('class')=='input'){
                var id=$(this).val();
                var _this=$(this);
                _this.nextAll().val(0);
                var one=_this.next().children().html();
                _this.next().html('<option value="">'+one+'</option>')
                $.post('sel',{id:id},function(data){
                    _this.next().append(data)
                });
            }
        });
        //修改个人资料
        $('#profile-submit').click(function(){
            var nick=$('#nick').val();
            var job=$('#job').val();
            var sex=$('input[type="radio"]:checked').val();
            var aboutme=$('#aboutme').val();
            //alert(aboutme);
            $.post('change',{nick:nick,job:job,sex:sex,aboutme:aboutme},function(data){
                //alert(data);
                if(data==1){
                    $(".name").html(nick);
                    alert("修改成功");
                }
            });
        })
    })

</script>



<div style="display: none">
</div>
</body>
</html>
