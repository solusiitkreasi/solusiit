
<?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="breadcrumb-area breadcrumb-bg"
         <?php if(file_exists('assets/uploads/'.get_static_option('site_breadcrumb_bg'))): ?>
         style="background-image: url(<?php echo e(asset('assets/uploads/'.get_static_option('site_breadcrumb_bg'))); ?>);"
         <?php endif; ?>
>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="title"><?php echo $__env->yieldContent('page-title'); ?></h1>
                    <div class="page-list">
                        <a href="<?php echo e(url('/')); ?>"><span><?php echo e(__('Home')); ?></span></a>
                        -
                        <span class="current-item"><?php echo $__env->yieldContent('page-title'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/frontend-page-master.blade.php ENDPATH**/ ?>