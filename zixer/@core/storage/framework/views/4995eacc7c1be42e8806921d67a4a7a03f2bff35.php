<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('About Team Section')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('About Team Section Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.team.page.about')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="nav-item nav-link <?php if($key == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#nav-home-<?php echo e($lang->slug); ?>" role="tab" aria-selected="true"><?php echo e($lang->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel" >
                                    <div class="form-group">
                                        <label for="team_page_<?php echo e($lang->slug); ?>_about_section_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="team_page_<?php echo e($lang->slug); ?>_about_section_title" value="<?php echo e(get_static_option('team_page_'.$lang->slug.'_about_section_title')); ?>" class="form-control" id="team_page_<?php echo e($lang->slug); ?>_about_section_title">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Description')); ?></label>
                                        <input type="hidden" name="team_page_<?php echo e($lang->slug); ?>_about_section_description" value="<?php echo e(get_static_option('team_page_'.$lang->slug.'_about_section_description')); ?>">
                                        <div class="summernote" data-content='<?php echo e(get_static_option('team_page_'.$lang->slug.'_about_section_description')); ?>'></div>
                                    </div>
                                    <div class="img-wrap">
                                        <?php if(file_exists('assets/uploads/'.get_static_option('team_page_'.$lang->slug.'_about_section_image'))): ?>
                                            <img style="max-width: 150px" src="<?php echo e(asset('assets/uploads/'.get_static_option('team_page_'.$lang->slug.'_about_section_image'))); ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="team_page_<?php echo e($lang->slug); ?>_about_section_image"><?php echo e(__('Image')); ?></label>
                                        <input type="file" class="form-control" name="team_page_<?php echo e($lang->slug); ?>_about_section_image" id="team_page_<?php echo e($lang->slug); ?>_about_section_image">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/backend/pages/team-page/about-section.blade.php ENDPATH**/ ?>