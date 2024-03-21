<?php

namespace Modules\Advertising\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Modules\Advertising\App\Http\Requests\AdvertisingRequest;
use Modules\Advertising\App\Models\Advertising;
use Modules\Advertising\App\Notifications\StoreAd;
use Modules\Advertising\Repositories\AdvertisingRepo;
use Modules\Advertising\Services\AdvertisingService;
use Modules\Category\App\Models\Category;
use Modules\Share\Repositories\ShareRepo;

class AdvertisingController extends Controller
{

    public AdvertisingRepo $advertisingRepo;
    public AdvertisingService $advertisingService;

    public function __construct(AdvertisingRepo $advertisingRepo , AdvertisingService $advertisingService )
    {
        $this->advertisingRepo = $advertisingRepo;
        $this->advertisingService = $advertisingService;
    }

    public function index()
    {
        $this->authorize('Advertising' , Advertising::class);
        $advertisings = $this->advertisingRepo->index()->paginate(10);
        return view('advertising::index' , compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('Advertising' , Advertising::class);
        return view('advertising::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertisingRequest $request): RedirectResponse
    {
        $this->authorize('Advertising' , Advertising::class);

        $this->advertisingService->store($request);
        Notification::send(auth()->user() , new StoreAd($request->title ,'' , 'admin.advertising.index'));
        ShareRepo::successMessage('ساخت  تبلیغ');
        return  to_route('admin.advertising.index');
    }


    public function edit(Advertising $advertising)
    {
        $this->authorize('Advertising' , Advertising::class);
        return view('advertising::edit' , compact('advertising'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvertisingRequest $request, Advertising $advertising): RedirectResponse
    {
        $this->authorize('Advertising' , Advertising::class);

        $this->advertisingService->update($request , $advertising);
        ShareRepo::successMessage('ویرایش  تبلیغ');
        return  to_route('admin.advertising.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertising $advertising)
    {
        $this->authorize('Advertising' , Advertising::class);

        $this->advertisingRepo->destroy($advertising);
        ShareRepo::successMessage('حذف  تبلیغ');
        return  to_route('admin.advertising.index');
    }

    public function status(Advertising $advertising)
    {
        $this->authorize('index' , Advertising::class);

        $advertising->status = $advertising->status == 0 ? 1 : 0;
        $advertising->save();
//        alert()->success(' وضعیت دسته بندی' , 'وضعیت دسته بندی با موفقیت  تغیر کرد');
        ShareRepo::successMessage('وضعیت  تبلیغ');
        return to_route('admin.advertising.index');
    }

}
