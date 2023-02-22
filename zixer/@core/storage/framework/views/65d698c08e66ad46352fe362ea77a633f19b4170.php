<div class="widget-area">
    <div class="widget  widget_search">
        <form action="<?php echo e(route('frontend.blog.search')); ?>" method="get" class="search-form">
            <div class="search-form-warpper">
                <input type="search" class="search-field" name="search"  placeholder="<?php echo e(__('Search')); ?>">
                <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="widget widget_categories">
        <h2 class="widget-title"><?php echo e(get_static_option('blog_page_'.get_user_lang().'_category_widget_title')); ?></h2>
        <ul>
            <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('frontend.blog.category',['id' => $data->id,'any'=> Str::slug($data->name,'-')])); ?>"><?php echo e(ucfirst($data->name)); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="widget widget_recent_post"><!-- widget categories -->
        <h2 class="widget-title"><?php echo e(get_static_option('blog_page_'.get_user_lang().'_recent_post_widget_title')); ?></h2>
        <ul>
            <?php $__currentLoopData = $all_recent_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="single-recent-post">
                        <div class="thumb">
                            <?php if(file_exists('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)): ?>
                                <img src="<?php echo e(asset('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e($data->title); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="<?php echo e(route('frontend.blog.single',['id' => $data->id, 'any' => Str::slug($data->title,'-')])); ?>"><?php echo e($data->title); ?></a></h4>
                            <span class="time"><?php echo e($data->created_at->diffForHumans()); ?></span>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/partials/sidebar.blade.php ENDPATH**/ ?>