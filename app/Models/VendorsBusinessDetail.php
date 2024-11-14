<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorsBusinessDetail extends Model
{


    use HasFactory;
    protected $table = "vendors_business_details";

    protected $fillable = [ 

        'vendor_id',
        'shop_name',
        'shop_mobile',
        'shop_city',
        'shop_state',
        'shop_address',
        'address_proof_image',
    ];
	//public $timestamps = false;
	protected $primaryKey = 'id';
}
