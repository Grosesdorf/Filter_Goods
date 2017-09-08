<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
	public function scopeGetHouseAllParams($query, $name, $bedrooms, $bathrooms, $storeys, $garages, $amount_min, $amount_max)
	{
		return $query->where('name', 'like', '%' .$name. '%')->
    					where('bedrooms', $bedrooms)->
    					where('bathrooms', $bathrooms)->
    					where('storeys', $storeys)->
    					where('garages', $garages)->
    					whereBetween('price', [$amount_min, $amount_max]);
	}

	public function scopeGetAllHouse($query, $amount_min, $amount_max)
	{
		return $query->whereBetween('price', [$amount_min, $amount_max]);
	}
}
