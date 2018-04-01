<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Users
                        </a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                <li>
                    <a href="{{ route('admin.services') }}">
                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                        Services
                    </a>
                </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.blogs') }}">
                            <i class="fa fa-rss" aria-hidden="true"></i>
                            Blogs
                        </a>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.testimonials') }}">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            Testimonials
                        </a>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.galleries') }}">
                            <i class="fa fa-image" aria-hidden="true"></i>
                            Galleries
                        </a>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.availabilities') }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Availabilities
                        </a>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.appointments') }}">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            Appointments
                        </a>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.settings.edit') }}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            Settings
                        </a>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.supports') }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            Support
                        </a>
                    </li>
                </ul>
            </div>
            {{--<div class="menu_section">--}}
                {{--<h3>Development</h3>--}}

                {{--<ul class="nav side-menu">--}}
                    {{--<li>--}}
                        {{--<a>--}}
                            {{--<i class="fa fa-list"></i>--}}
                            {{--Log Viewer--}}
                            {{--<span class="fa fa-chevron-down"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('log-viewer::dashboard') }}">--}}
                                    {{--Dashboard--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('log-viewer::logs.list') }}">--}}
                                    {{--Logs--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
