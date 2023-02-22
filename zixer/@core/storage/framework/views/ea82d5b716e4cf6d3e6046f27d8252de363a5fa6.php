<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('quote_page_'.get_user_lang().'_page_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="order-service-page-content-area padding-100">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_contact_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info-02">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><?php echo e($data->title); ?></h4>
                                <?php $desc = explode(';',$data->description) ?>
                                <?php $__currentLoopData = $desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="details"><?php echo e($item); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="quote-content-area padding-top-70">
                        <h3 class="quote-title"><?php echo e(get_static_option('quote_page_'.get_user_lang().'_form_title')); ?></h3>
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
                        <form action="<?php echo e(route('frontend.quote.message')); ?>" method="post" enctype="multipart/form-data" class="contact-form quote-form">
                            <?php echo csrf_field(); ?>
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
                                    <div class="form-group">
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="<?php echo e(__('Enter Your Subject')); ?>">
                                    </div>
                                    <div class="form-group textarea">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="<?php echo e(__('Enter Your Message')); ?>"></textarea>
                                    </div>
                                    <div class="btn-wrapper text-center">
                                        <button class="submit-btn" type="submit"><?php echo e(__('Send Quote')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/pages/quote-page.blade.php ENDPATH**/ ?>