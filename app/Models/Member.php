<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 *
 * @property $id
 * @property $ci
 * @property $name
 * @property $last_name
 * @property $address
 * @property $member_from
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Member extends Model
{

    static $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'member_from' => 'required',
        'genre' => 'required'
    ];

    protected $perPage = 20;
    protected $dates = ['member_from','christening_date'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ci','name','last_name','address','member_from','genre','photo','photo_min','active','christening_date','observations','qualific'];

    // public function getMemberFromAttribute($date)
    // {
    //     $date = new \Carbon\Carbon($date);
    //     // Now modify and return the date
    // }

}
