<footer class="footer-area footer-bg"
<?php if(file_exists('assets/uploads/'.get_static_option('footer_background_image'))): ?>
    style="background-image: url(<?php echo e(asset('assets/uploads/'.get_static_option('footer_background_image'))); ?>)"
<?php endif; ?>
>

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget about_widget">
                        <div class="footer-logo">
                            <a href="<?php echo e(url('/')); ?>" class="footer-logo">
                                <?php if(file_exists('assets/uploads/'.get_static_option('about_widget_logo'))): ?>
                                    <img src="<?php echo e(asset('assets/uploads/'.get_static_option('about_widget_logo'))); ?>" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <p><?php echo e(get_static_option('about_widget_'.get_user_lang().'_description')); ?></p>
                        <ul class="social-icons">
                            <?php if(!empty(get_static_option('about_widget_social_icon_one')) && !empty(get_static_option('about_widget_social_icon_one_url'))): ?>
                                <li><a href="<?php echo e(get_static_option('about_widget_social_icon_one_url')); ?>"><i class="<?php echo e(get_static_option('about_widget_social_icon_one')); ?>"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty(get_static_option('about_widget_social_icon_two')) && !empty(get_static_option('about_widget_social_icon_two_url'))): ?>
                                <li><a href="<?php echo e(get_static_option('about_widget_social_icon_two_url')); ?>"><i class="<?php echo e(get_static_option('about_widget_social_icon_two')); ?>"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty(get_static_option('about_widget_social_icon_three')) && !empty(get_static_option('about_widget_social_icon_three_url'))): ?>
                                <li><a href="<?php echo e(get_static_option('about_widget_social_icon_three_url')); ?>"><i class="<?php echo e(get_static_option('about_widget_social_icon_three')); ?>"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty(get_static_option('about_widget_social_icon_four')) && !empty(get_static_option('about_widget_social_icon_four_url'))): ?>
                                <li><a href="<?php echo e(get_static_option('about_widget_social_icon_four_url')); ?>"><i class="<?php echo e(get_static_option('about_widget_social_icon_four')); ?>"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget widget_nav_menu">
                        <h2 class="widget-title"><?php echo e(get_static_option('useful_link_'.get_user_lang().'_widget_title')); ?></h2>
                        <ul>
                            <?php $useful_links_arr = json_decode($all_usefull_links->content); ?>
                            <?php $__currentLoopData = $useful_links_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $link = str_replace('[url]',url('/'),$data->menuUrl) ?>
                            <li><a href="<?php echo e($link); ?>">- <?php echo e(__($data->menuTitle)); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget widget_nav_menu">
                        <h2 class="widget-title"><?php echo e(get_static_option('important_link_'.get_user_lang().'_widget_title')); ?></h2>
                        <ul>
                            <?php $useful_links_arr = json_decode($all_usefull_links->content); ?>
                            <?php $__currentLoopData = $useful_links_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $link = str_replace('[url]',url('/'),$data->menuUrl) ?>
                                <li><a href="<?php echo e($link); ?>">- <?php echo e(__($data->menuTitle)); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget widget_popular_posts">
                        <h4 class="widget-title"><?php echo e(get_static_option('recent_post_'.get_user_lang().'_widget_title')); ?>?</h4>
                        <ul>
                            <?php $__currentLoopData = $all_recent_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="single-popular-post-item">
                                    <div class="thumb">
                                        <?php if(file_exists('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)): ?>
                                            <img src="<?php echo e(asset('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e($data->title); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <span class="time"><i class="fa fa-calendar"></i> <?php echo e($data->created_at->diffForHumans()); ?></span>
                                        <h4 class="title"><a href="<?php echo e(route('frontend.blog.single',['id' => $data->id, 'any' => Str::slug($data->title,'-')])); ?>"><?php echo e($data->title); ?></a></h4>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-bottom-inner">
                        <div class="copyright-area">
                            <span class="copyright-text">
                                 <?php
                                     $footer_text = get_static_option('site_footer_copyright');
                                     $footer_text = str_replace('{copy}','&copy;',$footer_text);
                                     $footer_text = str_replace('{year}',date('Y'),$footer_text);
                                 ?>
                                <?php echo $footer_text; ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
</div>

<div class="back-to-top">
    <i class="fas fa-angle-up"></i>
</div>

<!-- jquery -->
<script src="<?php echo e(asset('assets/frontend/js/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery-migrate-3.1.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
<script>
    (function($){
        "use strict";
        $(document).ready(function(){
            $(document).on('change','#langchange',function(e){
                $.ajax({
                    url : "<?php echo e(route('frontend.langchange')); ?>",
                    type: "GET",
                    data:{
                        'lang' : $(this).val()
                    },
                    success:function (data) {
                        location.reload();
                    }
                })
            });
        });
    }(jQuery));
</script>
<?php echo $__env->yieldContent('scripts'); ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src="https://embed.tawk.to/<?php echo e(get_static_option('tawk_api_key')); ?>/default";
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>

</html><?php /**PATH D:\xampp\htdocs\test\sik\evkatama\zixer\@core\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>