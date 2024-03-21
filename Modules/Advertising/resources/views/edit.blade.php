@extends('panel::layouts.master')

@section('head-tag')
    <title>ویرایش  تبلیغ </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">   تبلیغات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ویرایش  تبلیغ   </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش تبلیغ
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.advertising.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.advertising.update' , $advertising->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" name="title" value="{{ old('title' , $advertising->title) }}" class="form-control form-control-sm">
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
                                    <label for="">لینک(اجباری نیست)</label>
                                    <input type="text" name="link" value="{{ old('link' , $advertising->link) }}" class="form-control form-control-sm">
                                </div>
                                @error('link')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عکس</label>
                                    <input type="file" name="image"  class="form-control form-control-sm">
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت فعالسازی</label>
                                    <select name="status" id="" class="form-control form-control-sm" id="status">
                                        <option value="0" @if(old('status' , $advertising->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status' , $advertising->status) == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
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
