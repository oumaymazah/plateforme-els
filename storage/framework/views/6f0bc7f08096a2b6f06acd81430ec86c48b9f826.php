

<?php $__env->startSection('title'); ?>Form Wizard With Icon
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Form Wizard With Icon</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Forms</li>
		<li class="breadcrumb-item">Form Layout</li>
		<li class="breadcrumb-item active">Form Wizard 3</li>
	<?php echo $__env->renderComponent(); ?>
	
	<div class="container-fluid">
		<div class="row">
		  <div class="col-sm-12">
			<div class="card">
			  <div class="card-header pb-0">
				<h5>Form Wizard with icon</h5>
			  </div>
			  <div class="card-body">
				<form class="f1" method="post">
				  <div class="f1-steps">
					<div class="f1-progress">
					  <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
					</div>
					<div class="f1-step active">
					  <div class="f1-step-icon"><i class="fa fa-user"></i></div>
					  <p>Registration</p>
					</div>
					<div class="f1-step">
					  <div class="f1-step-icon"><i class="fa fa-key"></i></div>
					  <p>Email</p>
					</div>
					<div class="f1-step">
					  <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
					  <p>Birth Date</p>
					</div>
				  </div>
				  <fieldset>
					<div class="form-group">
					  <label for="f1-first-name">First Name</label>
					  <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="name@example.com" required="">
					</div>
					<div class="form-group">
					  <label for="f1-last-name">Last name</label>
					  <input class="f1-last-name form-control" id="f1-last-name" type="text" name="f1-last-name" placeholder="Last name..." required="">
					</div>
					<div class="f1-buttons">
					  <button class="btn btn-primary btn-next" type="button">Next</button>
					</div>
				  </fieldset>
				  <fieldset>
					<div class="form-group">
					  <label class="sr-only" for="f1-email">Email</label>
					  <input class="f1-email form-control" id="f1-email" type="text" name="f1-email" placeholder="Email..." required="">
					</div>
					<div class="form-group">
					  <label class="sr-only" for="f1-password">Password</label>
					  <input class="f1-password form-control" id="f1-password" type="password" name="f1-password" placeholder="Password..." required="">
					</div>
					<div class="form-group">
					  <label class="sr-only" for="f1-repeat-password">Repeat password</label>
					  <input class="f1-repeat-password form-control" id="f1-repeat-password" type="password" name="f1-repeat-password" placeholder="Repeat password..." required="">
					</div>
					<div class="f1-buttons">
					  <button class="btn btn-primary btn-previous" type="button">Previous</button>
					  <button class="btn btn-primary btn-next" type="button">Next</button>
					</div>
				  </fieldset>
				  <fieldset>
					<div class="form-group">
					  <label class="sr-only">DD</label>
					  <input class="form-control" id="dd" type="number" placeholder="dd" required="">
					</div>
					<div class="form-group">
					  <label class="sr-only">MM</label>
					  <input class="form-control" id="mm" type="number" placeholder="mm" required="">
					</div>
					<div class="form-group">
					  <label class="sr-only">YYYY</label>
					  <input class="form-control" id="yyyy" type="number" placeholder="yyyy" required="">
					</div>
					<div class="f1-buttons">
					  <button class="btn btn-primary btn-previous" type="button">Previous</button>
					  <button class="btn btn-primary btn-submit" type="submit">Submit</button>
					</div>
				  </fieldset>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	
	<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard-three.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form-wizard/jquery.backstretch.min.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/forms/form-wizard-three.blade.php ENDPATH**/ ?>