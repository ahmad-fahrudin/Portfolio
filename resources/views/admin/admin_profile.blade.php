@extends('admin.admin_master')

@section('title')
    {{-- ngeload variable --}}
    @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
    @endphp
    {{ $adminData->name }} | Profile
@endsection

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <img class="rounded-circle avatar-xl"
                                src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                                alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">User Email : {{ $adminData->email }}</h4>
                            <hr>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="text-muted">{{ $adminData->updated_at }}</small>
                            </p>
                            <div class="d-grid mb-3">
                                <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit
                                    Profile</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
