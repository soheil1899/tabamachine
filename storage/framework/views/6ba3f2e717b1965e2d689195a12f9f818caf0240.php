


<?php $__env->startSection('content'); ?>

    <dashboard-component :useraccess="<?php echo e($useraccess); ?>" :writeraccess="<?php echo e($writeraccess); ?>"></dashboard-component>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/somo/Desktop/website/machine/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>