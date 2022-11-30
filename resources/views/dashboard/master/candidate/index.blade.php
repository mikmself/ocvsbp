@extends('dashboard.layout.master')
@section('title', 'Candidates Data')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Candidates Data</h6>
                    <a href="{{route('createcandidate')}}" class="btn btn-success">Create</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Photo</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Vision</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Mission</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Motto</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                    <tr>
                                        <td class="text-left">
                                            <img src="{{$candidate->photo}}" class="avatar avatar-xl m-3" alt="user1">
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0 p-3">{{$candidate->name}}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0 p-3">{!! $candidate->vision !!}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0 p-3">{!! $candidate->mission !!}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0 p-3">{{$candidate->motto}}</p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{route('editcandidate',$candidate->id)}}" class="btn btn-warning" >
                                                Edit
                                            </a>
                                            <a href="{{route('destroycandidate',$candidate->id)}}" class="btn btn-danger" >
                                                Delete
                                            </a>
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
