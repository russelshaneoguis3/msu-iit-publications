<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory; // Use this trait for factory methods

    protected $table = 'publications'; // Specify the table name if it's different from the default
    protected $primaryKey = 'p_id'; // Specify the primary key

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'p_user_id', 
        'research_title',
        'keywords',

        'research_type',
        'authors',
        'coauthors',
        'objectives',
        'beneficiaries',
        'date_duration',
        'date_started',
        'date_completed',
        'cost',
        'funding_source',
        'publication_date',
        'publication_title',
        'editors',
        'publisher',
        'vol_issue_no',
        'no_pages',
        'publication_type',
        'issn_isbn',
        'press_release',
        
        'p_file_path',
        'p_link',
    ];

    // Optional: Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'p_user_id', 'uid'); // Assuming 'uid' is the primary key in the User model
    }

    // Optional: You can add other methods related to your business logic
}
