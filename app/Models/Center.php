<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Center extends Model
{
    use HasFactory; // Use this trait for factory methods

    protected $table = 'center'; // Specify the table name if it's different from the default
    protected $primaryKey = 'cid'; // Specify the primary key

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        
        'c_name',

    ];

}
