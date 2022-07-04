<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\SubFilter;
use Exception;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class FilterAdController extends Controller
{
    function get_intersect(...$arrays){
        $instersect_arrays = array();

        foreach($arrays as $array){
            if(!empty($array)){
                array_push($instersect_arrays,$array);
            }
        }

        return call_user_func_array('array_intersect', $instersect_arrays);
    }

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
    public function searchByCategory($category, $city, Request $request){
        $sub_filters_list = [];
        //filters
        $all_list = [];
        $searched_filter = [];
        $category_filter = [];
        $city_filter = [];
        $price_filter = [];
        $sub_filtered = [];
        //for final filtering purpose
        $filter_holder = [];
        $empty = false;
        //searched ad
        $all_ads = Ad::all();
        foreach($all_ads as $ad){
            array_push($all_list, $ad->ad_id);
        }
        if ($request->search != null){
            $searched_ads = Ad::where('tittle', 'like', '%'.$request->search.'%')->get();
            foreach($searched_ads as $searched_ad){
                array_push($searched_filter, $searched_ad->ad_id);
            }
            if (count($searched_filter)>0){
                array_push($filter_holder,$searched_filter);
            }else{
                $empty = true;
            }
        }
        //filtered by categories
        if( $category != 'all') {
            $main_category = Category::select('category_id')->where('name', '=', $category)->first();
            $sub_category_ids = Category::select('category_id')->where('parent_id', '=', $main_category->category_id)->get();
            $category_list = [];
            array_push($category_list, $main_category->category_id);
            foreach ($sub_category_ids as $sub_category_id) {
                array_push($category_list, $sub_category_id->category_id);
            }
            $filtered_categories = Ad::whereIn('category_id', $category_list)->get();
            foreach ($filtered_categories as $filtered_category) {
                array_push($category_filter, $filtered_category->ad_id);
            }
            if (count($category_filter)>0){
                array_push($filter_holder,$category_filter);
            }else{
                $empty = true;
            }

            //start make sub filter list
                $sub_filters = SubFilter::where('category_name', '=', $category)->where('category_id', '=', $main_category->category_id)->get();
            if (count($sub_filters) > 0 ){
                foreach ($sub_filters as $sub_filter){
                    $sub = [
                        'filter_name' => $sub_filter->filter,
                        'filter_list' => $sub_filter->filter_list,
                    ];
                    array_push($sub_filters_list, $sub);
                }
            }
            //end make sub filter list
//            start sub filtering

            $sub_filters = SubFilter::where('category_name', '=', $category)->where('category_id', '=', $main_category->category_id)->get();
            if (count($sub_filters) > 0 ){
                foreach ($sub_filters as $sub_filter){
                    $sub_filtered_temp = [];
                    $is_set_sub_filter = false;
                    if ($request->has($sub_filter->filter)){
                        $is_set_sub_filter = true;
                        $sub_filtered_ads = Ad::where('ad_info', 'like', '%'.$sub_filter->filter.'%')->get();
                        if($sub_filtered_ads != null){
                            $sub_value_found = false;
                            foreach ($sub_filtered_ads as $sub_filtered_ad){
                                $sub_filtered_value = (array) $sub_filtered_ad->ad_info;
                                if($request->get($sub_filter->filter) == $sub_filtered_value[$sub_filter->filter]){
                                    $sub_value_found = true;
                                    array_push($sub_filtered_temp, $sub_filtered_ad->ad_id);
                                }

                            }
                            if (!$sub_value_found){
                                foreach ($sub_filtered_ads as $sub_filtered_ad){
                                    $sub_filtered_value = (array) $sub_filtered_ad->ad_info;
                                    if( lcfirst($request->get($sub_filter->filter)) == 'others' || lcfirst($request->get($sub_filter->filter)) == 'other'){
                                        if(!in_array($sub_filtered_value[$sub_filter->filter],  json_decode($sub_filter->filter_list))){
                                            array_push($sub_filtered_temp, $sub_filtered_ad->ad_id);
                                        }
                                    }

                                }

                            }

                            if (count($sub_filtered_temp)>0){
                                $sub_filtered = $this->get_intersect($sub_filtered, $sub_filtered_temp);
                            }else{
                                $empty = true;
                            }
                        }
                    }
                }
                if ($is_set_sub_filter){
                    if (count($sub_filtered)>0){
                        array_push($filter_holder,$sub_filtered);
                    }else{
                        $empty = true;
                    }
                }
            }

//            end sub filtering
        }
        //filtered by cities
        if ($city != 'sri-lanka') {
            $filtered_cities = Ad::where('city', '=', $city)->get();
            foreach ($filtered_cities as $filtered_city) {
                array_push($city_filter, $filtered_city->ad_id);
            }
            if (count($city_filter)>0){
                array_push($filter_holder,$city_filter);
            }else{
                $empty = true;
            }
        }
        //filtered by price
        if ($request->price_min != null && $request->price_max != null && $request->price_max > $request->price_min && $request->price_min < $request->price_max){
            $filtered_prices = Ad::where('price', '>=', $request->price_min)->where('price', '<=', $request->price_max)->get();
            foreach ($filtered_prices as $filtered_price) {
                array_push($price_filter, $filtered_price->ad_id);
            }
            if (count($price_filter)>0){
                array_push($filter_holder,$price_filter);
            }else{
                $empty = true;
            }
        }
        $this->checkExpires();

        //result ads
        if ($empty){
            $ad_list = [];
        }else{
            if ($category == 'all' && $city == 'sri-lanka' && $request->price_min == null && $request->price_max == null){
                $ad_list = $all_list;
            }else{
                $ad_list = call_user_func_array('array_intersect', $filter_holder);
            }
        }
        $ads = Ad::whereIn('ad_id',$ad_list)->where('status', '=', 1)->get();
        //make all filter lists
        $mainCategories = Category::select('category_id', 'name', 'icon')
            ->where('parent_id', '=', 0)->get();
        if( $category != 'all') {
            $main_category = Category::select('category_id')->where('name', '=', $category)->first();
            $sub_categories = Category::select('category_id','name')->where('parent_id', '=', $main_category->category_id)->get();
        }
        $cities = ['Colombo', 'Moratuwa', 'Kandy', 'Negombo','Batticaloa','Sri Jayewardenepura Kotte', 'Kilinochchi', 'Galle', 'Trincomalee','Jaffna', 'Matara', 'Anuradhapura', 'Ratnapura', 'Puttalam', 'Badulla', 'Mullaittivu', 'Matale', 'Mannar', 'Kurunegala'];
        ;
        return view('find_ad',[
            'main_categories' => $mainCategories,
            'sub_categories' => isset($sub_categories)?$sub_categories:null,
            'cities' => $cities,
            'sub_filters' => count($sub_filters_list)>0?$sub_filters_list:null,
            'ads' => $ads,
        ]);
    }
}
