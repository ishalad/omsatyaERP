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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
