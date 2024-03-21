@extends('panel::layouts.master')

@section('head-tag')
    <title>ویرایش  مقام </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">  مقام ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ویرایش  مقام   </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش  مقام
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.roles.update' , $role->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <section class="row">

                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="">عنوان مقام</label>
                                    <input type="text" name="name" value="{{ old('name' , $role->name) }}" class="form-control form-control-sm">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 ">
                                <div class="form-group">
                                    @foreach($permissions as $permission)
                                        <div class="checkbox">
                                            <input @if($role->hasPermissionTo($permission) )  checked @endif id="checkbox[{{ $permission->name }}]" type="checkbox" name="permissions[{{ $permission->name }}]" value="{{ old('permissions' , $permission->name) }}">
                                            <label for="checkbox[{{ $permission->name }}]">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
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
