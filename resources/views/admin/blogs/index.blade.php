@extends('admin.layouts.admin')

@section('title', 'Blogs')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{ route('admin.blogs.create') }}">Add</a>
        </div>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Title</th>
                <th>Posted At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.blogs.edit', [$blog->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.blogs.destroy', [$blog->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection