@section('sidebar')
<meta name="_token" content="{{ csrf_token() }}"/>
<script src="/js/jquery.js" async="" charset="utf-8"></script>
{{--<script src="js/seajs-text.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/common.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/string.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/suggest.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/store.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/json.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/im.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/index.js" async="" charset="utf-8"></script>--}}
{{--<script src="js/socket.js" async="" charset="utf-8"></script>--}}
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="/static/css/ui2.css?2013032917">
<div id="header">
    <div class="page-container" id="nav">
        <a href="http://www.mbaodian.com/" target="_self"><img src="/images/login.png" style="float: left; padding-top:6px;"><a href="/index" target="_self" class="hide-text"></a>
        <div class="g-menu-mini l">
            <a href="#" class="menu-ctrl">
                <i class="icon-menu"></i>
            </a>
            <ul class="nav-item l">
                <li><a href="/shiti"  target="_self">试题</a></li>
                <li><a href="/program"  target="_self">招聘</a></li>
                <li><a href="/article"  target="_self">方法</a></li>
                <li><a href="/company"  target="_self">简历</a></li>
		<li><a href="/wenda" target="_self">答疑</a></li>
        <!--         <li><a href="/wiki"  target="_self">WIKI</a></li> -->
                            </ul>
        </div>
        <div id="login-area">
            <ul
                    @if(Session::get("username"))
                        class="clearfix logined"
                    @else
                        class="header-unlogin clearfix"
                    @endif
            >

                <li class="header-app">
                    <a href="/mobile/app">
                        <span class="icon-appdownload"></span>
                    </a>
                    <div class="QR-download">
                        <p id="app-text">面试宝典APP下载</p>
                        <!--<p id="app-type">iPhone / Android / iPad</p>-->
                        <img src="/images/erweima.png">
                    </div>
                </li>
                    @if(!Session::get("username"))
                <li class="header-signin">
                    <a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" >登录</a>
                </li>
                <li class="header-signup">
                    <a href="#signup-modal" id="js-signup-btn" data-category="UserAccount" data-action="login" data-toggle="modal" >注册</a>
                </li>
                   @else
 
                <li class="remind_warp">
                    <i class="msg_remind" style="display: none;"></i>
                    <a href="/sms/messagesone" target="_blank"><i class="icon-notifi"></i></a>
                </li>
        	    <li class="my_message">
                    <a target="_blank" title="我的消息" href="/sms/messages">
                        <span style="display: inline;" class="msg_icon">3</span>
                        <i class="icon-mail"></i>
                        <span style="display: none;">我的消息</span>
                    </a>
                </li>
                <li class="set_btn user-card-box">
                    <a target="_self" href="/user/setprofile" action-type="my_menu" class="user-card-item" id="header-avator">
                        <img width="50" height="50" src="/<?php
                        if(Session::get('user_filedir')){
                            echo Session::get('user_filedir');
                        }else{
                            echo "images/unknow-160.png";
                        };?>">

                        <i style="display: none;" class="myspace_remind"></i>
                        <span style="display: none;">动态提醒</span>
                    </a>
                    <!--用户登录显示的用户信息-->
                    <div class="g-user-card">
                        <div class="card-inner">
                            <div class="card-top">
                                <a href="user/setprofile"><img class="l" alt="{{Session::get('username')}}" src="/<?php
                                    if(Session::get('user_filedir')){
                                        echo Session::get('user_filedir');
                                    }else{
                                        echo "images/unknow-160.png";
                                    };?>"></a>
                                <a href="user/setprofile"><span class="name text-ellipsis">{{Session::get('username')}}</span></a>
                                {{--经验||积分start--}}
                                <p class="meta">
					<a href="/u/3071208/experience">经验<b id="js-user-mp">550</b></a>
					<a href="/u/3071208/credit">积分<b id="js-user-credit">{{Session::get('u_score')}}</b></a>
                                </p>
                                {{--经验||积分end--}}

                                {{--签到start--}}
                                <p id="zw"><a href="javascript:void(0)" id="qiandao">签到</a></p>
                                {{--签到start--}}

                                <a class="icon-set setup" href="/user/setprofile"></a>
                            </div>
                            <!--
                            <div class="card-links">
                                <a href="/space/index" class="my-mooc l">我的慕课<i class="dot-update"></i></a>
                                <span class="split l"></span>
                                <a href="/myclub/myquestion/t/ques" class="my-sns l">我的社区</a>
                            </div>
                            -->
                            <div class="card-history">
                                <span class="history-item">
                                    <span class="tit text-ellipsis">python进阶</span>
                                    <span class="media-name text-ellipsis">2-9 闭包</span>
                                    <i class="icon-clock"></i>
                                     <a class="continue" href="/video/6059">继续</a>
                                </span>
                            </div>
                            <div class="card-sets clearfix">
                                <a class="l mr30" target="_blank" href="/wenda/save">发问题</a>
                                <a class="l" target="_blank" href="/article/publish">写文章</a>
                                <a class="r" href="/out">退出</a>
                            </div>
                        </div>
                        <i class="card-arr"></i>
                    </div>
                </li>
                  @endif
            </ul>
        </div>
        <div class='search-warp clearfix' style='min-width: 32px; height: 60px;'>
            <div class="search-area min" data-search="top-banner">
                <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="请输入想搜索的内容..." type="text" autocomplete="off">
                <input type='hidden' class='btn_search' data-search-btn="search-btn" />
                <ul class="search-area-result" data-suggest-result="suggest-result">
                </ul>
            </div>
            <div class='showhide-search' data-show='no'><i class='icon-search'></i></div>
        </div>
    </div>
</div>

<!--登陆start-->
<div class="modal in" id="login-modal"> <a class="close" data-dismiss="modal">×</a>
    <h1>登录</h1>
    {{--<ul class="login-bind-tp">
        <li class="qweibo"> <a href=""><em>&nbsp;</em> QQ登录</a> </li>
        <li class="sina"> <a href=""><em>&nbsp;</em> 微博登录</a> </li>
    </ul>--}}
    还没有账号?<a href="#signup-modal" id="js-signup-btn" data-category="UserAccount" data-action="login" data-toggle="modal">立即注册</a>
    <br>
    <form class="login-form clearfix" method="post" action="">

        <div class="form-arrow"></div>
        <input id="u_name" type="text" placeholder="手机号或邮箱：">

        <input id="password" type="password" placeholder="密码：">

        <!--第三方登录start-->
        <script type="text/javascript" src="http://open.51094.com/user/myscript/157aec390af50a.html"></script>
        <span id="hzy_fast_login"></span>
        <!--第三方登录end-->

        <input type="button" name="type" class="button-blue login" value="登录" id="sub">
		<font color="red"><center><span id="region"></span></center></font>
        <input type="hidden" name="return-url" value="">
        <div class="clearfix"></div>
        <label class="remember">
            <input name="remember" type="checkbox" checked/>
            下次自动登录 </label>
        <a class="forgot">忘记密码？</a>
        <ul class="third-parties">
            <li>
                <p data-url="">新浪微博帐号</p>
            </li>
            <li>
                <p data-url="">腾讯微博帐号</p>
            </li>
            <li>
                <p data-url="">豆瓣帐号</p>
            </li>
            <li>
                <p data-url=""></p>
            </li>
        </ul>
    </form>
</div>
<!--登陆end-->

<!--注册start-->
<div class="modal in" id="signup-modal" > <a class="close" data-dismiss="modal">×</a>
    <h1>注册</h1>
    <ul class="login-bind-tp">
        {{--<li class="qweibo"> <a href="#"><em>&nbsp;</em> QQ登录</a> </li>
        <li class="sina"> <a href="#"><em>&nbsp;</em> 微博登录</a> </li>--}}
    </ul>
    <form class="signup-form clearfix" method="post" action="reg" onsubmit="return zhu()">
        {{--<form class="valid-form" id="js-signup-form" autocomplete="off" action='reg' method='post' onsubmit="return sub()">--}}
        <!--<script>
            function zhu(){
                // alert(checkname());
                //  if(flag&&emailflag&&phoneflag){
                if(flag&&emailflag&&phoneflag){
                    return true;
                }else{
                    return false;
                }
            }
        </script>-->
        <p class="error"></p>
        <input type="text" name="username" id="username" data-validate="email" autocomplete="off" class="ipt ipt-email" placeholder="请输入名称 " onblur="checkname();"><font color="red"><p class="tips" id="name_sp"></p></font>
        <input type="password" name="password"  class="ipt ipt-pwd js-pass-pwd" placeholder="6-16位密码，区分大小写，不能用空格" id="pwd"  style="background-image:url('');
   background-position:right bottom"><font color="red"><p class="tips" id="sp_pwds"></p></font>

        <input type="text" name="email" data-validate="nick" class="ipt ipt-nick" placeholder="邮箱格式:@ . com" id="email" onblur="checkemail();"><font color="red"><p class="tips" id="email_sp"></p></font>
        <input type="text" name="phone" data-validate="nick" class="ipt ipt-nick" placeholder="手机号为11位 " id="phone" onblur="checkphone();"><font color="red"><p class="tips" id="phone_sp"></p></font>

        <input type="submit" name="type" class="button-blue reg" value="注册" data-category="UserAccount" data-action="regist">

        <ul class="third-parties">
            <li>
                <p data-url="">新浪微博帐号</p>
            </li>
            <li>
                <p data-url="">腾讯微博帐号</p>
            </li>
            <li>
                <p data-url="">豆瓣帐号</p>
            </li>
            <li>
                <p data-url=""></p>
            </li>
        </ul>
    </form>
</div>
<!--注册end-->

@show
<SCRIPT src="/js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
<script src="/js/index1.js"></script>
<div class="footer bg-white idx-minwidth">
  <div class="container">

      <div style="text-align:center;margin-top:-10px;padding-bottom:10px;">
      <!--可信网站图片LOGO安装开始-->
      <script src="/js/seallogo.dll"></script>
      <!--可信网站图片LOGO安装结束-->
    </div>
  </div>
</div>


<div id="footer" >
    <div class="waper">
        <div class="footerwaper clearfix">
            <div class="followus r">
                <a class="followus-weixin" href="javascript:;"  target="_blank" title="微信">
                    <div class="flw-weixin-box"></div>
                </a>
                <a class="followus-weibo" href="#"  target="_blank" title="新浪微博"></a>
                <a class="followus-qzone" href="#" target="_blank" title="QQ空间"></a>
            </div>
            <div class="footer_intro l">
                <div class="footer_link">
                    <ul>
                        <li><a href="/" target="_blank">网站首页</a></li>
                        <li><a href="#" target="_blank">人才招聘</a></li>
                        <li> <a href="#" target="_blank">联系我们</a></li>
                        <li><a href="#" target="_blank">面试宝典</a></li>
                        <li><a href="#" target="_blank">合作专区</a></li>
                        <li><a href="#" target="_blank">关于我们</a></li>
                        <li> <a href="#" target="_blank">讲师招募</a></li>
                        <li> <a href="#" target="_blank">意见反馈</a></li>
                        <li> <a href="#" target="_blank">友情链接</a></li>
                    </ul>
                </div>
                <p>Copyright © 2016 mbaodian.com All Rights Reserved | 京ICP备16021576号-1</p>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/landing-min.js?2013032917"></script>
<div style="text-align:center;clear:both"></div>
<script>
    $(function(){
        $.get('/user/zw',function(data){
            if(data==2){
                $('#zw').html('已签到');
            }
        });
        $('#qiandao').click(function(){
            $.post('/user/qiandao',function(data){
                if(data['error']==0){
                    alert('签到成功');
                    var jifen = parseInt($('#js-user-credit').html());

                    $('#js-user-credit').html(jifen+data['msg']);
                }
            },"json");
            $('#zw').html('已签到');
        });
    });
</script>


