<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Party extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'pan_no', 'address', 'phone_no', 'city_id', 'state_id', 'contact_person_id', 'pincode', 'gst_no', 'owner_id', 'area_id', 'firm_id', 'other_phone_no'
    ];
    public $table = "parties";

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
        // dd('dd');
        // dd($this->all());
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function contactPerson()
    {
        return $this->belongsTo(ContactPerson::class, 'contact_person_id');
    }

    /**
     * Get all of the machineSales for the Party
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function machineSales(): HasMany
    {
        return $this->hasMany(MachineSalesEntry::class, 'party_id', 'id');
    }
}
