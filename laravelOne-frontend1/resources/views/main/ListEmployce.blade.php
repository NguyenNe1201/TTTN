@extends('layout.app')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper" style="    padding-top: 20px;">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">                   
                        <div class="col">
                            <h3 class="page-title">List Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">List Employee</li>
                            </ul></div>
                        <div class="col-auto float-right ml-auto">

                       
                            <a style="min-width: 0px;"  href="{{ route('addEmployce') }}" type="button"
                                class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                        </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('admin.alert')
            @if (session('msg'))
                <div class="alert alert-success">{{ session('msg') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="table_search" data-page-length='5'
                            class="table table-striped table-nowrap custom-table mbable">
                            <thead>
                                <tr>
                                    <th >STT</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th class="text-center">Status</th>
                                    <th>Address</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Funtion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($users))
                                    @foreach ($users as $key => $item)
                                        <tr>
                                            <td >{{ $key + 1 }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar"><img src="{{ $item->avatar }}"></a>
                                                    <a href="#">{{ $item->name }}</a>
                                                </h2>
                                            </td>

                                            <td>{{ $item->phone }}</td>
                                            <td class="text-center">
                                                @if ($item->status == 0)
                                                    <span class="badge bg-inverse-success">Active</span>
                                                @else
                                                    <span class="badge bg-inverse-success">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->address }}
                                            </td>
                                            <td class="text-center">
                                                @if ($item->role == 0)
                                                    <span class="badge bg-inverse-danger">Admin</span>
                                                @else
                                                    <span class="badge badge-info">Employce</span>
                                                @endif
                                            </td>
                                            <td class="text-center"> 
                                                <a href="{{ route('edit_employce', ['id' => $item->id]) }}"
                                                    class="table-link">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                {{-- <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    href="{{ route('delete_employce', ['id' => $item->id]) }}"
                                                    class="table-link danger">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a> --}}
                                                <a data-toggle="modal" data-target="#delete_employee"
                                                    
                                                    class="table-link danger">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-header">
                                                                    <h3>Delete Employee</h3>
                                                                    <p>Are you sure want to delete?</p>
                                                                </div>
                                                                <div class="modal-btn delete-action">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a href="{{ route('delete_employce', ['id' => $item->id]) }}" class="btn btn-primary continue-btn">Delete</a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">Không có người dùng</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->
@endsection
