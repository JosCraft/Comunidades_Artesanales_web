<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles; // Importa el trait para manejar roles y permisos
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles; // Usamos HasRoles para gestionar roles

    // Multiple Authentication Guard
    protected $guard = 'admin'; // Definimos el guardia 'admin'

    // Los campos que pueden ser completados
    protected $fillable = [
        'name',
        'type',
        'vendor_id',
        'mobile',
        'email',
        'password',
        'image',
        'confirm',
        'status',
    ];

    // Relación con la tabla 'vendors'
    public function vendorPersonal()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id'); // 'vendor_id' es la clave foránea en la tabla `admins`
    }

    // Relación con la tabla 'vendors_business_details'
    public function vendorBusiness()
    {
        return $this->belongsTo('App\Models\VendorsBusinessDetail', 'vendor_id'); // Relación con los detalles de negocio del vendor
    }

    // Relación con la tabla 'vendors_bank_details'
    public function vendorBank()
    {
        return $this->belongsTo('App\Models\VendorsBankDetail', 'vendor_id'); // Relación con los detalles bancarios del vendor
    }
}
