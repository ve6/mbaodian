<ul class="content-item-box clearfix">
<?php foreach($exam as $key=>$value): ?>
<li>
<a href="college_exam?id=<?php echo e($value['s_id']); ?>">
<div class="content-item-brief">
<h1><?php echo e($value['s_logo']); ?></h1>
<div class="web-logoimg">
<img src="http://123.56.249.121/android/web/<?php echo e($value['s_img']); ?>" style="width:50px; height:50px;" />
</div>
<div class="exam-foot">已有<?php echo e($value['click']); ?>人参加</div>
<dl class="exam-info">
<dd><span class="link-green"></span></dd>
<dd class="exam-btn"><span class="btn  btn-block btn-primary" >查看详情</span></dd>
</dl>
</div>                                               
</a> 
</li>
<?php endforeach; ?>
</ul>