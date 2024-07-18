@extends('admin.admin_master')

@section('title', 'Home Slide Page')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Home Slide Page</h4> <br><br>
                        <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $homeslide->id }}">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title"
                                        value="{{ $homeslide->title }}" name="title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="short_title"
                                        value="{{ $homeslide->short_title }}" name="short_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video URL :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="video_url"
                                        value="{{ $homeslide->video_url }}" name="video_url">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_slide" class="col-sm-2 col-form-label">Slider Image :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image"
                                        value="{{ $homeslide->home_slide }}" name="home_slide">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg"
                                        src="{{ !empty($homeslide->home_slide) ? url($homeslide->home_slide) : url('upload/no_image.jpg') }}"
                                        alt="Card image cap" id="showImage">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Slide">
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
