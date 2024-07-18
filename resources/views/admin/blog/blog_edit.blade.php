@extends('admin.admin_master')

@section('title', 'Edit Blog Page')

@section('admin')
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Edit Blog Page</h4> <br><br>

                        <form action="{{ route('update.blog') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blogs->id }}">
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog Category :</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="blogcat_id">
                                        <option selected>Open this select Category</option>
                                        @foreach ($categories as $id => $blog_category)
                                            <option value="{{ $id }}"
                                                {{ $id == $blogs->blogcat_id ? 'selected' : '' }}>
                                                {{ $blog_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog Title :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="" name="blog_title"
                                        value="{{ $blogs->blog_title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog tags :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="blog_tags"
                                        value="{{ $blogs->blog_tags }}" data-role="tagsinput">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog Description
                                    :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" id="elm1" name="blog_description">{{ $blogs->blog_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Blog_image" class="col-sm-2 col-form-label">Blog Image :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="blog_image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ asset($blogs->blog_image) }}"
                                        alt="Card image cap" id="showImage">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light"
                                    value="Update Blog Data">
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
