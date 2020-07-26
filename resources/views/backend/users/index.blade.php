@extends('backend.layouts.app')


@langrtl
@section('css')
    <!-- BEGIN: Page CSS-->

    <!-- END: Page CSS-->
@endsection
@else
@section('css')
<!-- BEGIN: Page CSS-->

    <!-- END: Page CSS-->
@endsection
@endlangrtl
@section('css')
<!-- BEGIN: Vendor CSS-->
     <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Vendor CSS-->
@endsection


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- users list start -->
    <section class="users-list-wrapper ">
        <!-- users filter start -->
        <div class="card pd-0">
            <div class="card-header pd-0">
                <h4 class="card-title">Filters</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                        <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show pd-0">
                <div class="card-body">
                    <div class="users-list-filter">
                        <form>
                            <div class="row pd-0 ">
                                <div class="col-12 col-sm-6 col-lg-3 pd-0">
                                    <label for="users-list-role">Role</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-role">
                                            <option value="">All</option>
                                            <option value="user">User</option>
                                            <option value="staff">Staff</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 pd-0">
                                    <label for="users-list-status">Status</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-status">
                                            <option value="">All</option>
                                            <option value="Active">Active</option>
                                            <option value="Blocked">Blocked</option>
                                            <option value="deactivated">Deactivated</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 pd-0">
                                    <label for="users-list-verified">Verified</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-verified">
                                            <option value="">All</option>
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 pd-0">
                                    <label for="users-list-department">Department</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-department">
                                            <option value="">All</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Devlopment">Devlopment</option>
                                            <option value="Management">Management</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                                    aria-haspopup="true" aria-expanded="false">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- users filter end -->


     <!-- Column selectors with Export Options and print table -->
        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Students List</h4>
                        <a href="{{route('users.create')}}"> <button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i
                                    class="feather icon-user"></i> Add New Student</button></a>
                        </div>

                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td>2011/01/25</td>
                                                <td>$112,000</td>
                                            </tr>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Column selectors with Export Options and print table -->

    </section>
    <!-- users list ends -->
@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->

    <script src="{{asset('backend/app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

<!-- END: Page Vendor JS-->
@endsection
