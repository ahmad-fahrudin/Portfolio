@extends('admin.admin_master')

@section('title', 'Footer Page')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Footer Page</h4> <br><br>
                        <form action="{{ route('update.footer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $allfooter->id }}">
                            <div class="row mb-3">
                                <label for="number" class="col-sm-2 col-form-label">number :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="number"
                                        value="{{ $allfooter->number }}" name="number">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short Description :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" id="short_description" name="short_description">{{ $allfooter->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="adress" class="col-sm-2 col-form-label">Adress :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="adress"
                                        value="{{ $allfooter->adress }}" name="adress">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="email"
                                        value="{{ $allfooter->email }}" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="facebook"
                                        value="{{ $allfooter->facebook }}" name="facebook">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="twitter"
                                        value="{{ $allfooter->twitter }}" name="twitter">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="instagram" class="col-sm-2 col-form-label">Instagram :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="instagram"
                                        value="{{ $allfooter->instagram }}" name="instagram">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="copyright" class="col-sm-2 col-form-label">Copy Right :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="copyright"
                                        value="{{ $allfooter->copyright }}" name="copyright">
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-primary waves-effect waves-light"
                                    value="UPDATE Footer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
