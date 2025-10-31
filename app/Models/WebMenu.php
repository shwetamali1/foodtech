<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebMenu extends Model
{
    use HasFactory;
    protected $table = 'web_menu';
    public $timestamps = false;

    protected $fillable =  [
        'title',
        'url',
        'controller',
        'action',
        'parent_id',
        'orders',
        'nav_item',
        'menu_icon',
        'permission_tag',
        'is_submenu',
        'status',
    ];
}