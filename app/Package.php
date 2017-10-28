<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
      'name',
      'label',
      'status',
      'type',
      'duration',
      'price',
      'details',
      'meta',
    ];

    protected $casts = [
      'meta' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
