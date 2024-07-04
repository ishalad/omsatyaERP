<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'firm_id', 'year_id', 'date', 'time', 'complaint_type_id', 'sales_entry_id', 'product_id', 'remarks', 'image', 'engineer_id',
        'engineer_assign_date', 'engineer_assign_time', 'engineer_complaint_id', 'jointengg', 'service_type_id', 'status_id', 'complaint'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function salesEntry()
    {
        return $this->belongsTo(MachineSalesEntry::class, 'sales_entry_id');
    }

    public function complaintType()
    {
        return $this->belongsTo(ComplaintType::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
}
