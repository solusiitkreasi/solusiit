<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('blog_page_'.get_user_lang().'_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('blog_page_'.get_user_lang().'_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-latest-news-grid-item margin-bottom-30">
                                    <div class="thumb">
                                        <?php if(file_exists('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)): ?>
                                            <img src="<?php echo e(asset('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e($data->title); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li><?php echo e(__('By')); ?> <a href="<?php echo e(route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"><?php echo e($data->user->username); ?></a></li>
                                            <li><a href="<?php echo e(route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"><?php echo e($data->created_at->diffForHumans()); ?></a></li>
                                        </ul>
                                        <a href="<?php echo e(route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"><h4 class="title"><?php echo e($data->title); ?></h4></a>
                                        <div class="post-description">
                                            <p><?php echo e($data->excerpt); ?></p>
                                        </div>
                                        <a href="<?php echo e(route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>" class="readmore"><?php echo e(__('Read more')); ?> <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-lg-12">
                        <nav class="pagination-wrapper" aria-label="Page navigation ">
                           <?php echo e($all_blogs->links()); ?>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                   <?php echo $__env->make('frontend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>