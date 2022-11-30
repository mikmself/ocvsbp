@extends('dashboard.layout.master')
@section('title','Edit Candidate Data')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Edit Candidate Data</h6>
                <a href="{{route('indexcandidate')}}" class="btn btn-success">Back</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{route('updatecandidate',$candidate->id)}}" class="p-3 pt-0" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name', $candidate->name)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="vision" class="form-label">Vision :</label>
                        <input type="text" class="form-control" id="vision" placeholder="Enter Vision" name="vision" value="{{old('vision', $candidate->vision)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="mission" class="form-label">Mission :</label>
                        <input type="text" class="form-control" id="mission" placeholder="Enter Mission" name="mission" value="{{old('mission', $candidate->mission)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="motto" class="form-label">Motto :</label>
                        <input type="text" class="form-control" id="motto" placeholder="Enter Motto" name="motto" value="{{old('motto', $candidate->motto)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="photo" class="form-label">Photo :</label>
                        <input type="text" class="form-control" id="photo" placeholder="Enter Photo" name="photo" value="{{old('photo', $candidate->photo)}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

