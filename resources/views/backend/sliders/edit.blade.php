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

                    <h4 class="card-title">{{ trans('backend.edit_slider') }}</h4>


                </div>
                <div class="card-content">
                    <div class="card-body">

                        <form role="form"
                                action="{{ route('sliders.update',$slider->id) }}"
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
                                                            <label for="branch-city">slider image</label>

                                                            <div class="input-group">

                                                                <input type="file"
                                                                       class="dropify"
                                                                       data-default-file="{{ asset('uploads/sliders/images/')}}/{{$slider->image }}"
                                                                       data-allowed-file-extensions="png jpg jpeg"
                                                                       name="image"
                                                                        >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="url">url</label>
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="url"
                                                                       aria-describedby="basic-addon2"
                                                                       name="url" data-validation-regex-regex="^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$" data-validation-regex-message="Must be a valid url"   required="" aria-invalid="false"
                                                                       value="@if (old('url')){{ old('url') }}@else{{ $slider->url }}@endif"
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
                                                            <label for="Slider-Branch">Slider Branch</label>
                                                            <div class="form-group">
                                                                <select class="select2 form-control select2-hidden-accessible"
                                                                        name="branch_id"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">
                                                                   @foreach ($branches as $branch)
                                                                      <option @if ($slider->branch_id == $branch->id) selected @endif
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
                                                            <label for="branch-city">status</label>
                                                            <div class="form-group">
                                                                <select class="select2 form-control select2-hidden-accessible"
                                                                        name="status"
                                                                        required
                                                                        tabindex="-1"
                                                                        aria-hidden="true">

                                                                    <option  @if ($slider->status == 1 ) selected @endif value="1">yes</option>
                                                                    <option  @if ($slider->status == 0 ) selected @endif value="0">no</option>

                                                                </select>
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

                                                                     <option  @if ($slider->show_in_home == 1 ) selected @endif value="1">yes</option>
                                                                    <option  @if ($slider->show_in_home == 0 ) selected @endif value="0">no</option>


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
                                                                           for="title_ar">{{ trans('backend.title') }}</label>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               required
                                                                               minlength="2"
                                                                               name="title_ar"
                                                                               value="@if (old('title_ar')){{ old('title_ar') }}@else{{ $slider->title_ar }}@endif"
                                                                               aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="slider.text_ar">{{ trans('backend.text') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="text_ar"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.text') }}">@if (old('text_ar')){{ old('text_ar') }}@else{{ $slider->text_ar }}@endif</textarea>
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
                                                                           for="title_en">{{ trans('backend.title') }}</label>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               required
                                                                               minlength="2"
                                                                               name="title_en"
                                                                               value="@if (old('title_en')){{ old('title_en') }}@else{{ $slider->title_en }}@endif"
                                                                               aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="slider.text_en">{{ trans('backend.text') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="text_en"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.text') }}">@if (old('text_en')){{ old('text_en') }}@else{{ $slider->text_en }}@endif</textarea>
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
                                                                           for="title_tr">{{ trans('backend.title') }}</label>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               required
                                                                               minlength="2"
                                                                               name="title_tr"
                                                                               value="@if (old('title_tr')){{ old('title_tr') }}@else{{ $slider->title_tr }}@endif"
                                                                               aria-required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label
                                                                           for="slider.text_tr">{{ trans('backend.text') }}</label>
                                                                    <div class="form-group">
                                                                        <textarea data-length="2000"
                                                                                  class="form-control char-textarea"
                                                                                  rows="3"
                                                                                  name="text_tr"
                                                                                  required
                                                                                  placeholder="{{ trans('backend.text') }}">@if (old('text_tr')){{ old('text_tr') }}@else{{ $slider->text_tr }}@endif</textarea>
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
                                   href="{{   route('sliders.index')   }}">{{ trans('backend.back') }}</a>
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
