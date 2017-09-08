<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;

class SearchController extends Controller
{
    public function index()
    {
    	$range = House::selectRaw("MAX(price) AS max_price, MIN(price) AS min_price")->get();

    	$data = $range->toArray();

    	return view('search', ['data' => $data]);
    }

    public function search(Request $request)
    {

    	//sleep(2); // Эффект для спиннера

    	if ($request->isMethod('get'))
    	{
    		$name = $request->input('name');
    		$bedrooms = $request->input('bedrooms');
    		$bathrooms = $request->input('bathrooms');
    		$storeys = $request->input('storeys');
    		$garages = $request->input('garages');
    		$amount_min = $request->input('amount_min');
    		$amount_max = $request->input('amount_max');

    		if($name && $bedrooms && $bathrooms && $storeys && $garages)
    		{
    			return json_encode(House::getHouseAllParams($name, $bedrooms, 
    															$bathrooms, $storeys, 
    															$garages, $amount_min, $amount_max)->
    															get());
    		}
    		// для остальных опциональных данных определяем свои методы в Моделе
    		else
    		{
    			return json_encode(House::getAllHouse($amount_min, $amount_max)->get());
    		}
    	}        
    }
}
