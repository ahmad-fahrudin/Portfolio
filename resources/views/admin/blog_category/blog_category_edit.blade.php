@extends('admin.admin_master')

@section('title', 'Blog Category Page')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Blog Category Edit</h4> <br><br>

                        <form action="{{ route('update.blog.category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blogcategory->id }}">
                            <div class="row mb-3">
                                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="blog_category" name="blog_category"
                                        value="{{ $blogcategory->blog_category }}">
                                    @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
@endsection
