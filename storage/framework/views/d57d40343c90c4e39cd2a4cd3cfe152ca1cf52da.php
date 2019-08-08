<?php $__env->startSection('content'); ?>

    <div class="container py-5" dir="rtl">

        <div class="row py-2 mb-4 page-title">
        <h1 class="mx-auto"><strong>
            <?php echo e($machine['title']); ?>

            </strong></h1>
    </div>


    <machine-component :machine="<?php echo e($machine); ?>" :gallery="<?php echo e($gallery); ?>" :pdf="<?php echo e($pdf); ?>" :locale="<?php echo e($lang); ?>"></machine-component>





</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/somo/Desktop/website/machine/resources/views/machine.blade.php ENDPATH**/ ?>