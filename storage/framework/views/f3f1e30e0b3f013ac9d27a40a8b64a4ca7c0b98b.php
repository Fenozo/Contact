<?php $__env->startSection('content'); ?>
    

    <div class="container">
        <h1>Url Loops</h1>
        <form method="get" action="<?php echo e(route('show_url_list')); ?>">

           

            <input name="url" class="input form-control" value="<?php echo e(old('url')); ?>" placeholder="Please enter your original url here"></input>
            <?php echo $errors->first('url', '<p class="error-msg">:message</p>'); ?>

        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Url\resources\views/page/home/index.blade.php ENDPATH**/ ?>