<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    protected $fillable = [
        'user_id',
        'layout',
        'color_scheme',
        'sidebar_visibility',
        'layout_width',
        'layout_position',
        'topbar_color',
        'sidebar_size',
        'sidebar_view',
        'sidebar_color',
        'sidebar_image',
        'preloader',
        'status',
        'created_by',
        'updated_by',
    ];
}
