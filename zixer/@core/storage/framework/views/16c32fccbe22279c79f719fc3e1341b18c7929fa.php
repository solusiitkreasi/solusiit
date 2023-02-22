<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="<?php echo e(url('/')); ?>" class="logo">
                    <?php if(file_exists('assets/uploads/'.get_static_option('site_logo'))): ?>
                        <img src="<?php echo e(asset('assets/uploads/'.get_static_option('site_logo'))); ?>" alt="site logo">
                    <?php endif; ?>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#zixer_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="zixer_main_menu">
            <ul class="navbar-nav">

                <?php if(!empty($primary_menu->content)): ?>
                    <?php
                        $cc = 0;
                        $parent_item_count = 0;
                       $menu_content = json_decode($primary_menu->content);
                    ?>
                    <?php $__currentLoopData = $menu_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($cc > 0 && $cc == $parent_item_count){ print '</ul>'; $cc = 0; }
                           if (!empty($data->parent_id) && $data->depth > 0){
                                if  ($cc == 0){
                                    print '<ul class="sub-menu">';
                                    $parent_item_count = get_child_menu_count($menu_content,$data->parent_id);
                                }else{  print '</li>'; }
                            }else{ print '</li>'; }
                        ?>
                        <li class="<?php if(request()->path() == substr($data->menuUrl,6)): ?> current-menu-item <?php endif; ?>">
                            <?php $link = str_replace('[url]',url('/'),$data->menuUrl) ?>
                            <a href="<?php echo e($link); ?>"><?php echo e(__($data->menuTitle)); ?></a>
                        <?php if (!empty($data->parent_id) && $data->depth > 0){ $cc++;} ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <li class="<?php if(request()->path() == '/'): ?> current-menu-item <?php endif; ?>">
                        <a  href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(!empty(get_static_option('navbar_button'))): ?>
                    <li class="navbar-btn-wrapper">
                        <a class="boxed-btn" href="<?php echo e(route('frontend.request.quote')); ?>"><?php echo e(get_static_option("navbar_".get_user_lang()."_button_text")); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /opt/lampp/htdocs/zixer/@core/resources/views/frontend/partials/navbar.blade.php ENDPATH**/ ?>