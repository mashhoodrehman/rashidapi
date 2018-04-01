@extends('admin.layouts.admin')

@section('title', 'Galleries')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{ route('admin.galleries.create') }}">Add</a>
        </div>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Image Url</th>
                <th>Is Banner?</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($galleries as $gallery)
                <tr>
                    <td><a href="{{ $gallery->image_url }}" target="_blank">{{ $gallery->image_url }}</a></td>
                    <td>{{ $gallery->is_banner }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.galleries.edit', [$gallery->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.galleries.destroy', [$gallery->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $galleries->links() }}
        </div>
    </div>
@endsection