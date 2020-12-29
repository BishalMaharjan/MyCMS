<?php

namespace App;

/**
 * Eloquent class to describe the role_pivots table
 *
 * automatically generated by ModelGenerator.php
 */
class RolePivots extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'role_pivots';

    public $primaryKey = '';

    public $timestamps = false;

    public $incrementing = false;
    protected $fillable = ['user_id', 'role_id'];
    public function roles()
    {
        return $this->belongsTo('App\Roles', 'role_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }
}