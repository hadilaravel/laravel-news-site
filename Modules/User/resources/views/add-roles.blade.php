@extends('panel::layouts.master')

@section('head-tag')
<title>  اضافه کردن مقام به کاربر</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کاربران ادمین</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">   اضافه کردن مقام به کاربر</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    اضافه کردن مقام به کاربر
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.users.show-role' , $user) }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.users.add-role.store' , $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="role"> مقام </label>
                                <select name="role" class="form-control form-control-sm" id="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" @if(old('role') == $role->id ) selected @endif >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
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
