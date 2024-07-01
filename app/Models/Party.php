<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'phone_no', 'city_id', 'state_id', 'contact_person_id', 'pincode', 'gst_no', 'owner_id', 'area_id', 'firm_id'
    ];
    protected $guarded = ['id'];
}
