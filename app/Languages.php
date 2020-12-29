<?php namespace App;

/**
 * Eloquent class to describe the languages table
 *
 * automatically generated by ModelGenerator.php
 */
class Languages extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'languages';

    public $timestamps = false;

    protected $fillable = ['language_name', 'language_abbreviation'];

    public function contents()
    {
        return $this->hasMany('App\Contents', 'language_id', 'id');
    }
}
