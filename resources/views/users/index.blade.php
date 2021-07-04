@extends('layouts.master')

@section('title', 'Users List')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row mb-4 align-items-center">
                <div class="col-12 col-lg-9 text-center text-lg-left">
                    <h5 class="fw-100">Total {{ $users->total() }} users found</h5>
                </div>
                <div class="col-12 col-lg-3 text-center text-lg-right">
                    <a href="{{ route('users.add') }}" class="btn btn-primary">Add New User</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if(!$users->count())
                        <div class="alert alert-info">
                            No user found
                        </div>
                    @else
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="text-nowrap">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->display_name }}</td>
                                    <td class="text-center">
                                        @if(auth()->id() == $user->id)
                                            <div class="badge badge-primary">That's you</div>
                                        @else
                                            <div class="btn-group">
                                                <a class="btn btn-xs" href="{{ route('users.edit', ['id' => $user->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                                                <a class="btn btn-xs" href="{{ route('users.delete', ['id' => $user->id]) }}" onclick="return confirmDelete();"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection