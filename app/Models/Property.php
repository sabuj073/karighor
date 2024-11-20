<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Metadata\Version\Requirement;

class Property extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function requirement_type()
    {
        return $this->belongsTo(RequirementType::class);
    }
    public function features()
    {

        return $this->hasMany(Features::class);
    }
    public function location()
    {

        return $this->hasMany(Location::class);
    }
}
