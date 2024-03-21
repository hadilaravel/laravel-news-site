<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Comment\Repositories\CommentRepo;
use Modules\Home\Repositories\HomeRepo;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomeRepo $homeRepo , CategoryRepo $categoryRepo)
    {
//        $latestPosts = $homeRepo->latestPosts()->get();
        $latestPosts = Cache::remember('latestPosts' , 10 , function () use($homeRepo) {
            return $homeRepo->latestPosts()->get();
        }) ;

//        $activeCategories = $homeRepo->activeCategories()->get();
        $activeCategories = Cache::remember('activeCategories' , 10 , function () use($homeRepo) {
            return $homeRepo->activeCategories()->get();
        }) ;

//        $postMostViews = $homeRepo->postMostViews();
        $postMostViews = Cache::remember('postMostViews' , 10 , function () use($homeRepo) {
            return $homeRepo->postMostViews();
        }) ;

//        $vipSliderPosts = $homeRepo->vipSliderPosts();
        $vipSliderPosts = Cache::remember('vipSliderPosts' , 10 , function () use($homeRepo) {
            return $homeRepo->vipSliderPosts();
        }) ;

//        $latestComments = CommentRepo::getLatestComments()->limit(5)->get();
        $latestComments = Cache::remember('latestComments' , 10 , function () {
            return  CommentRepo::getLatestComments()->limit(5)->get();
        }) ;

//        $activeAdvertisings = $homeRepo->activeAdvertisings();
        $activeAdvertisings = Cache::remember('activeAdvertisings' , 10 , function () use($homeRepo) {
            return $homeRepo->activeAdvertisings();
        }) ;



        return view('home::index' , compact('latestPosts' , 'activeCategories' , 'postMostViews' , 'vipSliderPosts' , 'latestComments'  , 'activeAdvertisings'));
    }


    public function search(Request $request , HomeRepo $homeRepo)
    {
        $search = $request->search;
        $posts = $homeRepo->serachPost($search) ;
        return view('home::search' , compact('posts' , 'search'));
    }

}
