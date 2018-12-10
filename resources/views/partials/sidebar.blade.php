@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>
            
            @can('users_manage')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>

                </ul>
            </li>
            @endcan
            {{--view for managing Crud generator--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">CRUD MANAGEMENT</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('migration-field-types.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                migration-field-types
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('form-field-types.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                form-field-types
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('view-options.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                view-options
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('model-options.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                model-options
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('crud-options.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                crud-options
                            </span>
                        </a>
                    </li>


                </ul>
            </li>
            {{--end of  view for managing crud generator--}}

            <li class="{{ $request->segment(1) == 'ques' ? 'active' : '' }}">
                <a href="{{ route('ques.index') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Ques</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'extensions' ? 'active' : '' }}">
                <a href="{{ route('extensions.index') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Extensions</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
