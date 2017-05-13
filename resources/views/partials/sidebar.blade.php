@inject('request', 'Illuminate\Http\Request')
<ul class="nav" id="side-menu">

    <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
        <a href="{{ url('/') }}">
            <i class="fa fa-wrench"></i>
            <span class="title">@lang('quickadmin.qa_dashboard')</span>
        </a>
    </li>

    
            @can('user_management_access')
            <li class="">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('categoty_access')
            <li class="{{ $request->segment(1) == 'categoties' ? 'active' : '' }}">
                <a href="{{ route('categoties.index') }}">
                    <i class="fa fa-align-left"></i>
                    <span class="title">@lang('quickadmin.categoties.title')</span>
                </a>
            </li>
            @endcan
            
            @can('lesson_access')
            <li class="{{ $request->segment(1) == 'lessons' ? 'active' : '' }}">
                <a href="{{ route('lessons.index') }}">
                    <i class="fa fa-question"></i>
                    <span class="title">@lang('quickadmin.lessons.title')</span>
                </a>
            </li>
            @endcan
            
            @can('slide_access')
            <li class="{{ $request->segment(1) == 'slides' ? 'active' : '' }}">
                <a href="{{ route('slides.index') }}">
                    <i class="fa fa-slideshare"></i>
                    <span class="title">@lang('quickadmin.slides.title')</span>
                </a>
            </li>
            @endcan
            
            @can('answer_access')
            <li class="{{ $request->segment(1) == 'answers' ? 'active' : '' }}">
                <a href="{{ route('answers.index') }}">
                    <i class="fa fa-arrows-alt"></i>
                    <span class="title">@lang('quickadmin.answers.title')</span>
                </a>
            </li>
            @endcan
            
            @can('reaction_access')
            <li class="{{ $request->segment(1) == 'reactions' ? 'active' : '' }}">
                <a href="{{ route('reactions.index') }}">
                    <i class="fa fa-assistive-listening-systems"></i>
                    <span class="title">@lang('quickadmin.reactions.title')</span>
                </a>
            </li>
            @endcan
            

    

    

    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
        <a href="{{ route('auth.change_password') }}">
            <i class="fa fa-key"></i>
            <span class="title">Change password</span>
        </a>
    </li>

    <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
</ul>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
