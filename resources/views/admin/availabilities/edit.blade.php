@extends('admin.layouts.admin')

@section('title', 'Availability' )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.availabilities.update', $availability->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Day
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="day">
                        <option @if($availability->day == "SUN") selected @endif value="SUN">Sunday</option>
                        <option @if($availability->day == "MON") selected @endif value="MON">Monday</option>
                        <option @if($availability->day == "TUE") selected @endif value="TUE">Tuesday</option>
                        <option @if($availability->day == "WED") selected @endif value="WED">Wednesday</option>
                        <option @if($availability->day == "THU") selected @endif value="THU">Thursday</option>
                        <option @if($availability->day == "FRI") selected @endif value="FRI">Friday</option>
                        <option @if($availability->day == "SAT") selected @endif value="SAT">Saturday</option>
                    </select>
                    @if($errors->has('day'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('day') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start">
                    Start Time
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="start" type="text" value="{{$availability->start}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('start')) parsley-error @endif"
                           name="start" required>(Format-> HH:MM)
                    @if($errors->has('start'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('start') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end">
                    End Time
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="end" type="text" value="{{$availability->end}}"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('end')) parsley-error @endif"
                           name="end" required>(Format-> HH:MM)
                    @if($errors->has('end'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('end') as $error)
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