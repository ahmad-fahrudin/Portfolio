@extends('admin.admin_master')

@section('title', 'About Page')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">About Page</h4> <br><br>
                        <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $aboutpage->id }}">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title"
                                        value="{{ $aboutpage->title }}" name="title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="short_title"
                                        value="{{ $aboutpage->short_title }}" name="short_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short Description :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" id="short_description" name="short_description">{{ $aboutpage->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="long_description" class="col-sm-2 col-form-label">Long Description :</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description">{{ $aboutpage->long_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about_image" class="col-sm-2 col-form-label">About Image :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image"
                                        value="{{ $aboutpage->about_image }}" name="about_image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg"
                                        src="{{ !empty($aboutpage->about_image) ? url($aboutpage->about_image) : url('upload/no_image.jpg') }}"
                                        alt="Card image cap" id="showImage">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update About">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
