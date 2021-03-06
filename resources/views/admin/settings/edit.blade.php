@extends('admin.layouts.admin')

@section('title', 'Setting' )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.settings.update', $setting->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="app_title">
                    App Title
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="app_title" type="text" value="{{$setting->app_title}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('app_title')) parsley-error @endif"
                           name="app_title" required>
                    @if($errors->has('app_title'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('app_title') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clinic_name">
                    Clinic Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="clinic_name" type="text" value="{{$setting->clinic_name}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('clinic_name')) parsley-error @endif"
                           name="clinic_name" required>
                    @if($errors->has('clinic_name'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('clinic_name') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="doctor_name">
                    Doctor Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="doctor_name" type="text" value="{{$setting->doctor_name}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('doctor_name')) parsley-error @endif"
                           name="doctor_name" required>
                    @if($errors->has('doctor_name'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('doctor_name') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_number">
                    Mobile Number
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="mobile_number" type="text" value="{{$setting->mobile_number}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('mobile_number')) parsley-error @endif"
                           name="mobile_number" required>
                    @if($errors->has('mobile_number'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('mobile_number') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                    Email
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="email" type="text" value="{{$setting->email}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('email')) parsley-error @endif"
                           name="email" required>
                    @if($errors->has('email'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('email') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">
                    Address
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="address"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('address')) parsley-error @endif"
                              name="address" required>{{$setting->address}}</textarea>
                    @if($errors->has('address'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('address') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="latitude">
                    Latitude
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="latitude" type="text" value="{{$setting->latitude}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('latitude')) parsley-error @endif"
                           name="latitude" required>
                    @if($errors->has('latitude'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('latitude') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="longitude">
                    Longitude
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="longitude" type="text" value="{{$setting->longitude}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('longitude')) parsley-error @endif"
                           name="longitude" required>
                    @if($errors->has('longitude'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('longitude') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_1">
                    About Us Section 1
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="about_1"
                              class="form-control col-md-7 col-xs-12 @if($errors->has('about_1')) parsley-error @endif"
                              name="about_1">{{$setting->about_1}}</textarea>
                    @if($errors->has('about_1'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('about_1') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_2">
                    About Us Section 2
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="about_2"
                              class="form-control col-md-7 col-xs-12 @if($errors->has('about_2')) parsley-error @endif"
                              name="about_2">{{$setting->about_2}}</textarea>
                    @if($errors->has('about_2'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('about_2') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_count_1">
                    About Us Count Text 1
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="about_count_1" type="text" value="{{$setting->about_count_1}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('about_count_1')) parsley-error @endif"
                           name="about_count_1">
                    @if($errors->has('about_count_1'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('about_count_1') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_count_2">
                    About Us Count Text 2
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="about_count_2" type="text" value="{{$setting->about_count_2}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('about_count_2')) parsley-error @endif"
                           name="about_count_2">
                    @if($errors->has('about_count_2'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('about_count_2') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_count_3">
                    About Us Count Text 3
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="about_count_3" type="text" value="{{$setting->about_count_3}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('about_count_3')) parsley-error @endif"
                           name="about_count_3">
                    @if($errors->has('about_count_3'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('about_count_3') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_title">
                    Services Section Title
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="service_title" type="text" value="{{$setting->service_title}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('service_title')) parsley-error @endif"
                           name="service_title">
                    @if($errors->has('service_title'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('service_title') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_body">
                    Services Section Detail
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="service_body"
                              class="form-control col-md-7 col-xs-12 @if($errors->has('service_body')) parsley-error @endif"
                              name="service_body">{{$setting->service_body}}</textarea>
                    @if($errors->has('service_body'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('service_body') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                    <button type="submit" class="btn btn-success"> Save</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
