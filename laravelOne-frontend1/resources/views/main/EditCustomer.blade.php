@extends('layout.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper" style="    padding-top: 20px;">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Customer</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Customer</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @if ($errors->any())
                <div class="alert alert-danger">Dữ liệu nhập vào không hơp lệ. Vui lòng nhập lại </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form style="display: flex;" action="{{ route('postedit1Customer') }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                <div style="width: 50%; margin-left:25px ">
                                    <div class="card-body">
                                        {{-- <div class="form-group">
                                            <label for="exampleInputEmail1">Employce Name</label>
                                            <input type="hidden" value="{{$user->id}}" name="employceid">
                                            <input type="text" value="{{$user->name}}" class="form-control" readonly>
                                           
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Customer Name</label>
                                            <input name="customername"
                                                value="{{ old('customername') ?? $editCustomer->customername }}"
                                                type="text" name="name" class="form-control" placeholder="Full Name"
                                                required>
                                            @error('customername')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" value="{{ old('email') }}" name="email" required
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select name="status" id="exampleInputRole" class="select form-control">
                                                <option value="0">Active</option>
                                                <option value="1">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer"
                                        style="background: none; display: flex; border-top:none; margin-bottom: 20px;">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a style="width: 80px; margin-left: 10px" href="{{ route('ListCustomer') }}"
                                            class="btn btn-block btn-warning">Cancel</a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div style="width: 50%; padding: 1rem 1rem; margin-right: 25px;">
                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input name="phone" value=" {{ old('phone') ?? $editCustomer->phone }}"
                                            type="text" class="form-control" placeholder="Number Phone"
                                            inputmode="numeric" required>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input value="{{ old('address') ?? $editCustomer->address }}" type="text"
                                            name="address" class="form-control" placeholder="Enter Address" required>
                                    </div>
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
