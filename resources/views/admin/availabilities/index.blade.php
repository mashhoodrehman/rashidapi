@extends('admin.layouts.admin')

@section('title', 'Availability')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{ route('admin.availabilities.create') }}">Add</a>
        </div>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($availabilities as $availability)
                <tr>
                    <td>{{ $availability->day }}</td>
                    <td>{{ $availability->start }}</td>
                    <td>{{ $availability->end }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.availabilities.edit', [$availability->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.availabilities.destroy', [$availability->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection