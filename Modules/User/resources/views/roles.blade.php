@extends('panel::layouts.master')

@section('head-tag')
    <title> مقام ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.users.index') }}">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> مقام ها </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مقام ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.users.add-role' , $user) }}" class="btn btn-info btn-sm">اضافه کردن مقام جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>دسترسی ها</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($user->roles as  $role)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge badge-primary">
                                            {{ $permission->permission_name_org }}
                                        </span>
                                    @endforeach
                                </td>                                <td class="width-22-rem text-left">
                                    <form class="d-inline" action="{{ route('admin.users.delete-role' , [$user , $role]) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>مقامی وجود ندارد</p>
                        @endforelse

                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>

@endsection

