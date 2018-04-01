@extends('admin.layouts.admin')

@section('title', 'Update Gallery' )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.galleries.update', $gallery->id],'method' => 'put','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image" >
                    Image
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="image" type="file" class="form-control col-md-7 col-xs-12 @if($errors->has('image')) parsley-error @endif"
                           name="image">
                    <a target="_blank" href="{{ $gallery->image_url }}">{{ $gallery->image_url }}</a>
                    @if($errors->has('image'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('image') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_banner" >
                    Is Banner?
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-check">
                        <input id="is_banner" type="checkbox" class="form-check-input @if($errors->has('is_banner')) parsley-error @endif"
                               name="is_banner" @if($gallery->is_banner) checked @endif>
                    </div>
                    @if($errors->has('is_banner'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('is_banner') as $error)
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

@section('scripts')
    @parent
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'body' );
    </script>
@endsection