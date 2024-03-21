<div class="cat-sidebar">
    <span class="title">دسته بندی مطالب</span>
    <div class="text-left"><i class="fa fa-folder-o"></i></div>
    <ul>
        @foreach($activeCategories as $activeCategory)
        <li><a href="{{ route('category.posts' , $activeCategory) }}">{{ $activeCategory->title }}</a><span>{{ $activeCategory->posts->count() }}</span></li>
        @endforeach
    </ul>
</div>
