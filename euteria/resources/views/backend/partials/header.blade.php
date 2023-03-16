<nav class="main-header navbar navbar-expand navbar-white navbar-light">    
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @php
            $new_feedback = App\Models\Utility\Feedback::NewFeedback();
        @endphp
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                @if (count($new_feedback))
                <span class="badge badge-danger navbar-badge">
                    {{count($new_feedback)}}
                </span>
                    
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @forelse($new_feedback as $row)
                <a href="{{route('admin.feedback.show',$row->id)}}" class="dropdown-item">
                    
                    <div class="media">
                        {{-- <img src="{{../../dist/img/user1-128x128.jpg}}" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
                        <div class="media-body">
                            <h3 class="dropdown-item-title"> 
                                {{$row->name}} 
                                {{-- <span class="float-right text-sm text-danger">
                                    <i class="fas fa-star"></i>
                                </span> --}}
                            </h3>
                            <p class="text-sm">{{$row->company}}</p>
                            <p class="text-sm text-muted">
                                <i class="far fa-clock mr-1"></i> {{$row->created_at->diffForHumans()}}
                            </p>
                        </div>
                    </div>
                    
                </a>
                <div class="dropdown-divider"></div>
                @empty
                <div class="d-block py-3 text-center">
                    No new Feedback
                </div>
                <div class="dropdown-divider"></div>
                @endforelse
                <a href="{{route('admin.feedback.index')}}" class="dropdown-item dropdown-footer">See All Feedback</a>
            </div>
        </li>
        
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-warning navbar-badge">
                    {{count($new_feedback)}}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    {{count($new_feedback)}} New Feedback
                </span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-language"></i> 
                <span class="text-uppercase">
                    {{config('app.locale')}}

                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('lang.switch','id')}}" class="dropdown-item">
                    <span class="flag-icon flag-icon-id"></span> Indonesia
                </a>
                <a href="{{route('lang.switch','en')}}" class="dropdown-item">
                    <span class="flag-icon flag-icon-us"></span> English
                </a>
                {{-- <div class="dropdown-divider"></div> --}}
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('backend/img/user.png')}}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{Auth::user()->name ?? '-'}}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                
                <li class="user-header bg-primary">
                    <img src="{{asset('backend/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{Auth::user()->name}}
                        <small>{{Auth::user()->email}}</small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="{{route('admin.user.profile')}}" class="btn btn-default btn-flat float-left">Profile</a>
                    <a href="{{route('logout')}}" class="btn btn-default btn-flat float-right">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
