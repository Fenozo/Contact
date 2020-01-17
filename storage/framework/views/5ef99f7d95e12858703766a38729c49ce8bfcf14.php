<?php $__env->startSection('content'); ?>

<div class="container content">

	<div class="row">
		<div class="col-md-8">
			<h1> <a href="<?php echo e($data->url); ?>"><?php echo e($data->title); ?></a> </h1>
			<p ><?php echo e($data->id); ?></p>
			<em class=""><?php echo e($data->created_at->fromNow()); ?></em>
			<p class="style-date"><?php echo e($data->created_at->calendar()); ?></p>
			<p >
			<?php echo e($data->shortened); ?>

			</p>
			<p><a href="<?php echo e($data->url); ?>"><?php echo e($data->url); ?> </a></p>
		</div>
		<div class="col-md-4">
			<h1> <a href="<?php echo e($data->url); ?>"><?php echo e($data->url); ?></a> </h1>
		</div>
	</div>
    
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\UrlShortener\resources\views/page/url/show_details.blade.php ENDPATH**/ ?>