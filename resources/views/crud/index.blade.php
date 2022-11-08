@extends('layouts.user_layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-12 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <h4 class="card-title text-center">All Users</h4>
                <a class="btn btn-success" href="{{ route('crud.create') }}">Registration</a>
                <hr>
                @include('flash_data')
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Contact</td>
                        <td>Gender</td>
                        <td>Hobbies</td>
                        <td>Address</td>
                        <td>Country</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->hobbies }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->getCountry->name }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('crud.show',$user) }}">Show</a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('crud.edit',$user) }}">Update</a>
                                    <form action="{{ route('crud.destroy',$user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="10">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
