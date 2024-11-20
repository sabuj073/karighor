<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\RequestMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Packages extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    
       public function RequestMessage()
    {
        return $this->hasMany(RequestMessage::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'package_id');
    }

    public function package_details()
    {
        return $this->hasMany(PackagesDetails::class);
    }
    public function service()
    {
        return $this->belongsTo(Services::class,'service_id');
    }
}