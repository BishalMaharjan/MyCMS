<?php namespace App;

/**
 * Eloquent class to describe the contents table
 *
 * automatically generated by ModelGenerator.php
 */
class Contents extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'contents';

    protected $fillable = ['content_title', 'content_subtitle', 'content_description', 'content_image',
        'content_location', 'publish_at'];

    public function getDates()
    {
        return ['publish_at'];
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }

    public function languages()
    {
        return $this->belongsTo('App\Languages', 'language_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }

    public function advertisments()
    {
        return $this->hasMany('App\Advertisments', 'content_id', 'id');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmarks', 'content_id', 'id');
    }
}
