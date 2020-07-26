@extends('backend.layouts.app')

@section('content') @include('backend.includes.errors')
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('backend.new_tag') }}</h4>

                </div>
                <div class="card-content">
                    <div class="card-body">



<form role="form" action="{{ route('tags.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body">

                                                <ul class="nav nav-tabs nav-justified" id="myTabactivity"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab-justified"
                                                            data-toggle="tab" href="#home-activity" role="tab"
                                                            aria-controls="home-just" aria-selected="false">[
                                                            {{trans('backend.arabic') }} ]</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab-justified" data-toggle="tab"
                                                            href="#profile-activity" role="tab"
                                                            aria-controls="profile-just" aria-selected="true">[
                                                            {{trans('backend.english') }} ]</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="messages-tab-justified"
                                                            data-toggle="tab" href="#messages-activity" role="tab"
                                                            aria-controls="messages-just"
                                                            aria-selected="false">{{trans('backend.turkish')}}</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content pt-1">
                                                    <div class="tab-pane active" id="home-activity" role="tabpanel"
                                                        aria-labelledby="home-tab-justified">
                                                        <h4 class="card-title">
                                                            {{ trans('backend.name') }}</h4>

                                                        <input type="text" class="form-control" required   minlength="2" name="name_ar" value="{{old('name_ar')}}"
                                                            aria-required="true">

                                                    </div>

                                                    <div class="tab-pane" id="profile-activity" role="tabpanel"
                                                        aria-labelledby="profile-tab-justified">
                                                        <h4 class="card-title"> {{ trans('backend.name') }}</h4>
                                                        <input type="text" class="form-control" required   minlength="2" name="name_en" value="{{old('name_en')}}"
                                                            aria-required="true">
                                                    </div>

                                                    <div class="tab-pane" id="messages-activity" role="tabpanel"
                                                        aria-labelledby="messages-tab-justified">
                                                        <h4 class="card-title">
                                                            {{ trans('backend.name') }}</h4>

                                                        <input type="text" class="form-control" required   minlength="2" name="name_tr" value="{{old('name_tr')}}"
                                                            aria-required="true">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">{{ trans('backend.save') }}</button>
                                <a type="button" class="btn btn-warning"
                                    href="{{   route('tags.index')   }}">{{ trans('backend.back') }}</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
