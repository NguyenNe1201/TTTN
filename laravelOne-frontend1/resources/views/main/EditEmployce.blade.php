@extends('layout.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper" style="    padding-top: 10px;">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @include('admin.alert')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('postedit_employce') }}" role="form"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('name') ?? $editEmployce->name }}"
                                                    name="name" placeholder="Enter Fullname" required
                                                    class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class=" invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Email Address</label>
                                            <div class="col-lg-9">
                                                <input type="email" value="{{ old('email') ?? $editEmployce->email }}"
                                                    name="email"required class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter email">
                                                @error('email')
                                                    <span class="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">User Name</label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    value="{{ old('username') ?? $editEmployce->username }}" name="username"
                                                    class="form-control" placeholder="Enter Username"required>
                                                @error('username')
                                                    <span class="" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Role</label>
                                                    <div class="col-lg-9">
                                                        <select name="role" id="exampleInputRole" class="select form-control">
        
                                                            <option value="0">Admin</option>
                                                            <option value="1">Employee</option>
                                                        </select>
                                                    </div>
                                        </div>
                                
                                        {{-- <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">New Password</label>
                                            <div class="col-lg-9">
                                                <input value="{{ old('password') }}" id="exampleInputPassword"
                                                    type="password" class="form-control" name="password"
                                                    placeholder="Enter Password">

                                            </div>
                                        </div> --}}
                                        {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-lg-9">
                                            <input value="{{ old('password_confirm') }}" id="exampleInputPassword"
                                                type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password_confirmation" autocomplete="current-password" placeholder="Enter Password Confirm">
                                        </div>
                                    </div> --}}
                                    </div>
                                    <div class="col-xl-6" style="height: 350px;">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Address</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('address') ?? $editEmployce->address }}"
                                                    name="address" required class="form-control"
                                                    placeholder="Enter Address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Phone Number</label>
                                            <div class="col-lg-9">
                                                <input input type="text"
                                                    value=" {{ old('phone') ?? $editEmployce->phone }}" inputmode="numeric"
                                                    required name="phone" placeholder="Number Phone" class="form-control">
                                                @error('phone')
                                                    <span class=" invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Avatar</label>
                                            <div class="col-lg-9">
                                                <input type="file" id="UploadAvatar" class="form-control" name="avatar">
                                                <div id="image_show" style="margin-top: 10px;">
                                                </div>
                                                <input type="hidden" name="file" id="file">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="text-right" style="display: flex; float: right;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a style="width: 80px; margin-left: 10px" href="/admin/listemployce"
                                        class="btn btn-block btn-warning">Cancel</a>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
