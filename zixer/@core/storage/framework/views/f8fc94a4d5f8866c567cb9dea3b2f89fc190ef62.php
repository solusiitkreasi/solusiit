<?php echo $__env->make('frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header class="header-area header-style-two" >

    <div class="header-carousel-two">
        <?php $__currentLoopData = $all_header_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-header-carosuel-two-item"
             <?php if(file_exists('assets/uploads/header-sliders/header-slider-image-'.$data->id.'.'.$data->image)): ?>
             style="background-image: url(<?php echo e(asset('assets/uploads/header-sliders/header-slider-image-'.$data->id.'.'.$data->image)); ?>)"
                <?php endif; ?>
        >
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="header-inner">
                            <h1 class="title">
                                <?php
                                    $title = str_replace('{color}','<span class="base-color">',$data->title);
                                    $title = str_replace('{/color}','</span>',$title);
                                ?>
                                <?php echo $title; ?>

                            </h1>
                            <p><?php echo e($data->description); ?></p>
                            <div class="btn-wrapper">
                                <?php if(!empty($data->btn_01_status)): ?>
                                    <a href="<?php echo e($data->btn_01_url); ?>" class="boxed-btn"><?php echo e($data->btn_01_text); ?></a>
                                <?php endif; ?>
                                <?php if(!empty($data->btn_02_status)): ?>
                                    <a href="<?php echo e($data->btn_02_url); ?>" class="boxed-btn blank"><?php echo e($data->btn_02_text); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</header>


<?php if(!empty(get_static_option('home_page_key_feature_section_status'))): ?>
    <div class="header-bottom-area ">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-header-bottom-item">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><?php echo e($data->title); ?></h4>
                                <p><?php echo e($data->description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty(get_static_option('home_page_build_dream_section_status'))): ?>
    <section class="build-your-dream-area gray-bg style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area">
                        <h3 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_build_dream_title')); ?></h3>
                        <p><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_build_dream_description')); ?></p>
                        <?php if(!empty(get_static_option('build_dream_'.get_user_lang().'_section_button_status'))): ?>
                            <div class="btn-wrapper">
                                <a href="<?php echo e(get_static_option('home_page_01_'.get_user_lang().'_build_dream_btn_url')); ?>" class="btn-boxed"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_build_dream_btn_title')); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-play-area-two">
                        <div class="img-wrapper">
                            <?php if(file_exists('assets/uploads/'.get_static_option('home_page_01_'.get_user_lang().'_build_dream_right_image'))): ?>
                                <img src="<?php echo e(asset('assets/uploads/'.get_static_option('home_page_01_'.get_user_lang().'_build_dream_right_image'))); ?>" alt="">
                            <?php endif; ?>
                            <div class="hover">
                                <a href="<?php echo e(get_static_option('home_page_01_'.get_user_lang().'_build_dream_btn_url')); ?>" class="video-play-btn mfp-iframe"> <i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(!empty(get_static_option('home_page_service_section_status'))): ?>
    <section class="service-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_service_area_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service-item-two">
                        <div class="icon">
                            <i class="<?php echo e($data->icon); ?>"></i>
                        </div>
                        <div class="content">
                            <a href="<?php echo e(route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"><h4 class="title"><?php echo e($data->title); ?></h4></a>
                            <div class="post-description">
                               <p> <?php echo e($data->excerpt); ?></p>
                            </div>
                            <a href="<?php echo e(route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>" class="readmore"><?php echo e(__('Read More')); ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_counterup_section_status'))): ?>
    <section class="counterup-area counterup-bg-2"
             <?php if(file_exists('assets/uploads/'.get_static_option('home_02_counterup_bg_image'))): ?>
             style="background-image: url(<?php echo e(asset('assets/uploads/'.get_static_option('home_02_counterup_bg_image'))); ?>)"
            <?php endif; ?>
    >
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_counterup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-counterup-item white-theme">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <div class="content">
                                <div class="count-num"><?php echo e($data->number); ?></div>
                                <h5 class="name"><?php echo e($data->title); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_recent_work_section_status'))): ?>
    <section class="recent-works-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_recent_work_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-nav-area">
                        <ul>
                            <li class="active" data-filter="*"><?php echo e(__('All work')); ?></li>
                            <?php $__currentLoopData = $all_work_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-filter=".<?php echo e(Str::slug($data->name)); ?>"><?php echo e($data->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-masonry" >
                        <?php $__currentLoopData = $all_work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-recent-wrok-item col-lg-4  col-md-6 <?php echo e(get_work_category_by_id($data->id,'slug')); ?>">
                                <div class="thumb">
                                    <?php $img_url = '';?>
                                    <?php if(file_exists('assets/uploads/works/work-grid-'.$data->id.'.'.$data->image)): ?>
                                        <img src="<?php echo e(asset('assets/uploads/works/work-grid-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e($data->title); ?>">
                                        <?php $img_url = asset('assets/uploads/works/work-large-'.$data->id.'.'.$data->image);?>
                                    <?php endif; ?>
                                    <div class="hover">
                                        <ul>
                                            <li><a href="<?php echo e($img_url); ?>" class="image-popup"> <i class="flaticon-image"></i> </a></li>
                                            <li><a href="<?php echo e(route('frontend.work.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"> <i class="flaticon-link-symbol"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_price_plan_section_status'))): ?>
<section class="pricing-plan-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_price_plan_section_title')); ?></h2>
                    <div class="separator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $all_price_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-price-plan-01">
                        <div class="price-header">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <h4 class="name"><?php echo e($data->title); ?></h4>
                            <div class="price"> <?php echo e($data->price); ?></div>
                        </div>
                        <div class="price-body">
                            <ul>
                                <?php
                                    $features = explode(';',$data->features);
                                ?>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($feat); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <?php $button_url = !empty($data->url_status) ? route('frontend.plan.order',$data->id) : $data->btn_url ;  ?>
                            <a href="<?php echo e($button_url); ?>" class="btn-boxed blank"><?php echo e($data->btn_text); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_testimonial_section_status'))): ?>
    <section class="testimonial-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_testimonial_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="testimonial-carousel">
                        <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-tesitmoial-item">
                                <div class="thumb">
                                    <?php if(file_exists('assets/uploads/testimonial/testimonial-grid-'.$data->id.'.'.$data->image)): ?>
                                        <img src="<?php echo e(asset('assets/uploads/testimonial/testimonial-grid-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e(__($data->name)); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content-area">
                        <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-testimonial-quote <?php if($key == 0): ?> active <?php endif; ?>" data-owl-item="<?php echo e($key); ?>">
                                <p><?php echo e($data->description); ?></p>
                                <h4 class="title"><?php echo e($data->name); ?></h4>
                                <span class="post"><?php echo e($data->designation); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_latest_news_section_status'))): ?>
    <section class="latest-news-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_latest_news_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news-grid-item">
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
        </div>
    </section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_brand_logo_section_status'))): ?>
    <div class="brand-carousel-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        <?php $__currentLoopData = $all_brand_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-brand-item">
                                <?php if(file_exists('assets/uploads/brands/brand-image-'.$data->id.'.'.$data->image)): ?>
                                    <img src="<?php echo e(asset('assets/uploads/brands/brand-image-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e($data->title); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php echo $__env->make('frontend.partials.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\test\sik\evkatama\zixer\@core\resources\views/frontend/home-pages/home-02.blade.php ENDPATH**/ ?>