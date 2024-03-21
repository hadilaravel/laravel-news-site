@extends('panel::layouts.master')

@section('head-tag')
<title>ایجاد  دسته بندی جدید</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> دسته بندی ها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">ایجاد دسته بندی جدید  </li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد دسته بندی جدید
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">عنوان</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-sm">
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
                                <label for="">کلمات کلیدی(اجباری نیست)</label>
                                <input type="text" name="keywords" value="{{ old('keywords') }}" class="form-control form-control-sm">
                            </div>
                            @error('keywords')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                     <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for=""> توضیحات (اجباری نیست)</label>
                                <textarea rows="3" name="description" class="form-control form-control-sm">
                                    {{ old('description') }}
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

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="parent_id"> دسته والد(اجباری نیست)</label>
                                <select name="parent_id" class="form-control form-control-sm" id="parent_id">
                                    <option  value="">دسته اصلی</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('parent_id') == $category->id ) selected @endif >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('parent_id')
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
                                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
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
