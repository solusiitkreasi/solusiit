<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order For'.': '. $order_details->title)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="order-service-page-content-area padding-100">
        <div class="container">
            <div class="row reorder-xs justify-content-between ">
                <div class="col-lg-6">
                    <div class="order-content-area padding-top-70">
                        <h3 class="order-title"><?php echo e(get_static_option('order_page_'.get_user_lang().'_form_title')); ?></h3>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($message); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('frontend.order.message')); ?>" method="post" enctype="multipart/form-data" class="contact-form order-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="package" value="<?php echo e($order_details->id); ?>">
                            <input type="hidden" name="captcha_token" id="gcaptcha_token">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="<?php echo e(__('Enter Your Name')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo e(__('Enter Your Email')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group textarea">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="<?php echo e(__('Enter Your Message')); ?>"></textarea>
                                    </div>
                                    <button class="submit-btn" type="submit"><?php echo e(__('Order Package')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content-area">
                        <div class="single-price-plan-01">
                            <div class="price-header">
                                <div class="icon">
                                    <i class="<?php echo e($order_details->icon); ?>"></i>
                                </div>
                                <h4 class="name"><?php echo e($order_details->title); ?></h4>
                                <div class="price"> <?php echo e($order_details->price); ?></div>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <?php
                                        $features = explode(';',$order_details->features);
                                    ?>
                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($feat); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="price-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/pages/order-page.blade.php ENDPATH**/ ?>