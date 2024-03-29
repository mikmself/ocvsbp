@extends('dashboard.layout.master')
@section('title', 'Users Data')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 p-1">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Users Data</h6>
                    <div>
                        <a href="{{route('notEncryptedIndex')}}" class="btn btn-dribbble">User Not Encrypted</a>
                        @if (auth()->user()->level == "superadmin")
                        <a href="{{route('createuser')}}" class="btn btn-success">Create</a>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="users-table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Level</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Is Voted</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0 p-3">{{$user->name}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0 p-3">{{$user->email}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0 p-3">{{$user->level}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0 p-3">{{$user->is_voted}}</p>
                                    </td>
                                    <td class="align-middle">
                                        @if (strlen($user->password) == 10)
                                            <a href="{{route('generatePassword',$user->id)}}" class="btn btn-secondary">Generate Password</a>
                                        @else
                                        @if (auth()->user()->level == "superadmin")
                                        <a href="{{route('edituser',$user->id)}}" class="btn btn-warning" >
                                            Edit
                                        </a>
                                        <a href="{{route('destroyuser',$user->id)}}" class="btn btn-danger" >
                                            Delete
                                        </a>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

