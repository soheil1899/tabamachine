<?php $__env->startSection('content'); ?>

    <div class="container py-5" dir="rtl">

        <div class="row py-2 mb-4 page-title">
            <h1 class="mx-auto"><strong>
                    <?php echo app('translator')->getFromJson('site.customer'); ?>
                </strong></h1>
        </div>


        <table class="table table-striped customertable" style="direction: rtl">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?php echo app('translator')->getFromJson('site.companyname'); ?></th>
                <th scope="col"><?php echo app('translator')->getFromJson('site.brand'); ?></th>
                <th scope="col"><?php echo app('translator')->getFromJson('site.address'); ?></th>
                <th scope="col"><?php echo app('translator')->getFromJson('site.description'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($customer['company_name']); ?></td>
                <td><?php echo e($customer['company_name_en']); ?></td>
                <td><?php echo e($customer['address']); ?></td>
                <td><?php echo e($customer['description']); ?></td>
            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>


    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/somo/Desktop/website/machine/resources/views/customer.blade.php ENDPATH**/ ?>