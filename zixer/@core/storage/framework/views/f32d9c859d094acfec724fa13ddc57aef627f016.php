<div class="support-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="left-content-area"><!-- left content area -->
                    <ul>
                        <?php $__currentLoopData = $all_support_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><i class="<?php echo e($data->icon); ?>"></i> <?php echo e($data->details); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- //.left conten tarea -->
                <div class="right-content-area"><!-- left content area -->
                    <ul class="social-icons">
                        <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($data->url); ?>"><i class="<?php echo e($data->icon); ?>"></i></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <select id="langchange">
                        <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(session()->get('lang') == $lang->slug): ?> selected <?php endif; ?> value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div><!-- //.left conten tarea -->
            </div>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/partials/support.blade.php ENDPATH**/ ?>