<div class="container" dir="rtl">
    <div class="row col-12 col-lg-9 mx-lg-auto py-5">
        <div class="footer-right col-12 col-lg-3 px-4 pb-4">
            <strong>
                <?php echo app('translator')->getFromJson('site.quickaccess'); ?>
            </strong>
            <ul>


                <?php
                $lang = app()->getLocale();
                $langid = \App\Lang::where('lang', $lang)->first();
                $menu = \App\Menu_group::where('lang_id', $langid['id'])->with('submenus')->first()->submenus()->get();

                ?>


                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item['url'] != 'machine'): ?>
                        <li class="nav-item active pl-2">
                            <a class="nav-link p-0" href="/<?php echo e(app()->getLocale()); ?>/<?php echo e($item['url']); ?>"><?php echo e($item['name']); ?></a>
                        </li>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item pl-2">
                    <a class="nav-link p-0" href="/media/cite/TABAMACHINE_<?php echo e(app()->getLocale()); ?>.pdf"><?php echo app('translator')->getFromJson('site.catalog'); ?></a>
                </li>
            </ul>
        </div>

        <div class="footer-left col-12 col-lg-9 px-4">
            <strong>
                <?php echo app('translator')->getFromJson('site.accesspoints'); ?>
            </strong>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="fas fa-map-marked-alt mx-2"></i>

                        <?php echo app('translator')->getFromJson('site.address'); ?>
                        :</strong>
                </div>
                <div class="col-9">
                    <?php echo e($setting['address']); ?>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="fas fa-phone mx-2"></i>

                        <?php echo app('translator')->getFromJson('site.telephone'); ?>
                        :</strong>
                </div>
                <div class="col-9">
                    <?php echo e($setting['tellphone']); ?>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="fas fa-mobile-alt mx-2"></i>

                        <?php echo app('translator')->getFromJson('site.mobile'); ?>
                        :</strong>
                </div>
                <div class="col-9">
                    <?php echo e($setting['mobile']); ?>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="far fa-envelope mx-2"></i>

                        <?php echo app('translator')->getFromJson('site.email'); ?>
                        :</strong>
                </div>
                <div class="col-9">
                    <?php echo e($setting['email']); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/somo/Desktop/website/machine/resources/views/layouts/client/footer.blade.php ENDPATH**/ ?>