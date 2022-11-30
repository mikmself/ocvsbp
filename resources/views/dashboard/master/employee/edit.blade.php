@extends('dashboard.layout.master')
@section('title','Edit Employee Data')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Edit Employee Data</h6>
                <a href="{{route('indexemployee')}}" class="btn btn-success">Back</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{route('updateemployee',$employee->id)}}" class="p-3 pt-0" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name', $employee->name)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="session" class="form-label">Session :</label>
                        <select class="form-select" name="session_id">
                            @foreach ($sessions as $session)
                                <option value="{{$session->id}}" {{$session['id'] == $employee->session_id || old('session_id') ? 'selected' : ''}}>{{$session->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="nip" class="form-label">NIP :</label>
                        <input type="text" class="form-control" id="nip" placeholder="Enter NIP" name="nip" value="{{old('nip', $employee->nip)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="division" class="form-label">Division :</label>
                        <input type="text" class="form-control" id="division" placeholder="Enter Division" name="division" value="{{old('division', $employee->division)}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

