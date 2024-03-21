@extends('panel::layouts.master')

@section('head-tag')
<title>ایجاد  مقام جدید</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">  مقام ها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">ایجاد  مقام جدید  </li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد  مقام جدید
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">

                        <section class="col-12 ">
                            <div class="form-group">
                                <label for="">عنوان مقام</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm">
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
                                @foreach ($permissions as $permission)
                                    <div class="checkbox checkbox-primary">
                                        <input id="permission[{{ $permission->name }}]" type="checkbox"
                                               name="permissions[{{ $permission->name }}]" value="{{ $permission->name }}">
                                        <label for="permission[{{ $permission->name }}]">
                                            {{ $permission->permission_name_org }}
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
