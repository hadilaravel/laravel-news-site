<div class="ads-box">
    <span class="title">تبلیغات</span><br>
    @foreach($activeAdvertisings as $activeAdvertising)
   <a href="{{ $activeAdvertising->link }}" target="_blank">
       <h4>{{ $activeAdvertising->title }}</h4>
    <figure>
        <img src="{{ $activeAdvertising->showImage() }}"  alt="" width="70px" height="10px">
    </figure>
   </a>
    @endforeach

</div>
