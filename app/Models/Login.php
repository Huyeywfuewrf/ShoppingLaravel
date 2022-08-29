<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
public $timestamps = false;

protected $fillable = ['FullName','Email','Password','Phone'];
protected $table = 'tbl_employees';
protected $primaryKey = 'employeeID';

}
