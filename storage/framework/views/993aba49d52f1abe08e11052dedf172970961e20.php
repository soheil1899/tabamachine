<div class="container myheader" dir="rtl">

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row top-header p-2 pr-4 pr-lg-2">
                <i class="fas fa-mobile-alt mx-2"></i>
                <label class="mx-2"><?php echo e($setting['mobile']); ?></label>
                <label class="mx-2">|</label>
                <i class="fas fa-phone mx-2"></i>
                <label class="mx-2"><?php echo e($setting['tellphone']); ?></label>
                <label class="mx-2">|</label>
                <i class="fas fa-envelope mx-2"></i>
                <label class="mx-2"><?php echo e($setting['email']); ?></label>
                <label class="mx-2">|</label>

                <header-language :locale="<?php echo e($lang); ?>"></header-language>




            </div>



            <div class="row header-menu">
                <nav class="navbar navbar-expand-lg navbar-light pr-0">
                    <button class="navbar-toggler ml-auto mr-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse pr-4 pr-lg-0" id="navbarNav">

                        <?php
                        $lang = app()->getLocale();
                        $langid = \App\Lang::where('lang', $lang)->first();
                        $menu = \App\Menu_group::where('lang_id', $langid['id'])->with('submenus')->first()->submenus()->get();

                        ?>




                        <ul class="navbar-nav float-right p-0">
                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item['url'] == 'machine'): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo e($item['name']); ?>

                                    </a>
                                    <div id="header-machine" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php $__currentLoopData = \App\Article_group::where('url',app()->getLocale().'product')->with('articles')->first()->articles()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="dropdown-item mb-2" href="/<?php echo e(app()->getLocale()); ?>/<?php echo e($item['url']); ?>/<?php echo e($article['id']); ?>"><?php echo e($article['title']); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                                <?php else: ?>

                                <li class="nav-item active pl-2">
                                    <a class="nav-link" href="/<?php echo e(app()->getLocale()); ?>/<?php echo e($item['url']); ?>"><?php echo e($item['name']); ?></a>
                                </li>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item pl-2">
                                <a class="nav-link" href="/media/cite/TABAMACHINE_<?php echo e(app()->getLocale()); ?>.pdf"><?php echo app('translator')->getFromJson('site.catalog'); ?></a>
                            </li>
                        </ul>



                    </div>
                </nav>
            </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block p-3">
            <a class="pagelogo" href="/" title="تابا ماشین">
                <img src="/media/cite/logo.png" width="136px" height="80px" alt="">
            </a>
        </div>
    </div>


</div>
<?php /**PATH F:\web\2-98\machine\resources\views/layouts/client/header.blade.php ENDPATH**/ ?>