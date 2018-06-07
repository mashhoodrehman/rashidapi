@extends('admin.layouts.admin')

@section('title', 'Upcoming Appointments')

@section('content')
    <div class="col-sm-12">
        <a class="btn btn-primary" href="{{ route('admin.appointments.create') }}">Add</a>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>User ID</th>
                <th>Scheduled On</th>
                <th>Service Id</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td><a target="_blank" href="{{ route('admin.users.show', [$appointment->user_id]) }}">{{ $appointment->user->name }}</a></td>
                    <td>{{ $appointment->scheduled_on }}</td>
                    <td>{{ $appointment->service->title }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>{{ $appointment->created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.appointments.edit', [$appointment->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.appointments.destroy', [$appointment->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $appointments->links() }}
        </div>
    </div>
@endsection