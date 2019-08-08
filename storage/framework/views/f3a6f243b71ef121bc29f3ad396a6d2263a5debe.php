<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($setting['company_name']); ?></title>


    <link rel="stylesheet" href="/css/app.css">

</head>
<body>
<div id="client">
    <header>
        <?php echo $__env->make('layouts.client.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>





    <?php echo $__env->yieldContent('content'); ?>




    <footer>
        <?php echo $__env->make('layouts.client.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
</div>
</body>


<script src="/js/client.js"></script>
</html>
<?php /**PATH /home/somo/Desktop/website/machine/resources/views/layouts/client/master.blade.php ENDPATH**/ ?>