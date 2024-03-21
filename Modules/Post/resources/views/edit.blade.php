@extends('panel::layouts.master')

@section('head-tag')
    <title> ویرایش پست جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">  پست ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ویرایش پست جدید  </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش پست
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.post.update' , $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <input type="hidden" name="id" value="{{ $post->id }}" >
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" name="title" value="{{ old('title' , $post->title) }}" class="form-control form-control-sm">
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


                            <section class="col-12">
                                <div class="form-group">
                                    <label for=""> توضیحات </label>
                                    <textarea  rows="3" name="body" class="form-control form-control-sm ">
                                    {{ old('body' , $post->body) }}
                                </textarea>
                                </div>
                                @error('body')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="parent_id"> دسته بندی</label>
                                    <select name="category_id" class="form-control form-control-sm" id="parent_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id' , $post->category_id) == $category->id ) selected @endif >{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="type_text"> نوع متن پست</label>
                                    <select name="type_text" id="" class="form-control form-control-sm" id="type_text">
                                        <option value="0" @if(old('type_text' , $post->type_text) == 0) selected @endif>متنی</option>
                                        <option value="1" @if(old('type_text' , $post->type_text) == 1) selected @endif> ویدیو</option>
                                    </select>
                                </div>
                                @error('type_text')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">ویدیو</label>
                                    <input type="file" name="video"  class="form-control form-control-sm">
                                </div>
                                @error('video')
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
                                        <option value="0" @if(old('status' , $post->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status' , $post->status) == 1) selected @endif>فعال</option>
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

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="type"> نوع</label>
                                    <select name="type" id="" class="form-control form-control-sm" id="type">
                                        <option value="0" @if(old('type' , $post->type) == 0) selected @endif>عادی</option>
                                        <option value="1" @if(old('type' , $post->type) == 1) selected @endif> ویژه</option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="type"> امتیاز</label>
                                    <select name="score" id="" class="form-control form-control-sm" id="type">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for=""> زمان برای خواندن </label>
                                    <input type="text" name="time_to_read" value="{{ old('time_to_read' , $post->time_to_read) }}" class="form-control form-control-sm">
                                </div>
                                @error('time_to_read')
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
@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
