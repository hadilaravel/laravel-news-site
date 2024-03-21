@extends('panel::layouts.master')

@section('head-tag')
    <title>کاربران ادمین</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کاربران ادمین</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کاربران ادمین
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm">ایجاد ادمین جدید</a>
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
                            <th>ایمیل</th>
                            <th>مقام ها</th>
                            <th>وضعیت تایید ایمیل</th>
                            <th>تاریخ عضویت</th>
                            <th>وضعیت </th>
                            <th>پروفایل</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($users as  $user)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <ul style="list-style: none">
                                        @foreach($user->roles as $role)
                                            <li>{{ $role->name }}</li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-role-{{ $role->id }}').submit()">
                                                <i class="fa fa-trash-alt text-danger"></i>
                                            </a>
                                            <form id="delete-role-{{ $role->id }}" method="post" action="{{ route('admin.users.delete-role' ,[$user->id , $role->id] ) }}">
                                                @csrf
                                                {{ method_field('delete') }}
                                            </form>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><i class="fa  fa-{{ $user->status_email_icon  }} text-{{ $user->status_email_color }}"></i></td>
                                <td>{{  jdate($user->created_at)->format('Y-m-d') }}</td>
                                <td class="text-{{ $user->status == 1 ? 'success' : 'danger' }}">{{ $user->status == 1 ? 'فعال' : 'غیر فعال' }}</td>
                                <td>
                                    @if($user->profile_photo_path)
                                    <img src="{{ $user->profileImage() }}" width="80px" height="80px">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="width-22-rem text-left">
                                    <a href="{{ route('admin.users.show-role' , $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-user-check"></i> </a>
                                    <a href="{{ route('admin.users.status' , $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-{{ $user->status == 0 ? 'check text-success' : 'window-close text-danger'  }}"></i></a>
                                    <a href="{{ route('admin.users.edit' , $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                    <form class="d-inline" action="{{ route('admin.users.destroy' , $user->id) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <p>کاربری وجود ندارد</p>
                        @endforelse

                        </tbody>
                    </table>
                </section>
                {{ $users->links() }}
            </section>
        </section>
    </section>

@endsection

