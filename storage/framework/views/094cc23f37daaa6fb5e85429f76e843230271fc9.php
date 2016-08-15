<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
       <?php echo $arr['a_title'];?>_面试方法-面试宝典
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="Description" content=""/>
<script type="text/javascript">
var OP_CONFIG={"module":"article","page":"details","userInfo":{"uid":"3071208","nickname":"\u51e4\u9896","head":"http:\/\/img.mukewang.com\/images\/unknow-80.png","usertype":"1","roleid":0}};
var isLogin = 1;
var is_choice = "";
var seajsTimestamp="v=201604211612";
</script>
<script>
var pageInfo = {
    id: "7997"
}
var user = {
    uid : "3071208",
    img : "http://img.mukewang.com/images/unknow-160.png",
    nickname : "凤颖"
}
var authorUid = {
    uid : '2788726'
}
</script>
<link rel="stylesheet" href="css/common-less.css" type="text/css" />
<link rel="stylesheet" href="css/detail-less.css?v=1463035000" type="text/css" />
</head>
<body >

<?php $__env->startSection('sidebar'); ?>
    @parent


<script>
var isLogin=1
</script>
<div class="opus-wrap clearfix">

<div class="detail-left l">
    <!-- 面包屑 -->
    <div class="detail-path">
        <a href="/article">手记</a> \
        <span> <?php echo $arr['a_title'];?></span>
    </div>
    <!-- 面包屑end -->
    <!-- 文章详情 -->
    <div class="detail-content-wrap">
        <h1 class="detail-title">
        <?php echo $arr['a_title'];?>
                </h1>
        <div class="dc-addon clearfix">
            <div class="dc-profile clearfix">
                <span class="spacer l">15小时前</span>
                <span class="spacer l spacer-2"><?=$arr['a_num']?>浏览</span>
                <a class="spacer l" href="#comment" >2评论</a>
            </div>
        </div>

        <div class="detail-content ">
            <p><?php echo $arr['a_con']?></p>
        </div>
                <!-- 标签 -->
                <div class="cat-box clearfix">
                       <a class="cat l" href="/article/tag/5" target="_blank">Html/CSS</a>
                       <a class="cat l" href="/article/tag/25" target="_blank">CSS3</a>
                    </div>
            
        <div class="active-box clearfix">
            <!-- 推荐 --> 
            <div class="praise-box l <?=isset($zan['az_id'])?'endlike':'like'?>">
                <span id="js-praise" data-id="7997" class="dc-praise l">
                    <i class="sns-thumb-up l"></i>
                    <span class="praise l"><?=isset($zan['az_id'])?'已赞':'推荐'?></span>
                </span>
                <var class="cutoff l">|</var>
                <span class="praise-num"><?=$arr['at_zan']?></span>
            </div>  
            <!-- 推荐end -->

            <!-- 分享 -->
            <div class="share-rl-tips share-posi js-share-statue">
                <span>分享即可 +</span><strong>1积分</strong>
                <span class="rule-arrow"></span>
            </div>
            <div class="small-share l">
                <ul class="share-wrap">
                    <li class="weichat-posi">
                        <div class="bdsharebuttonbox weichat-style">
                            <a href="#" class="bds_weixin icon-nav icon-share-weichat" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_tsina icon-nav icon-share-weibo" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_qzone icon-nav icon-share-qq" data-cmd="qzone" title="分享到QQ空间"></a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- 分享end -->
            <!-- 收藏&举报 -->
            <div class="r-box r">
                <span id="js-follow" data-id="7997" class="dc-follow l">
                    <span id="<?=isset($collect['ac_id'])?'collected':'collect'?>"><?=isset($collect['ac_id'])?'已收藏':'收藏'?></span>
                </span>
            </div>
            <!-- 收藏&举报end -->

        </div>
    </div>
    <!-- 文章详情end -->
  
    <!-- 相关阅读 -->
<div class="react-article">
        <h2>相关阅读</h2><ul><li><a title="前端开发的七宗罪" href="/article/1277"><h3>前端开发的七宗罪</h3></a>                                    <p>前端开发在最近几年逐渐走红，越来越多的开发者加入前端开发队伍。但前端在大学中没有课程体系，而且知识也在不断更新着。大家对它的认识也各不相同。博主有过技术经理，项目经理，面试官，前端开发的经历，参与过较...</p></li><li><a title="【慕星人独白】在一个急躁的心理状态下，怎样正常的生活" href="/article/4485"><h3>【慕星人独白】在一个急躁的心理状态下，怎样正常的生活</h3></a></li><li><a title="【特别推荐】一枚应届生对近来前端界流派之争的一点思考" href="/article/4533"><h3>【特别推荐】一枚应届生对近来前端界流派之争的一点思考</h3></a></li><li><a title="Node.js 给前端带来了什么？" href="/article/7443"><h3>Node.js 给前端带来了什么？</h3></a></li><li><a title="2016 年后 Web开发趋势是什么" href="/article/7913"><h3>2016 年后 Web开发趋势是什么</h3></a></li></ul>
    </div>
    <!-- 相关阅读end -->
 
 <div class="detail-feedback-wrap" style="">
        <!-- 评论框 -->
 
        <div id="comment" class="df-ipt-wrap" style="">
                    <div class="feeds-author">
                <span><img width="40" alt="凤颖" src="http://img.mukewang.com/images/unknow-80.png"></span>
                <?php /*<span class="nick">凤颖</span>*/ ?>
            </div>
    
            <div class="df-text" style="">

                <?php /*<p class="feed-error" id="feed-error"></p>*/ ?>
                <?php /*<div class="df-bottom clearfix">*/ ?>
                    <?php /*<div class="verify-code"></div>*/ ?>
                    <?php /*<button class="btn btn-green r" id="js-submit">评论</button>*/ ?>
                <?php /*</div>*/ ?>
                <div class="df-ipt-wrap" id="comment">
                    <div class="feeds-author">
                        <span><img src="http://img.imooc.com/images/avatar_default.png" width="40" alt=""></span>
                    </div>
                    <div id="js-text-login" class="df-text df-text-login">
                        <?php if(Session::get('u_id')): ?>
                            <textarea class="ipt" id="ipt"></textarea>
                            <div class="df-bottom clearfix">
                                <button id="js-submit" class="btn btn-green r">评论（Enter+Ctrl）</button>
                            </div>
                        <?php else: ?>
                            <textarea class="ipt"  readonly>请登录后，发表评论</textarea>
                            <div class="df-bottom clearfix">
                                <button id="js-submit" class="btn btn-green disabled r">评论（Enter+Ctrl）</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

                </div> 
 
        <!-- 评论框end -->

        <!-- 热门评论 -->
        <div class="hot-df-title" style="display: none;">热门评论</div>
        <div class="feedback-list" id="js-feedback-hot-list-wrap" style="display: none;">
            <p class="feedback-loading">
            评论加载中...
            </p>
        </div>
        <!-- 评论 -->
        <div id="all_comments" class="df-title">全部评论<span class="comment-num"><i><?=count($reply)?></i>条</span></div>
        <div class="feedback-list" id="js-feedback-list-wrap">

            <div id="js-feedback-list">
                <?php if($reply): ?>
                    <?php $count=count($reply)?>
                    <?php foreach($reply as $key=>$val): ?>
                        <?php
                            $time=time()-$val['a_time'];
                            if($time<3600){
                            $date=floor($time/60).'分钟前';
                            }elseif(date('Y-m-d',$val['a_time'])==date('Y-m-d',time())){
                            $date=floor($time/3600).'小时前';
                            }elseif(date('Y-m-d',$val['a_time'])==date('Y-m-d',time()-24*3600)){
                            $date='昨天';
                            }else{
                            $date=date('Y-m-d',$val['a_time']);
                            }
                            if($val['user_nickname']!=''){
                            $name=$val['user_nickname'];
                            }elseif($val['user_name']!=''){
                            $name=$val['user_name'];
                            }else{
                            $name='无名称';
                            }
                        ?>
                        <div class="comment-box">
                        <div class="comment clearfix">
                            <div class="feed-author l">
                                <a href="/u/1938237/articles">
                                    <img width="40" src="http://img.mukewang.com/5458640c0001b0a702200220-100-100.jpg">
                                </a>
                                <a target="_blank" href="/u/1938237/articles" class="nick"><?=$name?></a>
                                <span class="com-floor r"><?=$count?>F</span>
                            </div>
                            <div class="feed-list-content">
                                <p></p><p><?=$val['a_content']?></p><p></p>
                                <div class="comment-footer">
                                    <span class="feed-list-times"> <?=$date?></span>
                                    <span data-username="qq_青枣工作室_0" data-uid="1938237" data-commentid="23493" class="reply-btn">回复</span>
                                    <span data-username="qq_青枣工作室_0" data-uid="1938237" data-commentid="23493" class="agree-with r"><b>赞同</b><em>1</em></span>
                                </div>
                            </div>
                        </div>
                        <div class="reply-box"></div>
                        <div class="release-reply">
                            <a class="user-head" href="/u/3071208/articles">
                                <img alt="凤颖" src="http://img.mukewang.com/images/unknow-160.png">
                            </a>
                            <a class="nick" href="/u/3071208/articles">凤颖</a>
                            <div class="replay-con">
                                <div class="textarea-wrap">
                                    <textarea placeholder="写下你的回复..."></textarea>
                                </div>
                                <p class="errtip"></p>
                                <div class="reply-ctrl clearfix">
                                    <div class="verify-code"></div>
                                    <div class="btn-wrap">
                                        <div class="cancel-btn">取消</div>
                                        <div class="release-reply-btn" data-comment-uid="1938237">提交</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php $count--?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="height: 400px;line-height: 400px;text-align: center;font-size: large">
                        暂无评论
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- 分页页码  -->
        <div class="qa-comment-page" style="display: none;"></div>
    </div>
</div><!-- 左侧end -->

<div class="detail-right r"><!-- 右侧start -->
    <!-- 作者信息 -->
        <div class="aside-author">
        <div class="p clearfix">
            <a href="/u/2788726/articles" class="l" title="咖啡失眠中" target="_blank">
                <img src="http://img.mukewang.com/533e4d710001322402000200-100-100.jpg">
            </a>
        </div>
        <a class="nick" href="/u/2788726/articles" title="咖啡失眠中" target="_blank">
        咖啡失眠中
        </a>
                                <span class="user-job">学生</span>
        <span class="user-desc">
            成为java大神就是我要做的
        </span>
        <div class="btn-box clearfix">
            <a href="/u/2788726/articles" target="_blank" class="article-num r-bor l">
                <span>8</span>篇文章
            </a>
            <a href="/u/2788726/articles?type=praise" target="_blank" class="article-recom l">
                <span>0</span>推荐
            </a>
        </div>
    </div>
        <!-- 作者信息end -->

    <!-- 作者热门文章 -->
        <div class="other-article">
        <h2>作者的热门文章</h2>
        <ul>
                    <li>
                <a href="/article/5917" title="java面试题，分享几个！答案你知道吗？"><h3>java面试题，分享几个！答案你知道吗？</h3></a>
                                <p>1. J2EE是什么？它包括哪些技术？ 解答：从整体上讲，J2EE是使用Java技术开发企业级应用的工业标准，它是Java技术不断适应和促进企业级应用过程中的产物。适用于企业级应用的J2EE，提供一个平台独立的、可移植的、多用户的、安全的和基于标准的企业级平台，从而简化企业应用的开发、管理和部署。J2EE是一个标准，而不是一</p>
                                <div class="show-box clearfix">
                    <span class="spacer l">3240浏览</span>
                    <span class="spacer l spacer-2">53推荐</span>
                    <span class="spacer l" href="" >4评论</span>
                </div>
            </li>
                    <li>
                <a href="/article/5901" title="如何面试3w的java工程师的成功秘籍，你知道吗？"><h3>如何面试3w的java工程师的成功秘籍，你知道吗？</h3></a>
                                <div class="show-box clearfix">
                    <span class="spacer l">2247浏览</span>
                    <span class="spacer l spacer-2">38推荐</span>
                    <span class="spacer l" href="" >2评论</span>
                </div>
            </li>
                    <li>
                <a href="/article/6607" title="Java新手必掌握的基础知识"><h3>Java新手必掌握的基础知识</h3></a>
                                <div class="show-box clearfix">
                    <span class="spacer l">1834浏览</span>
                    <span class="spacer l spacer-2">37推荐</span>
                    <span class="spacer l" href="" >1评论</span>
                </div>
            </li>
                    <li>
                <a href="/article/7611" title="小白学习java需要不求甚解？"><h3>小白学习java需要不求甚解？</h3></a>
                                <div class="show-box clearfix">
                    <span class="spacer l">919浏览</span>
                    <span class="spacer l spacer-2">11推荐</span>
                    <span class="spacer l" href="" >6评论</span>
                </div>
            </li>
                    <li>
                <a href="/article/6603" title="Java final关键字详解"><h3>Java final关键字详解</h3></a>
                                <div class="show-box clearfix">
                    <span class="spacer l">857浏览</span>
                    <span class="spacer l spacer-2">9推荐</span>
                    <span class="spacer l" href="" >0评论</span>
                </div>
            </li>
        </ul>
    </div>
        <!-- 作者热门文章end -->

    <!-- 广告 -->
                    <!-- 广告end -->
  
</div><!-- 右侧end -->

<!-- 文章目录 -->
<!-- 文章目录end -->


</div><!--opus-wrap end-->

<div id="main">

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



<script type="text/javascript" charset="utf-8" src="js/ueditor.final.min.js"></script>

<!--script-->
<script src="/js/ssologin.js"></script>
<script type="text/javascript" src="/js/sea.js"></script>
<script type="text/javascript" src="/js/sea_config.js?v=201604211612"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>

<!--script-->
<script src="/js/jquery-1.9.1.min.js"></script>

<script>
  $(function() {
      $('.like').click(function () {
          var num=$('.praise-num').html();
          var _this=$(this);
          var id=<?=empty(Session::get('u_id'))?1:0?>;
          if(id==0){
              $.post('zan', {zan:<?=$_GET['id'];?>}, function (data) {
                  if(data==1){
                      _this.removeClass('like');
                      _this.addClass('endlike');
                      $('.praise-num').html(parseInt(num)+1);
                      $('.praise').html('已赞');
                  }
              })
          }else{
              alert('请先登录')
          }

      })
      $('#collect').click(function(){
          var _this=$(this);
          var id=<?=empty(Session::get('u_id'))?1:0?>;
          if(id==0){
              $.post('collect', {collect:<?=$_GET['id']?>}, function (data) {
                  if(data==1){
                      _this.html('已收藏');
                      _this.attr('id','collected');
                  }
              })
          }else{
              alert('请先登录')
          }
      })
      $('#js-submit').click(function(){
          var content=$('#ipt').val();
          if(content!=''){
              $.post('wping',{id:<?=$aid?>,content:content},function(data){
                  $('#js-feedback-list').html(data)
              })
          }
      })

  })
</script>
<div style="display: none">
</div>
</body>
</html>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>