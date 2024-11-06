<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory; // Use this trait for factory methods

    protected $table = 'users'; // Specify the table name if it's different from the default
    protected $primaryKey = 'uid'; // Specify the primary key

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'uid', 
        'first_name',
        'last_name',
        'centerlab',
    ];

}