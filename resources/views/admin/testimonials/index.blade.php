@extends('admin.layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{ route('admin.testimonials.create') }}">Add</a>
        </div>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Testimonial</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->testimonial }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.testimonials.edit', [$testimonial->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.testimonials.destroy', [$testimonial->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $testimonials->links() }}
        </div>
    </div>
@endsection