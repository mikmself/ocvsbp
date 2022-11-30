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
                <form action="{{route('updatecandidate',$candidate->id)}}" class="p-3 pt-0" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name', $candidate->name)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="vision" class="form-label">Vision :</label>
                        <textarea class="form-control" id="vision" rows="3" name="vision" placeholder="Enter Vision">{{old('vision', $candidate->vision)}}</textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="mission" class="form-label">Mission :</label>
                        <textarea class="form-control" id="mission" rows="3" name="mission" placeholder="Enter Mission">{{old('mission', $candidate->mission)}}</textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="motto" class="form-label">Motto :</label>
                        <input type="text" class="form-control" id="motto" placeholder="Enter Motto" name="motto" value="{{old('motto', $candidate->motto)}}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="photo" class="form-label">Photo :</label>
                        <br />
                        <img src="{{$candidate->photo}}" class="avatar avatar-xxl" id="previewPhoto">
                        <input class="form-control mt-3" type="file" id="photo" name="photo" onchange="showPreview(event)">
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

