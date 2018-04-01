@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
            <span class="count_top"><i class="fa fa-users"></i> {{ __('views.admin.dashboard.count_0') }}</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
            <span class="count_top"><i class="fa fa-address-card"></i> Upcoming Appointments</span>
            <div>
                <span class="count green">{{  $counts['upcoming_appointments'] }}</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
            <span class="count_top"><i class="fa fa-envelope "></i> Support Requests</span>
            <div>
                <span class="count green">{{  $counts['support_count'] }}</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
            <span class="count_top"><i class="fa fa-rss"></i> Blogs Count</span>
            <div>
                <span class="count green">{{  $counts['blogs_count'] }}</span>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Appointments by day</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="date_piker pull-right"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span class="date_piker_label">
                                {{ \Carbon\Carbon::now()->addDays(-6)->format('F j, Y') }} - {{ \Carbon\Carbon::now()->format('F j, Y') }}
                            </span>
                            <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br />

    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
            {{--<div id="registration_usage" class="x_panel tile fixed_height_320 overflow_hidden">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>Appointment Services</h2>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="x_content">--}}
                    {{--<table class="" style="width:100%">--}}
                        {{--<tr>--}}
                            {{--<th></th>--}}
                            {{--<th>--}}
                                {{--<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">--}}
                                    {{--<p class="">{{  __('views.admin.dashboard.sub_title_3') }}</p>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">--}}
                                    {{--<p class="">{{  __('views.admin.dashboard.sub_title_4') }}</p>--}}
                                {{--</div>--}}
                            {{--</th>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>--}}
                                {{--<canvas class="canvasChart" height="140" width="140" style="margin: 15px 10px 10px 0">--}}
                                {{--</canvas>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<table class="tile_info">--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<p><i class="fa fa-square aero"></i>--}}
                                                {{--<span class="tile_label">--}}
                                                     {{--{{ __('views.admin.dashboard.source_0') }}--}}
                                                {{--</span>--}}
                                            {{--</p>--}}
                                        {{--</td>--}}
                                        {{--<td id="registration_usage_from"></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<p><i class="fa fa-square red"></i>--}}
                                                {{--<span class="tile_label">--}}
                                                    {{--{{ __('views.admin.dashboard.source_1') }}--}}
                                                {{--</span>--}}
                                            {{--</p>--}}
                                        {{--</td>--}}
                                        {{--<td id="registration_usage_google"></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<p><i class="fa fa-square blue"></i>--}}
                                                {{--<span class="tile_label">--}}
                                                    {{--{{ __('views.admin.dashboard.source_2') }}--}}
                                                {{--</span>--}}
                                            {{--</p>--}}
                                        {{--</td>--}}
                                        {{--<td id="registration_usage_facebook"></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<p><i class="fa fa-square grren"></i>--}}
                                                {{--<span class="tile_label">--}}
                                                     {{--{{ __('views.admin.dashboard.source_3') }}--}}
                                                {{--</span>--}}
                                            {{--</p>--}}
                                        {{--</td>--}}
                                        {{--<td id="registration_usage_twitter"></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
