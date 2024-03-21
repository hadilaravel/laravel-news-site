@extends('panel::layouts.master')

@section('head-tag')
    <title>  تبلیغات </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
           <li class="breadcrumb-item font-size-12 active" aria-current="page"> تبلیغات </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تبلیغات
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.advertising.create') }}" class="btn btn-info btn-sm">ایجاد تبلیغ جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                           <th>لینک</th>
                            <th>سازنده</th>
                            <th>وضعیت</th>
                            <th>عکس</th>
                            <th>تاریخ ساخت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($advertisings as $advertising)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $advertising->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($advertising->link , 30) }}</td>
                                <td>{{ $advertising->user->name }}</td>
                                <td class="text-{{ $advertising->status == 1 ? 'success' : 'danger' }}">{{ $advertising->status == 1 ? 'فعال' : 'غیر فعال' }}</td>
                                <td>
                                    <img src="{{ $advertising->showImage() }}" width="80px">
                                </td>
                            <td>{{ jdate($advertising->created_at)->format('Y-m-d') }}</td>
                            <td class="width-22-rem text-left">
                                 <a href="{{ route('admin.advertising.status' , $advertising->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-{{ $advertising->status == 0 ? 'check text-success' : 'window-close text-danger'  }}"></i></a>
                                <a href="{{ route('admin.advertising.edit' , $advertising->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('admin.advertising.destroy' , $advertising->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> </button>
                                </form>
                            </td>
                            </tr>
                            @empty
<p> تبلیغی وجود ندارد</p>
                        @endforelse

                        </tbody>
                    </table>
                </section>
                {{ $advertisings->links() }}
            </section>
        </section>
    </section>

@endsection

