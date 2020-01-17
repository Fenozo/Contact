<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name')); ?></title>
        <meta name="author" content="FreeHTML5.co" />


        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
           
        </style>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
                <?php if(Route::has('login')): ?>
                    <div class="top-right links">
                        
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                            <a href="<?php echo e(route('login')); ?>">Login</a>

                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>">Register</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            

            <div class="content body">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <div class="content">
            <footer class="footer">
                    <div class="text-center">
                        &copy; copyright 
                        <?php echo (new Datetime())->format('Y')?>
                    </div>
                </footer>
            
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\Url\resources\views/layouts/default.blade.php ENDPATH**/ ?>