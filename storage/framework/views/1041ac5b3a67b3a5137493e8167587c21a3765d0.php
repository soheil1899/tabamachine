<?php $__env->startSection('content'); ?>

    <div class="container py-5" dir="rtl">

        <div class="row py-2 mb-4 page-title">
            <h1 class="mx-auto"><strong>
                    <?php echo app('translator')->getFromJson('site.contactus'); ?>
                </strong></h1>
        </div>




        <contactus-component :setting="<?php echo e($setting); ?>" :locale="<?php echo e($lang); ?>"></contactus-component>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/somo/Desktop/website/machine/resources/views/contactus.blade.php ENDPATH**/ ?>