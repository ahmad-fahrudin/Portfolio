@extends('admin.admin_master')

@section('title', 'Portfolio Edit')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Portfolio Edit</h4> <br><br>

                        <form action="{{ route('update.portfolio') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $portfolio->id }}">
                            <div class="row mb-3">
                                <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="portfolio_name" name="portfolio_name"
                                        value="{{ $portfolio->portfolio_name }}">
                                    @error('portfolio_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="portfolio_title" name="portfolio_title"
                                        value="{{ $portfolio->portfolio_title }}">
                                    @error('portfolio_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio Description
                                    :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" id="elm1" name="portfolio_description">{{ $portfolio->portfolio_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="portfolio_image">
                                </div>
                            </div>
                            <div class="row
                                        mb-3">
                                <label for="file" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ asset($portfolio->portfolio_image) }}"
                                        alt="Card image cap" id="showImage">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light"
                                    value="Update Portfolio Data">
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
