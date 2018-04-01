@extends('admin.layouts.admin')

@section('title', __('views.admin.users.show.title', ['name' => $user->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>
                    <a href="mailto:{{ $user->email }}">
                        {{ $user->email }}
                    </a>
                </td>
            </tr>

            <tr>
                <th>Mobile</th>
                <td>{{ $user->mobile }}</td>
            </tr>

            <tr>
                <th>Roles</th>
                <td>
                    {{ $user->roles->pluck('name')->implode(',') }}
                </td>
            </tr>
            <tr>
                <th>Active?</th>
                <td>
                    @if($user->active)
                        <span class="label label-primary">Active</span>
                    @else
                        <span class="label label-danger">Inactive</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>Last updated</th>
                <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection