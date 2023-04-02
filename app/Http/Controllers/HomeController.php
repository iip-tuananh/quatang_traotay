<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\Services;
use App\models\ReviewCus;

class HomeController extends Controller
{
    public function home()
    {
        $data['bannerqc'] = Services::where('status',1)->get();
        $data['hotnews'] = Blog::where([
            ['status','=',1]
        ])->orderBy('id','DESC')->limit(6)->get(['id','title','slug','created_at','image','description']);
        $data['reviewCus'] = ReviewCus::where(['status'=>1])->get();
        $data['partner'] = Partner::where(['status'=>1])->get(['id','image','name','link']);
        return view('home',$data);
    }
}
