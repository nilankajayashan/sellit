<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function checkExpires(){
        $ads = Ad::select('ad_id','created_at')->get();
        foreach ($ads as $ad) {
            $created_date = date_format($ad->created_at, 'y-m-d');
            $tobe_date = date('y-m-d', strtotime('-30days'));
            if($created_date < $tobe_date){
                $ad->status = 0;
                $ad->ad_option = [];
                $ad->save();
            }
        }
    }
    public function getAllAd(){
        $this->checkExpires();
        $ads = Ad::where('status','=',1)->where('ad_option', 'like', '%urgent%')->inRandomOrder()->limit(2)->get();
        return $ads;
    }
    public function getParentCategories(){
        $categories = Category::select('category_id', 'name','icon')
            ->where('parent_id', '=', 0)
            ->get();
        return $categories;
    }
    public function showIndex(){
        $ads = $this->getAllAd();
        $categories = $this->getParentCategories();
        return view('index',[
            'ads' => $ads,
            'categories' => $categories,
        ]);
    }
}
