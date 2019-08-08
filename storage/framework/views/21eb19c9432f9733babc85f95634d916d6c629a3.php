<?php $__env->startSection('content'); ?>

    <div class="container py-5" dir="rtl">

        <div class="row py-2 page-title mb-4">
            <h1 class="mx-auto"><strong>
                    <?php echo app('translator')->getFromJson('site.abouttaba'); ?>
                </strong></h1>
        </div>

        <aboutus-component :aboutus="<?php echo e($setting); ?>" :locale="<?php echo e($lang); ?>"></aboutus-component>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/somo/Desktop/website/machine/resources/views/aboutus.blade.php ENDPATH**/ ?>