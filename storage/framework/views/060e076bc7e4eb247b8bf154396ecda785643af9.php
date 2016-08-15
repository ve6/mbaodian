<ul class="clearfix">
        <?php foreach($data as $q=>$w): ?>
            <li class="position_list_item" data-jobid="1621796" data-positionid="1621796" data-salary="25k-40k" data-company="51Talk 无忧英语" data-positionname="运营总监" data-companyid="119153">


            

                <div class="pli_top">
                    <div class="fl pli_top_l">
                        <div class="position_name">
                            <!--  -->
            <h2 class="fl" style=" font-size:20px;"><a href="etc_sel?id=<?php echo e($w['r_id']); ?>" target="_blank" class="position_link fl wordCut" data-index="0" data-lg-tj-id="4m00" data-lg-tj-no="0001" data-lg-tj-cid="1621796"><?php echo e($w['position_name']); ?><span>[北京][<?php echo e($w['c_region']); ?>]</span></a></h2>
                            <!-- 此处需要和后台确认 -->
                            <span class="fl"><?php echo e($w['release_date']); ?></span>
                        </div>
                        <div>
                            <span class="salary fl"><?php echo e($w['money']); ?></span>
                            <span><!-- <i class="experience"></i>&nbsp;  --><?php echo e($w['experience']); ?></span> / <span><?php echo e($w['education']); ?></span>
                        </div>
                    </div>
                    <div class="fr pli_top_r">
                        <div class="company_name wordCut">
                    <span style=" font-size:16px;"><font color="black"><?php echo e($w['company_name']); ?></font></span>
                        </div>
                        <div class="industry wordCut">
                            <span> <?php echo e($w['main_business']); ?></span> / <span><?php echo e($w['nature']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="pli_btm">
                    <div class="pli_btm_l fl wordCut">
                        “<?php echo e($w['welfare']); ?>”
                    </div>
                    <div class="pli_btm_r fl">
                          <span><?php echo e($w['r_number']); ?></span>
                          <span><?php echo e($w['r_type']); ?></span>                                    
                                                                        </div>
                </div>

            



            </li>
                <?php endforeach; ?>       
                                    </ul>
