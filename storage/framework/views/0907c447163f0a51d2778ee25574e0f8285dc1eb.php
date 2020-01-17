<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <h1><?php echo e(config('specific.app_name')); ?></h1>
        <div class="actions">
        <a href="<?php echo e(route('add_url')); ?>" class="btn btn-info">Nouveau</a>
        </div>
        <form method="get" action="<?php echo e(route('show_url_list')); ?>">

        

        <input name="url" class="input form-control" value="<?php echo e($finding); ?>" placeholder="Please enter your original url here"></input>
        <?php echo $errors->first('url', '<p class="error-msg">:message</p>'); ?>

        </form>
    </div>

    <div class="">
        
            <div class="container content">
                <div class="row">
                    <?php $__currentLoopData = $url_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-9">
                            <article>
                                <h1><?php echo e($url->title); ?></h1>
                                <div>
                                    <p>
                                        <a href="<?php echo e($url->url); ?>"> <?php echo e($url->url); ?> </a> 
                                    </p>
                                </div>
                                <div>
                                    <em><?php echo e($url->getCreatedAt()->fromNow()); ?></em>
                                </div>
                                
                                <div class="edit">
                                    <a href="<?php echo e(route('edit_url', ['id'=> $url->id])); ?>" style="color:#5bc0de;">editer</a>
                                    
                                </div>
                                <div  class="show">
                                        <a href="<?php echo e(route('show_details', ['id'=> $url->shortened])); ?>" style="">show</a>
                                    </div>
                                <div class="style-date">
                                    <em><?php echo e($url->getCreatedAt()->calendar()); ?></em>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="container paginations">
                <div class="row">

                    <?php echo e($url_list->links()); ?>

                </div>
            </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\UrlLoops\resources\views/page/url/showOrcreate.blade.php ENDPATH**/ ?>