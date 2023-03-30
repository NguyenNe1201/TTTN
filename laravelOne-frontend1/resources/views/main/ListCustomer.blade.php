@section('headListCus')
    {{-- alert sweet --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
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
                        <h3 class="page-title">List Customer</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Customer</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">

                        <a style="min-width: 0px; margin-left: 8px;" href="{{ route('ListCustomer') }}" id="deleteCheckbox"
                            class="btn add-btn">
                            <i class="fa fa-trash-o "></i>Delete
                        </a>
                        <a style="min-width: 0px; margin-left: 8px;" type="button" id="edit_mail_customer"
                            class="btn add-btn">
                            <i class="fa fa-pencil"></i>
                            Edit
                        </a>
                        <a style="min-width: 0px;" id="add_mail_customer" type="button" class="btn add-btn"><i
                                class="fa fa-plus"></i> Add</a>
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
                        <table id="table_search_customer" data-page-length='5'
                            class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkbox_customer"></th>
                                    <th>Name </th>
                                    <th>Phone</th>
                                    <th class="text-center">status</th>
                                    <th>Email</th>
                                    <th class="text-center">Funtion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($customer))
                                    @foreach ($customer as $key => $item1)
                                        <tr>
                                            <td> <input type="checkbox" name="id" class="checkbox1"
                                                    value="{{ $item1->id }}">
                                            </td>
                                            <td>{{ $item1->customername }}</span></td>
                                            <td>{{ $item1->phone }}</td>
                                            <td class="text-center">
                                                @if ($item1->status == 0)
                                                    <span class="badge bg-inverse-success">Active</span>
                                                @else
                                                    <span class="badge bg-inverse-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($customergmail))
                                                    @foreach ($customergmail as $key1 => $item2)
                                                        @if ($item2->customerid == $item1->id)
                                                            <div style="display:flex;">
                                                                <span> {{ $item2->email }}</span>
                                                                <div class="dropdown dropdown-action"
                                                                    style="margin: -3px 0px">
                                                                    <a href="#" class="action-icon dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        {{-- <a class="dropdown-item" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#edit_expense"><i
                                                                                class="fa fa-pencil m-r-5"></i>
                                                                            Edit</a> --}}
                                                                        <div class="dropdown-item">
                                                                            <a style="font-weight:400; color: #212529;"
                                                                                data-toggle="modal"
                                                                                data-target="#delete_1email">
                                                                                <i style="color: #f43b48;"
                                                                                    class="fa fa-trash-o m-r-5"></i>
                                                                                Delete</a>

                                                                        </div>

                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal custom-modal fade" id="delete_1email"
                                                                        role="dialog">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <div class="form-header">
                                                                                        <h3>Delete Email Customer
                                                                                        </h3>
                                                                                        <p>Are you sure want to delete?</p>
                                                                                    </div>
                                                                                    <div class="modal-btn delete-action">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <a href="{{ route('delete1email', ['id' => $item2->id]) }}"
                                                                                                    class="btn btn-primary continue-btn">Delete</a>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <a href="javascript:void(0);"
                                                                                                    data-dismiss="modal"
                                                                                                    class="btn btn-primary cancel-btn">Cancel</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <br>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('edit_1customer', ['id' => $item1->id]) }}"
                                                    class="table-link">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                {{-- <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    href="{{ route('deleteCustomer1', ['id' => $item1->id]) }}"
                                                    class="table-link danger">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a> --}}
                                                <a data-toggle="modal" data-target="#delete_customer"
                                                    class="table-link danger">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                <div class="modal custom-modal fade" id="delete_customer" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-header">
                                                                    <h3>Delete Customer</h3>
                                                                    <p>Are you sure want to delete?</p>
                                                                </div>
                                                                <div class="modal-btn delete-action">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a href="{{ route('deleteCustomer1', ['id' => $item1->id]) }}"
                                                                                class="btn btn-primary continue-btn">Delete</a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="javascript:void(0);"
                                                                                data-dismiss="modal"
                                                                                class="btn btn-primary cancel-btn">Cancel</a>
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
        <!-- Add 1 checkbox Modal -->
        <div class="modal custom-modal fade" id="add_customergmail1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Email Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('Customer_postemail') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Customer Name<span class="text-danger">*</span></label>
                                <select name="customerid" class="form-control" id="customergmailadd">
                                    <option value="null">Select customer</option>
                                    <option value="null">No customer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Add Email <span class="text-danger">*</span></label>
                                <input class="form-control" name="email" type="email" placeholder="Enter Email"
                                    required>

                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Add 1 checkbox -->
    <!-- Add customer gmail 0 check box -->
    <div class="modal custom-modal fade" id="add_customergmail2" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Email Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('Customer_postemail') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Customer Name<span class="text-danger">*</span></label>
                            <select name="customerid" class="form-control" id="InputRole">
                                @if(!empty($customer))
                                    @foreach ($customer as $key => $item3)
                                        <option value="{{ $item3->id }}">{{ $item3->customername }}</option>
                                    @endforeach
                                @else
                                    <option value="null">No Customer</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Add Email <span class="text-danger">*</span></label>
                            <div><input class="form-control" name="email" type="email" placeholder="Enter Email"
                                    required>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit mail customer -->
    <div class="modal custom-modal fade" id="edit_customergmail" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Email </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('EditCustomer_postemail') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" name="customername" id="customer_name"
                                placeholder="Customer Name" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email Need Edit <span class="text-danger">*</span></label>
                            <div><select name="customermail" class="form-control" id="listmail">
                                    <option value="null">No Email</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>New Email <span class="text-danger">*</span></label>
                            <input class="form-control" id="mail_update" name="upldate_email" type="email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /edit Modal -->

    </div>
    <!-- /Page Wrapper -->
@endsection
