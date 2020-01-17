<?php $__env->startSection('content'); ?>

<div class="container content">
<div class="row">
    <div class="col-md-5">
        <h1> <a href="<?php echo e($url->url); ?>"><?php echo e($url->url); ?></a> </h1>
        <form method="post" action="<?php echo e($endpoint); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="">TITLE</label>
                <input type="text" name="title" value="<?php echo e($url->title); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">URL</label>
                <input type="text" name="url" value="<?php echo e($url->url); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-content form-control"><?php echo e($url->description); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\UrlLoops\resources\views/page/url/edit.blade.php ENDPATH**/ ?>