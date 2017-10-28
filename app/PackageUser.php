<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageUser extends Model
{
    protected $table = 'package_user';

    protected $fillable = [
      'package_id',
      'user_id',
      'status',
      'subscribed_at',
      'expired_at',
    ];

    protected $dates = [
      'subscribed_at',
      'expired_at',
      'created_at',
      'updated_at',
    ];
}
