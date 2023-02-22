<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="contact-page-conent-aera">
        <div class="container">
            <div class="row reorder-xs">
                <div class="col-lg-8">
                    <div class="contact-form-inner">
                        <h2 class="title"><?php echo e(get_static_option('contact_page_'.get_user_lang().'_form_section_title')); ?></h2>
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
                        <form action="<?php echo e(route('frontend.contact.message')); ?>" method="post" id="contact_form_submit" class="contact-form">
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
                                    <button class="submit-btn" type="submit"><?php echo e(__('Send Message')); ?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contac-info-wrapper">
                        <h2 class="title"><?php echo e(get_static_option('contact_page_'.get_user_lang().'_contact_info_title')); ?></h2>
                        <ul class="contact-info-list">
                            <?php $__currentLoopData = $all_contact_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="single-contact-info">
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
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-area">
        <div id="map" data-latitude="<?php echo e(get_static_option('contact_page_map_section_latitude')); ?>" data-longitude="<?php echo e(get_static_option('contact_page_map_section_longitude')); ?>"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(get_static_option('site_google_map_api')); ?>&callback=initMap" async defer></script>
    <script src="<?php echo e(asset('assets/frontend/js/goolge-map-activate.js')); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/pages/contact-page.blade.php ENDPATH**/ ?>