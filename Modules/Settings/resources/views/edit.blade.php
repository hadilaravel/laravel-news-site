@extends('panel::layouts.master')

@section('head-tag')
    <title> ویرایش   تنظیمات</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">  پست ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ویرایش  تنظیمات  </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش تنظیمات
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.settings.update' , $setting->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" name="title" value="{{ old('title' , $setting->title) }}" class="form-control form-control-sm">
                                </div>
                                @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                                 </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آیکن</label>
                                    <input type="file" name="icon"  class="form-control form-control-sm">
                                </div>
                                <img src="{{ asset($setting->icon) }}" width="100px" height="100px">
                                @error('icon')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for=""> توضیحات </label>
                                    <textarea rows="3" name="description" class="form-control form-control-sm">
                                    {{ old('description' , $setting->description) }}
                                </textarea>
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <input type="submit" class="btn btn-primary btn-sm" value="ثبت">
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
