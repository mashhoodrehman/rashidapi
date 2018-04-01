@extends('admin.layouts.admin')

@section('title', 'Support')

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Posted At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($supports as $support)
                <tr>
                    <td>{{ $support->name }}</td>
                    <td>{{ $support->email }}</td>
                    <td>{{ $support->message }}</td>
                    <td>{{ $support->created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.supports.destroy', [$support->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $supports->links() }}
        </div>
    </div>
@endsection