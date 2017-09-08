<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fh = fopen( 'storage/property-data.csv', 'r' );

    	if ($fh) 
    	{

	        $row =0;
	    	while (( $data = fgetcsv( $fh, 1000, "," )) !== false) 
			{
				if($row !== 0)
				{
					DB::table('houses')->insert([
			            'name' => $data[0],
			            'price' => $data[1],
			            'bedrooms' => $data[2],
			            'bathrooms' => $data[3],
			            'storeys' => $data[4],
			            'garages' => $data[5],
			            'created_at'  => date('Y-m-d H:i:s'),
            			'updated_at'  => date('Y-m-d H:i:s'),
			        ]);	
				}
				$row++;
			}
			fclose( $fh );
        }
		else 
		{
            return false; 
        }
    }
}
