<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPackageTools\Package;

class Rating extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
    public function hotelbooking()
    {
        return $this->belongsTo(HotelBooking::class, 'hotelbooking_id');
    }
}
