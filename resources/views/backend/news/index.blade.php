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
                    <h4 class="card-title">news</h4>
                    <a href="{{route('news.create')}}"> <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i
                               class="feather icon-user"></i> Add New
                            news</button></a>
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
                                                        aria-label="logo: activate to sort column descending"
                                                        style="width: 50px;">logo</th>
                                                    <th class="sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 50px;">Name</th>
                                                    <th class="sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="branch_id: activate to sort column descending"
                                                        style="width: 50px;">branch </th>
                                                    <th class="sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="city: activate to sort column descending"
                                                        style="width: 50px;">city</th>
                                                    <th class="sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="show_in_home: activate to sort column descending"
                                                        style="width: 50px;">show_in_home</th>
                                                    <th class="sorting"
                                                        tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 50px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($news as $new)
                                                <tr role="row"
                                                    class="odd">

                                                    <td> <img style="height: 50px;width: 50px;"
                                                             class="img-circle"
                                                             src="{{ asset('uploads/news/logo/')}}/{{$new->logo }}">
                                                    </td>

                                                    <td class="sorting_1">{{ $new->name }}</td>


                                                    <td class="sorting_1">{{ $new->branch->name }}</td>

                                                    <td class="sorting_1">{{ $new->city->name }}</td>


                                                    <td class="sorting_1"> @if ( $new->show_in_home == 1)
                                                        yes
                                                        @else
                                                        no
                                                        @endif

                                                    </td>

                                                    <td class="sorting_1">
                                                        <a href="{{   route('news.edit',$new->id) }}"
                                                           class="btn btn-xs btn-success font-small"> <i
                                                               class="feather icon-eye font-medium-5"></i> </a>

                                                        <a href="{{   route('news.edit',$new->id) }}"
                                                           class="btn btn-xs btn-info font-small"> <i
                                                               class="feather icon-edit font-medium-5"></i> </a>
                                                        <a id="progress-bar"
                                                           href="javascript:;"
                                                           data-toggle="modal"
                                                           onclick="deleteData({{$new->id}})"
                                                           data-target="#DeleteModal"
                                                           class="btn btn-xs btn-danger font-small"> <i
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
                                                        var url = '{{ route("news.destroy", ":id") }}';
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