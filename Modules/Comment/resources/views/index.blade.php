@extends('panel::layouts.master')

@section('head-tag')
    <title> نظرات </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
           <li class="breadcrumb-item font-size-12 active" aria-current="page">نظرات  </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نظرات
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
{{--                    <a href="{{ route('admin.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی جدید</a>--}}
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
                            <th> تعداد پاسخ ها</th>
                            <th>وضعیت</th>
                            <th>تاریخ ساخت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($comments as $comment)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$comment->commentable->title }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->comments->count()}}</td>
                            <td class="text-{{ $comment->status == 1 ? 'success' : 'danger' }}">{{ $comment->status == 1 ? 'فعال' : 'غیر فعال' }}</td>
                            <td>{{ jdate($comment->created_at)->format('Y-m-d') }}</td>
                            <td class="width-22-rem text-left">
                                 <a href="{{ route('admin.comment.status' , $comment->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-{{ $comment->status == 0 ? 'check text-success' : 'window-close text-danger'  }}"></i></a>
                                <form class="d-inline" action="{{ route('admin.comment.destroy' , $comment->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> </button>
                                </form>
                            </td>
                            </tr>
                            @empty
<p> نطری وجود ندارد</p>
                        @endforelse

                        </tbody>
                    </table>
                </section>
                {{ $comments->links() }}
            </section>
        </section>
    </section>

@endsection

