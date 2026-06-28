<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodLabelValidation extends Model
{
    protected $table = 'food_label_validations';

    protected $fillable = [
        'user_id',
        'product_name',
        'product_category',
        'business_category',
        'fssai_license_no',
        'net_quantity',
        'manufacturer_name_address',
        'ingredients',
        'additives_ins_no',
        'storage_conditions',
        'instructions_for_use',
        'caution_warning',
        'lab_report_path',
        'lab_report_original_name',
        'status',
        'admin_comments',
        'final_label_path',
        'final_label_original_name',
        'is_deleted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_deleted', 0);
    }
}
