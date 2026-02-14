
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($settings->site_name); ?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	<!-- Font Awesome Icon -->
	<link type="text/css" rel="stylesheet" href="<?php echo e(asset('error/css/font-awesome.min.css')); ?>" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo e(asset('error/css/style.css')); ?>" />
</head>

<body>
	<div id="notfound">
		<div class="notfound-bg"></div>
		<div class="notfound">
			<div class="notfound-404">
				<h1> <?php echo $__env->yieldContent('code'); ?> </h1>
			</div>
			<h2><?php echo $__env->yieldContent('message'); ?></h2>
			<a href="<?php echo e(url()->previous()); ?>" class="home-btn">Go Back</a>
		</div>
	</div>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/errors/minimal.blade.php ENDPATH**/ ?>