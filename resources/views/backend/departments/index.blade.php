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

<!-- END: Vendor CSS-->
@endsection



@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@elseif ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif


<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">departments</h4>
                    <a href="{{route('departments.create')}}"> <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i
                               class="feather icon-user"></i> Add New
                            department</button></a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table zero-configuration dataTable"
                                               id="DataTables_Table_0"
                                               role="grid"
                                               aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 271px;">Name</th>

                                                    <th class="sorting"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 138px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($departments as $department)
                                                <tr role="row"
                                                    class="odd">

                                                    <td class="sorting_1">{{ $department->name }}</td>

                                                    <td>
                                                        <a href="{{   route('departments.edit',$department->id) }}"
                                                            class="btn btn-xs btn-info"> <i
                                                               class="feather icon-edit font-medium-5"></i> </a>
                                                        <a id="progress-bar" href="javascript:;"
                                                           data-toggle="modal"
                                                           onclick="deleteData({{$department->id}})"
                                                           data-target="#DeleteModal"
                                                           class="btn btn-xs btn-danger"> <i
                                                               class="feather icon-trash font-medium-5"></i></a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                        <!-- Delete Model -->
                                        <div id="DeleteModal"
                                             class="modal fade text-left"
                                             tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel120"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                 role="document">
                                                <div class="modal-content">
                                                    <form action=""
                                                          id="deleteForm"
                                                          method="post">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger white">
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <p class="text-center">Are You Sure Want To Delete ?</p>
                                                            </div>

                                                            <div class="modal-footer">

                                                                <button type="button"
                                                                        class="btn btn-success"
                                                                        data-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                        name=""
                                                                        class="btn btn-danger"
                                                                        data-dismiss="modal"
                                                                        onclick="formSubmit()">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            function deleteData(id)
                                                    {
                                                        var id = id;
                                                        var url = '{{ route("departments.destroy", ":id") }}';
                                                        url = url.replace(':id', id);
                                                        $("#deleteForm").attr('action', url);
                                                    }

                                                    function formSubmit()
                                                    {
                                                        $("#deleteForm").submit();
                                                    }
                                        </script>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->


<script src="{{asset('backend/app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

<!-- END: Page Vendor JS-->
@endsection
