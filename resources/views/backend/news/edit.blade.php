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
      href="{{asset('backend/app-assets/css/plugins/forms/validation/form-validation.css')}}">

      @endsection

@section('content') @include('backend.includes.errors')

<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="card-title">{{ trans('backend.edit_university') }}</h4>

                </div>
                <div class="card-content">
                    <div class="card-body">
                   <form role="form"
                              action="{{ route('universities.update',$university->id) }}"
                              method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">

                                            <div class="card-body">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">University logo</label>

                                                            <div class="input-group">

                                                                <input type="file"
                                                                       class="dropify"
                                                                       data-default-file="{{ asset('uploads/universities/logo/')}}/{{$university->logo }}"
                                                                       data-allowed-file-extensions="png jpg jpeg"
                                                                       name="logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">University video url</label>
                                                            <div class="input-group">

                                                                <input type="text"
                                                                           class="form-control"
                                                                           placeholder="University video url"
                                                                           aria-describedby="basic-addon2"
                                                                           name="video_url"
                                                                           data-validation-regex-regex="^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$"
                                                                           data-validation-regex-message="Must be a valid url"
                                                                           required=""
                                                                           value="@if (old('video_url')){{ old('video_url') }}@else{{ $university->video_url }}@endif"
                                                                           aria-invalid="false">


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">website_url</label>
                                                            <div class="input-group">


                                                                       <input type="text"
                                                                               class="form-control"
                                                                               placeholder="University website_url"
                                                                               aria-describedby="basic-addon2"
                                                                               name="website_url"
                                                                               data-validation-regex-regex="^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$"
                                                                               data-validation-regex-message="Must be a valid url"
                                                                               required=""
                                                                               value="@if (old('website_url')){{ old('website_url') }}@else{{ $university->website_url }}@endif"
                                                                               aria-invalid="false">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">founded_year</label>
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="founded_year"
                                                                       aria-describedby="basic-addon2"
                                                                       name="founded_year"
                                                                       value="@if (old('founded_year')){{ old('founded_year') }}@else{{ $university->founded_year }}@endif"
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

                                            <div class="card-body">


                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="Univercity-Languages">Univercity
                                                                Languages</label>
                                                            <div class="form-group">
                                                                <select multiple
                                                                        class="select2 form-control select2-hidden-accessible"
                                                                        name="languages[]"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">


                                                                    @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}"
                                                                            @foreach ($university->languages as $uni_language)
                                                                        @if ($uni_language->id == $language->id)
                                                                        selected
                                                                        @endif
                                                                        @endforeach
                                                                        > {{ $language->name }} </option>
                                                                    @endforeach


                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="University-Departments">University
                                                                Departments</label>
                                                            <div class="form-group">
                                                                <select multiple
                                                                        class="select2 form-control select2-hidden-accessible"
                                                                        name="departments[]"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">

                                                                @foreach ($departments as $department)
                                                                   <option value="{{ $department->id }}"
                                                                                @foreach ($university->departments as $uni_department)
                                                                                   @if ($uni_department->id == $department->id)
                                                                                  selected
                                                                                   @endif
                                                                                 @endforeach
                                                                  > {{ $department->name }} </option>
                                                                @endforeach


                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">Univercity Branch</label>
                                                            <div class="form-group">
                                                                <select class="select2 form-control select2-hidden-accessible"
                                                                        name="branch_id"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">
                                                                    @foreach ($branches as $branch)
                                                                    <option
                                                                    @if ($university->branch_id == $branch->id) selected  @endif
                                                                    value="{{$branch->id}}">{{ $branch->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="University-city">University City</label>
                                                            <div class="form-group">
                                                               <select class="select2 form-control"
                                                                        name="city_id"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">
                                                                    @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}"
                                                                            @if ($university->city_id == $city->id) selected  @endif
                                                                        > {{ $city->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">students_count</label>
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="students_count"
                                                                       aria-describedby="basic-addon2"
                                                                       name="students_count"
                                                                       value="@if (old('students_count')){{ old('students_count') }}@else{{ $university->students_count }}@endif"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>






                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch-city">Show In YODTR main site</label>
                                                            <div class="form-group">
                                                                <select class="select2 form-control select2-hidden-accessible"
                                                                        name="show_in_home"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">

                                                                    <option  @if ($university->show_in_home == 1 ) selected @endif value="1">yes</option>
                                                                    <option  @if ($university->show_in_home == 0 ) selected @endif value="0">no</option>

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
                                                                    <label
                                                                           for="branch-name">{{ trans('backend.name') }}</label>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               required
                                                                               minlength="2"
                                                                               name="name_ar"

                                                                               value="@if (old('name_ar')){{ old('name_ar') }}@else{{ $university->name_ar }}@endif"
                                                                               aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="university.overview">{{ trans('backend.overview') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="overview_ar"

                                                                                  required
                                                                                  placeholder="{{ trans('backend.overview') }}">@if (old('overview_ar')){{ old('overview_ar') }}@else{{ $university->overview_ar }}@endif</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="university.contact_details">{{ trans('backend.contact_details') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="contact_details_ar"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.contact_details') }}">@if (old('contact_details_ar')){{ old('contact_details_ar') }}@else{{ $university->contact_details_ar }}@endif</textarea>
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
                                                                    <label
                                                                           for="branch-name">{{ trans('backend.name') }}</label>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               required
                                                                               minlength="2"
                                                                               name="name_en"
                                                                               value="@if (old('name_en')){{ old('name_en') }}@else{{ $university->name_en }}@endif"
                                                                               aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="university.overview">{{ trans('backend.overview') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="overview_en"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.overview') }}">@if (old('overview_en')){{ old('overview_en') }}@else{{ $university->overview_en }}@endif</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="university.contact_details">{{ trans('backend.contact_details') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="contact_details_en"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.contact_details') }}">@if (old('contact_details_en')){{ old('contact_details_en') }}@else{{ $university->contact_details_en }}@endif</textarea>
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
                                                                    <label
                                                                           for="branch-name">{{ trans('backend.name') }}</label>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               required
                                                                               minlength="2"
                                                                               name="name_tr"
                                                                               value="@if (old('name_tr')){{ old('name_tr') }}@else{{ $university->name_tr }}@endif"
                                                                               aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="university.overview">{{ trans('backend.overview') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="overview_tr"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.overview') }}">@if (old('overview_tr')){{ old('overview_tr') }}@else{{ $university->overview_tr }}@endif</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="university.contact_details">{{ trans('backend.contact_details') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="contact_details_tr"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.contact_details') }}">@if (old('contact_details_tr')){{ old('contact_details_tr') }}@else{{ $university->contact_details_tr }}@endif</textarea>
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
                                <button type="submit"
                                        class="btn btn-success">{{ trans('backend.save') }}</button>
                                <a type="button"
                                   class="btn btn-warning"
                                   href="{{   route('universities.index')   }}">{{ trans('backend.back') }}</a>
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
<script src="{{asset('backend/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
  <script src="{{asset('backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
   <script src="{{asset('backend/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>

<script src="{{asset('backend/app-assets/js/scripts/customizer.min.js')}}"></script>
@endsection
