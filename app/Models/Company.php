<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 9/1/2018
 * Time: 4:27 PM
 */

namespace App\Models;


class Company extends BaseModel
{
    protected $table = 'companies';

    protected $primaryKey = 'id';
    protected $fillable =  [
        'id','name','email','logo','website','created_at','updated_at'
    ];



}