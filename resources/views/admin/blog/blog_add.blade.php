@extends('admin.admin_master')

@section('title', 'Add Blog Page')

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
                        <h4 class="card-title text-center">Add Blog Page</h4> <br><br>

                        <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog Category :</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="blogcat_id" id="blogcat_id">
                                        <option selected>Open this select Category</option>
                                        @foreach ($categories as $id => $blog_category)
                                            <option value="{{ $id }}">{{ $blog_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog Title :</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text" id="" name="blog_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog tags :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="blog_tags" value="input the tags"
                                        data-role="tagsinput">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Blog Description
                                    :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" id="elm1" name="blog_description"></textarea>
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
                                    <img class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}"
                                        alt="Card image cap" id="showImage">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light"
                                    value="Insert Blog Data">
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

    <script class="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    blog_title: {
                        required: true,
                    },
                },
                messages: {
                    blog_title: {
                        required: 'Please Enter BLOG title',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
