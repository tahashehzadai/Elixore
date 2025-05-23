<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerImage extends Model
{
 use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'sub_title',
        'description',
        'image',
        'button',
    ];}
