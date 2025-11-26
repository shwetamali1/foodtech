<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureDocument extends Model
{
    use HasFactory;

    protected $table = 'feature_documents';

    protected $fillable = [
        'subscription_id',    // from hidden field
        'user_id',            // user against whom this feature belongs
        'uploaded_by',        // admin who uploaded
        'feature_signature',  // your md5 signature
        'feature_text',       // the feature text line
        'original_name',      // original file name
        'file_path',          // storage path
        
    ];
}
