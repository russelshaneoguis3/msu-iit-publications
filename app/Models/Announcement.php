<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory; // Use this trait for factory methods

    protected $table = 'announcements'; // Specify the table name if it's different from the default
    protected $primaryKey = 'a_id'; // Specify the primary key

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        
        'title',
        'description',

    ];

}
