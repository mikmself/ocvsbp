@extends('dashboard.layout.master')
@section('title','Edit User Data')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Edit User Data</h6>
                <a href="{{route('indexuser')}}" class="btn btn-success">Back</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{route('updateuser',$user->id)}}" class="p-3 pt-0" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name', $user->name)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{old('email', $user->email)}}">
                    </div>
                    <select class="form-select" name="level" id="level">
                        <option value="user" {{$user->level == "user" ? "selected" : ""}}>User</option>
                        <option value="admin" {{$user->level == "admin" ? "selected" : ""}}>Admin</option>
                    </select>
                    <div class="mb-3 mt-3">
                        <label for="newpassword" class="form-label">New Password :</label>
                        <input type="text" class="form-control" id="newpassword" placeholder="Enter New Password" name="newpassword" value="{{old('newpassword', '')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    let vision = document.getElementById("vision");
        CKEDITOR.replace(vision,{
        language:'en-gb'
    });
    let mission = document.getElementById("mission");
        CKEDITOR.replace(mission,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

    let previewPhoto = document.getElementById("previewPhoto");
    function showPreview(event){
        if(event.target.files.length > 0){
            let src = URL.createObjectURL(event.target.files[0]);
            previewPhoto.src = src;
        }
    }
</script>
@endsection

