<?php namespace App;

/**
 * Eloquent class to describe the vacancies table
 *
 * automatically generated by ModelGenerator.php
 */
class Vacancies extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'vacancies';

    public $timestamps = false;

    protected $fillable = ['vacancy_title', 'vacancy_position', 'vacancy_number', 'vacancy_skill', 'vacancy_email',
        'vacancy_description', 'vacancy_status', 'vacancy_deadline', 'posted_date'];

    public function getDates()
    {
        return ['posted_date'];
    }
}
