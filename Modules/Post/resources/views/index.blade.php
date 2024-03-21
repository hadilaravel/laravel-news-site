@extends('panel::layouts.master')

@section('head-tag')
    <title>   پست ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
           <li class="breadcrumb-item font-size-12 active" aria-current="page">  پست ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پست ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-info btn-sm">ایجاد پست جدید</a>
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
                            <th>کاربر</th>
                            <th> نوع</th>
                            <th> دسته بندی</th>
                            <th>نوع متن پست</th>
                            <th> زمان خوندن</th>
                            <th>امتیاز</th>
                            <th>وضعیت</th>
                            <th>تاریخ ساخت</th>
                            <th>عکس</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($posts as $post)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                                <td>{{ $post->type == 1 ? 'ویژه' : 'عادی' }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post->type_text == 1 ? 'ویدیو' : 'نوشته' }}</td>
                                <td>{{ $post->time_to_read }}دقیقه</td>
                                <td>{{ $post->score }}امتیاز</td>
                                <td class="text-{{ $post->status == 1 ? 'success' : 'danger' }}">{{ $post->status == 1 ? 'فعال' : 'غیر فعال' }}</td>
                            <td>{{ jdate($post->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <img src="{{ asset($post->postImage()) }}" width="80px">
                                </td>
                            <td class="width-22-rem text-left">
                                 <a href="{{ route('admin.post.status' , $post->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-{{ $post->status == 0 ? 'check text-success' : 'window-close text-danger'  }}"></i></a>
                                <a href="{{ route('admin.post.edit' , $post->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('admin.post.destroy' , $post->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> </button>
                                </form>
                            </td>
                            </tr>
                            @empty
<p> پستی وجود ندارد</p>
                        @endforelse

                        </tbody>
                    </table>
                </section>
                {{ $posts->links() }}
            </section>
        </section>
    </section>

@endsection

