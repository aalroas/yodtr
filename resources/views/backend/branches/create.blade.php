@extends('backend.layouts.app')


@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet"
      href="{{asset('common/dropify/css/dropify.min.css') }}">
<!-- END: Vendor CSS-->

<link rel="stylesheet"
          type="text/css"
          href="{{asset('backend/app-assets/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet"
      type="text/css"
      href="{{asset('backend/app-assets/css/plugins/forms/validation/form-validation.css')}}">@endsection

@section('content') @include('backend.includes.errors')
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('backend.new_branch') }}</h4>

                </div>
                <div class="card-content">
                    <div class="card-body">

                        <form role="form"
                              action="{{ route('branches.store') }}"
                              method="post"

                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                     <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label class="text-bold-600 font-medium-2 mb-1"
                                                    for="account-e-mail">branche logo</label>
                                                <div class="input-group">

                                                    <input type="file"
                                                        class="dropify"
                                                        data-default-file=""
                                                        data-allowed-file-extensions="png jpg jpeg"
                                                        name="logo"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="card">

                                <div class="card-content">
                                    <div class="card-header">

                                        <div class="text-bold-600 font-medium-2 mb-1">

                                        </div>

                                    </div>
                                    <div class="card-body">



                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label   class="text-bold-600 font-medium-2 mb-1" for="account-e-mail"> branch sub-domain</label>
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="branche sub-domain"
                                                    aria-describedby="basic-addon2"
                                                    name="branch_subdomain"
                                                    required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2">.yodtr.org</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="branch-city">Branch  City</label>
                                                <div class="form-group">
                                                   <select class="select2 form-control select2-hidden-accessible"
                                                            name="city_id"
                                                            required

                                                            tabindex="-1"
                                                            aria-hidden="true">
                                                        @foreach ($cities as $city)
                                                        <option value="{{$city->id}}"
                                                               >{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                            </div>
                                            </div>
                                        </div>



                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="divider">
                                <div class="divider-text">My Text</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body">

                                                <ul class="nav nav-tabs nav-justified"
                                                    id="myTabactivity"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active"
                                                           id="home-tab-justified"
                                                           data-toggle="tab"
                                                           href="#home-activity"
                                                           role="tab"
                                                           aria-controls="home-just"
                                                           aria-selected="false">[
                                                            {{trans('backend.arabic') }} ]</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                           id="profile-tab-justified"
                                                           data-toggle="tab"
                                                           href="#profile-activity"
                                                           role="tab"
                                                           aria-controls="profile-just"
                                                           aria-selected="true">[
                                                            {{trans('backend.english') }} ]</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                           id="messages-tab-justified"
                                                           data-toggle="tab"
                                                           href="#messages-activity"
                                                           role="tab"
                                                           aria-controls="messages-just"
                                                           aria-selected="false">{{trans('backend.turkish')}}</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content pt-1">
                                                    <div class="tab-pane active"
                                                         id="home-activity"
                                                         role="tabpanel"
                                                         aria-labelledby="home-tab-justified">

                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="branch-name">{{ trans('backend.name') }}</label>
                                                                    <div class="form-group">
                                                                       <input type="text"
                                                                                   class="form-control"
                                                                                   required
                                                                                   minlength="2"
                                                                                   name="name_ar"
                                                                                   value="{{old('name_ar')}}"
                                                                                   aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="branch-description">{{ trans('backend.description') }}</label>
                                                <div class="form-group">
                                                <textarea data-length="2000"
                                                          class="form-control char-textarea"

                                                          rows="3"
                                                          name="description_ar"
                                                          required
                                                          placeholder="{{ trans('backend.description') }}">{{old('description_ar')}}</textarea>
                                                 </div>
                                            </div>
                                            </div>
                                        </div>

                                                    </div>

                                                    <div class="tab-pane"
                                                         id="profile-activity"
                                                         role="tabpanel"
                                                         aria-labelledby="profile-tab-justified">


                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="branch-name">{{ trans('backend.name') }}</label>
                                                                    <div class="form-group">
                                                                       <input type="text"
                                                                                   class="form-control"
                                                                                   required
                                                                                   minlength="2"
                                                                                   name="name_en"
                                                                                   value="{{old('name_en')}}"
                                                                                   aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="branch-description">{{ trans('backend.description') }}</label>
                                                <div class="form-group">
                                                <textarea data-length="2000"
                                                          class="form-control char-textarea"
                                                          rows="3"
                                                          name="description_en"
                                                          required
                                                          placeholder="{{ trans('backend.description') }}">{{old('description_en')}}</textarea>
                                                 </div>
                                            </div>
                                            </div>
                                        </div>

                                                    </div>

                                                    <div class="tab-pane"
                                                         id="messages-activity"
                                                         role="tabpanel"
                                                         aria-labelledby="messages-tab-justified">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="branch-name">{{ trans('backend.name') }}</label>
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        class="form-control"
                                                                        required
                                                                        minlength="2"
                                                                        name="name_tr"
                                                                        value="{{old('name_tr')}}"
                                                                        aria-required="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="branch-description">{{ trans('backend.description') }}</label>
                                                                <div class="form-group">
                                                                    <textarea data-length="2000"
                                                                            class="form-control char-textarea"
                                                                            rows="3"
                                                                            name="description_tr"
                                                                            required
                                                                            placeholder="{{ trans('backend.description') }}">{{old('descriptiontr')}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">{{ trans('backend.save') }}</button>
                                <a type="button"
                                   class="btn btn-warning"
                                   href="{{   route('branches.index')   }}">{{ trans('backend.back') }}</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script src="{{asset('common/dropify/js/dropify.js') }}"></script>
<script src="{{asset('common/dropify/js/dropify.js') }}"></script>
<script src="{{asset('common/dropify/dropify.js') }}"></script>
<script src="{{asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('backend/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>  <script src="{{asset('backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script> <script src="{{asset('backend/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
<script src="{{asset('backend/app-assets/js/scripts/customizer.min.js')}}"></script>
@endsection
