<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = ['name','short_desc','long_desc','start_date','end_date','status','image'];

    //Fuction for relation slider
    public function images() {
        return $this->hasMany(SliderImage::class);
    }
}
