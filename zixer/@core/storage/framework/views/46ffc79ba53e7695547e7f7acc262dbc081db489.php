<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/colorpicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Basic Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("Basic Settings")); ?></h4>
                        <form action="<?php echo e(route('admin.general.basic.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="site_title"><?php echo e(__('Site Title')); ?></label>
                                <input type="text" name="site_title"  class="form-control" value="<?php echo e(get_static_option('site_title')); ?>" id="site_title">
                            </div>
                            <div class="form-group">
                                <label for="site_tag_line"><?php echo e(__('Site Tag Line')); ?></label>
                                <input type="text" name="site_tag_line"  class="form-control" value="<?php echo e(get_static_option('site_tag_line')); ?>" id="site_tag_line">
                            </div>
                            <div class="form-group">
                                <label for="site_footer_copyright"><?php echo e(__('Footer Copyright')); ?></label>
                                <input type="text" name="site_footer_copyright"  class="form-control" value="<?php echo e(get_static_option('site_footer_copyright')); ?>" id="site_footer_copyright">
                                <small class="form-text text-muted">{copy} Will replace by &copy; and {year} will be replaced by current year.</small>
                            </div>
                            <div class="form-group">
                                <label for="site_color"><?php echo e(__('Site Base Color Settings')); ?></label>
                                <input type="text" name="site_color" style="background-color: <?php echo e(get_static_option('site_color')); ?>;color: #fff;" class="form-control" value="<?php echo e(get_static_option('site_color')); ?>" id="site_color">
                            </div>
                            <div class="form-group">
                                <label for="site_color"><?php echo e(__('Site Base Color Two Settings')); ?></label>
                                <input type="text" name="site_main_color_two" style="background-color: <?php echo e(get_static_option('site_main_color_two')); ?>;color: #fff;" class="form-control" value="<?php echo e(get_static_option('site_main_color_two')); ?>" id="site_main_color_two">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/colorpicker.js')); ?>"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                $('#site_color').ColorPicker({
                    color: '#ff4249',
                    onShow: function (colpkr) {
                        $(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        $(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb) {
                        $('#site_color').css('background-color', '#' + hex);
                        $('#site_color').val('#' + hex);
                    }
                });
                $('#site_main_color_two').ColorPicker({
                    color: '#852aff',
                    onShow: function (colpkr) {
                        $(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        $(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb) {
                        $('#site_main_color_two').css('background-color', '#' + hex);
                        $('#site_main_color_two').val('#' + hex);
                    }
                });
            });
        }(jQuery));
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/backend/general-settings/basic.blade.php ENDPATH**/ ?>