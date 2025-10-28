<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 *
 * @property $id
 * @property $period
 * @property $start_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vote extends Model
{

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['period','start_at','active'];



}
