@extends('dashboard.layout.master')
@section('title','Create User Data')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Create User Data</h6>
                <a href="{{route('indexuser')}}" class="btn btn-success">Back</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{route('storeuser')}}" class="p-3 pt-0" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name', '')}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{old('email', '')}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="level" class="form-label">Level :</label>
                        <select class="form-select" name="level" id="level">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" value="{{old('password', '')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

