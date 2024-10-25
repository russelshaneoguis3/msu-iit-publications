<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Research extends Model
{
    use HasFactory; // Use this trait for factory methods

    protected $table = 'research'; // Specify the table name if it's different from the default
    protected $primaryKey = 'r_id'; // Specify the primary key

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'r_user_id', 
        'title',
        'description',
        'r_file_path',
        'r_link',
    ];

    // Optional: Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'r_user_id', 'uid'); // Assuming 'uid' is the primary key in the User model
    }

    // Optional: You can add other methods related to your business logic
}
