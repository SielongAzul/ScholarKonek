<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScholarshipApplication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'graduated_at',
        'schoolyear_start',
        'schoolyear_finish',
        'grade',
        'age',
        'address',
        'contactnumber',
        'emailadd',
        'grades_doc',
        'itr_doc',
        'letter_doc',
        'birthcert_doc',
        'others_doc',
        'photo_img',
        'user_id', 
        'scholarship_id'
    ];

    public function scholarship(): BelongsTo
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
