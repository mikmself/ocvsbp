@extends('dashboard.layout.master')
@section('title','Edit Student Data')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Edit Student Data</h6>
                <a href="{{route('indexstudent')}}" class="btn btn-success">Back</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{route('updatestudent',$student->id)}}" class="p-3 pt-0" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name', $student->name)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{old('email', $student->user->email)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="session" class="form-label">Session :</label>
                        <select class="form-select" name="session_id">
                            @foreach ($sessions as $session)
                                <option value="{{$session->id}}" {{$session['id'] == $student->session_id || old('session_id') ? 'selected' : ''}}>{{$session->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="nis" class="form-label">NIS :</label>
                        <input type="text" class="form-control" id="nis" placeholder="Enter NIS" name="nis" value="{{old('nis', $student->nis)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="nisn" class="form-label">NISN :</label>
                        <input type="text" class="form-control" id="nisn" placeholder="Enter NISN" name="nisn" value="{{old('nisn', $student->nisn)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="newpassword" class="form-label">New Password :</label>
                        <input type="text" class="form-control" id="newpassword" placeholder="Enter New Password" name="newpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

