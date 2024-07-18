@extends('admin.admin_master')

@section('title', 'Blog Category Page')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Blog Category Add</h4> <br><br>

                        <form action="{{ route('store.blog.category') }}" method="POST" enctype="multipart/form-data"
                            id="myForm">
                            @csrf
                            <div class="row mb-3">
                                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name :</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text" id="blog_category" name="blog_category">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light"
                                    value="Insert Blog Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script class="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    blog_category: {
                        required: true,
                    },
                },
                messages: {
                    blog_category: {
                        required: 'Please Enter Blog Category',
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
