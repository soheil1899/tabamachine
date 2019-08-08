<?php $__env->startSection('content'); ?>

<?php if(count($slider) > 0): ?>
    <div id="slidertop" class="container carousel slide mt-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slidertop" data-slide-to="0" class="active"></li>
            <?php

            for ($i = 1; $i<count($slider); $i++){
            ?>

            <li data-target="#slidertop" data-slide-to="<?php echo e($i); ?>"></li>
                <?php
                }
                ?>
        </ol>
        <div class="carousel-inner">

            <?php
            $x = 0;
            foreach ($slider as $image){
            ?>
            <div class="carousel-item <?php if($x==0): ?> active <?php endif; ?>">
                <a title="<?php echo e($image['title']); ?>" href="/<?php echo e(app()->getLocale()); ?>/machine/<?php echo e($image['link']); ?>">
                    <img src="/media/slider/<?php echo e($image['slider_id']); ?>/original_<?php echo e($image['image']); ?>.png" width="100%"
                         height="500px" alt="...">
                </a>
            </div>
            <?php
            $x++;
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#slidertop" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slidertop" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <?php endif; ?>



    <div class="container">

        <?php
        $x = 1;
        foreach ($threearticles as $article){
        ?>
        <div class="card my-5" <?php if($x%2 == 1): ?> dir="ltr" <?php endif; ?>>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/media/article/<?php echo e($article['id']); ?>_original.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>
                                <?php echo e($article['title']); ?>

                            </strong>
                        </h5>
                        <p class="card-text" dir="rtl">
                            <?php echo $article['minitext']; ?>

                        </p>

                        <a href="/<?php echo e(app()->getLocale()); ?>/machine/<?php echo e($article['id']); ?>" class="btn btn-danger btn-sm pointer seemore"><?php echo app('translator')->getFromJson('site.seeproduct'); ?></a>

                    </div>
                </div>
            </div>
        </div>
        <?php
        $x++;
        }
        ?>

        <div class="my-5 aboutus-back">


            <div>
                <strong>
                    <?php echo app('translator')->getFromJson('site.abouttaba'); ?>
                </strong>
                <p dir="rtl">
                    <?php echo $setting['aboutus']; ?>

                </p>
            </div>

        </div>


    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/somo/Desktop/website/machine/resources/views/index.blade.php ENDPATH**/ ?>