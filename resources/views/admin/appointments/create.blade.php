@extends('admin.layouts.admin')

@section('title', 'Add Appointment' )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.appointments.store'],'method' => 'post','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">
                    Select User
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="user_id" name="user_id" class="select2" autocomplete="off" required>
                        <option value="">Select</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->mobile}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user_id'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('user_id') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="scheduled_on" >
                    Date & Time
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class='input-group date' id='myDatepicker2'>
                        <input type='text' class="form-control col-md-7 col-xs-12 @if($errors->has('scheduled_on')) parsley-error @endif" name="scheduled_on" value="{{ old('scheduled_on') }}"/>
                        <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>

                    @if($errors->has('scheduled_on'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('scheduled_on') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_id">
                    Select Service
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="service_id" name="service_id" class="select2" autocomplete="off" required>
                        <option value="">Select</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->title}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('service_id'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('service_id') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">
                    Status
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="status" name="status" class="select2" autocomplete="off">
                        <option value="">Select</option>
                        <option value="RESERVED">RESERVED</option>
                        <option value="CONFIRMED">CONFIRMED</option>
                        <option value="CANCELED">CANCELED</option>
                        <option value="SERVED">SERVED</option>
                    </select>
                    @if($errors->has('status'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('status') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                    <button type="submit" class="btn btn-success"> Update</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/datetimepicker.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/datetimepicker.js')) }}

    <script type="text/javascript">
        $('#myDatepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            sideBySide: true,
            stepping: 30
        });
    </script>
@endsection