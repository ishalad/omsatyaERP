<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSalesEntry extends Model
{
    use HasFactory;
    protected $fillable = ['firm_id', 'year_id', 'bill_no', 'date', 'party_id', 'product_id', 'serial_no', 'mc_no', 'install_date', 'service_expiry_date', 'free_service', 'order_no', 'remarks', 'service_type_id', 'image', 'lat', 'long', 'map_url', 'tag', 'is_active', 'mic_fitting_engineer_id', 'delivery_engineer_id'];
    protected $id = 'id';

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class)->with('contactPerson', 'owner');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function micFittingEngineer()
    {
        return $this->belongsTo(Engineer::class, 'mic_fitting_engineer_id');
    }

    public function deliveryEngineer()
    {
        return $this->belongsTo(Engineer::class, 'delivery_engineer_id');
    }
}
