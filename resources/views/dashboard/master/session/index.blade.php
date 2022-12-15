@extends('dashboard.layout.master')
@section('title', 'Sessions Data')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Sessions Data</h6>
                    @if (auth()->user()->level == "superadmin")
                    <a href="{{route('createsession')}}" class="btn btn-success">Create</a>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Toggle</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sessions as $session)
                                    <tr>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0 p-3">{{$session->name}}</p>
                                        </td>
                                        <td class="text-left">
                                            @if ($session->status == "off")
                                                <span class="badge badge-sm bg-gradient-danger m-3">{{$session->status}}</span>
                                            @elseif ($session->status == "on")
                                                <span class="badge badge-sm bg-gradient-success m-3">{{$session->status}}</span>
                                            @endif
                                        </td>
                                        <td class="text-left">
                                            @if ($session->status == "off")
                                                <a href="{{route('turnonsession',$session->id)}}" class="btn btn-success m-3">Turn On</a>
                                            @elseif ($session->status == "on")
                                                <a href="{{route('turnoffsession',$session->id)}}" class="btn btn-danger m-3">Turn Off</a>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if (auth()->user()->level == "superadmin")
                                            <a href="{{route('editsession',$session->id)}}" class="btn btn-warning" >
                                                Edit
                                            </a>
                                            <a href="{{route('destroysession',$session->id)}}" class="btn btn-danger" >
                                                Delete
                                            </a>
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
