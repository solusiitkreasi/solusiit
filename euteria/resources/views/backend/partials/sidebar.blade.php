<aside class="main-sidebar sidebar-dark-primary elevation-4">    
    <a href="#" class="brand-link">      
        <span class="brand-text font-weight-bold pl-3">{{env('APP_NAME')}}</span>
    </a>
    <div class="sidebar">        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset($setting->logo)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{env('APP_NAME')}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                               
                <li class="nav-header" style="padding: 1.7rem 1rem .5rem;">MASTER</li>
                @permission('read-dashboard')
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{active(['admin.dashboard'],'active')}}">
                        <i class="nav-icon fa fa-chart-bar"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>   
                @endpermission

                @permission('read-setting|read-brand|read-category|read-slider')
                <li class="nav-item has-treeview {{active(['admin.setting.*','admin.brand.*','admin.category.*'],'menu-open')}}">
                    <a href="#" class="nav-link {{active(['admin.setting.*','admin.brand.*','admin.category.*'],'active')}}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('read-setting')
                        <li class="nav-item">
                            <a href="{{route('admin.setting.index')}}" class="nav-link {{active(['admin.setting.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Setting</p>
                            </a>
                        </li>
                        @endpermission
                        @permission('read-brand')
                        <li class="nav-item">
                            <a href="{{route('admin.brand.index')}}" class="nav-link {{active(['admin.brand.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        @endpermission
                        @permission('read-category')
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link {{active(['admin.category.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        @endpermission
                        @permission('read-slider')
                        <li class="nav-item">
                            <a href="{{route('admin.slider.index')}}" class="nav-link {{active(['admin.slider.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        @endpermission
                    </ul>
                </li>            
                
                @endpermission

                @permission('read-user|read-role|read-permission')        
                <li class="nav-item has-treeview {{active(['admin.user.*','admin.role.*','admin.permission.*'],'menu-open')}}">
                    <a href="#" class="nav-link {{active(['admin.user.*','admin.role.*','admin.permission.*'],'active')}}">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link {{active(['admin.user.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link {{active(['admin.role.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.permission.index')}}" class="nav-link {{active(['admin.permission.*','active'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>  
                @endpermission


                <li class="nav-header">MENU</li> 
                @permission('read-menu')        
                <li class="nav-item">
                    <a href="{{route('admin.menu.index')}}" class="nav-link {{active(['admin.menu.*'],'active')}}">
                        <i class="nav-icon fa fa-bars"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>    
                @endpermission
                @permission('read-post')
                @foreach (App\Models\Backend\Menu::sidebarMenu() as $row)
                
                
                @if (count($row->child))
                @php
                    $child_route = [];
                    foreach($row->child as $child)
                    {
                        $child_route []='admin/post/'.$child->slug.'*';
                    }
                    $child_route[]='admin/post/'.$row->slug.'*';
                @endphp
                <li class="nav-item has-treeview {{active($child_route,'menu-open')}}">
                    <a href="#" class="nav-link {{active($child_route,'active')}}">
                      <i class="nav-icon {{ App\Models\Backend\Menu::menu_icon($row->type) }}"></i>
                      <p>
                        {{$row->name}}
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($row->child as $child)
                        <li class="nav-item">
                            <a href="{{route('admin.post.index',$child->slug)}}" class="nav-link {{active('admin/post/'.$child->slug,'active')}}">
                                <i class="{{App\Models\Backend\Menu::menu_icon($child->type)}} nav-icon"></i>
                                <p>{{$child->name}}</p>
                            </a>
                        </li>                            
                        @endforeach
                    </ul>
                  </li>
                @else
                <li class="nav-item">
                    <a href="{{route('admin.post.index',$row->slug)}}" class="nav-link {{active(['admin/post/'.$row->slug.'*'],'active')}}">
                        <i class="nav-icon {{App\Models\Backend\Menu::menu_icon($row->type)}}"></i>
                        <p>
                            {{$row->name}}
                        </p>
                    </a>
                </li>                        
                @endif           
                @endforeach 
                
                @endpermission
                
                @permission('read-feedback|read-testimony')
                <li class="nav-header">UTILITY</li> 
                <li class="nav-item">
                    <a href="{{route('admin.feedback.index')}}" class="nav-link {{active(['admin.feedback.*'],'active')}}">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>
                            Feedback
                        </p>
                    </a>
                </li>   
                <li class="nav-item">
                    <a href="{{route('admin.testimony.index')}}" class="nav-link {{active(['admin.testimony.*'],'active')}}">
                        <i class="nav-icon fa fa-comment-alt"></i>
                        <p>
                            Testimony
                        </p>
                    </a>
                </li>
                @endpermission
            </ul>
        </nav>
    </div>
</aside>