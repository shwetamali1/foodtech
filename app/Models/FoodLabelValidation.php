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
        'brand_name',
        'sub_category',
        'fssai_license_no',
        'net_quantity',
        'country_of_origin',
        'vegetarian_type',
        'manufacturer_name_address',
        'nutritional_info',
        'ingredients',
        'additives_ins_no',
        'allergens',
        'storage_conditions',
        'instructions_for_use',
        'caution_warning',
        'status',
        'admin_comments',
        'final_label_path',
        'final_label_original_name',
        'is_deleted',
    ];

    protected $casts = [
        'nutritional_info' => 'array',
        'allergens'        => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_deleted', 0);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'under_review' => '<span class="badge-ft badge-plan">Under Review</span>',
            'completed'    => '<span class="badge-ft badge-active">Completed</span>',
            default        => '<span class="badge-ft" style="background:#fff3cd;color:#856404;">Submitted</span>',
        };
    }
}
