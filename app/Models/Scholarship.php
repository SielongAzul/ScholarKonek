<?php

namespace App\Models;

use App\Models\Scholarship;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'schoolname',
        'requirements',
        'location',
        'contactno',
        'category',
        'grants',
        'grade_needed',
        'monetary_value'
    ];

    public static array $category= [

        'Needs Scholarship',
        'Skills Scholarship',
        'Athelic Scholarship',
        'Employer Scholarship',
        'Student Specific Scholarship'

    ];

    public static array $grants= [

        'Full Scholarship',
        'Partial Scholarship',
        'Graduate Assistanship',
        'Need-based Scholarship',
        'Renewable Scholarship'


    ];

    public function scholarprovider(): BelongsTo
    {
        return $this->belongsTo(Scholarprovider::class);
    }

    public function scholarshipApplications(): HasMany
    {
        return $this->hasMany(ScholarshipApplication::class);
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool {

        return $this->where('id', $this->id)
        ->whereHas(
            'scholarshipApplications',
            fn($query) => $query->where('user_id', '=', $user->id ?? $user)
        )->exists();

    }



    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder{
        
        return $query->when($filters['search'] ?? null, function($query, $search){
            $query->where(function ($query) use($search){
                $query->where('title', 'like', '%'. $search . '%')
                ->orWhere('description', 'like', '%'. $search . '%')
                ->orWhereHas('scholarprovider', function ($query) use ($search) {
                    $query->where('provider_name', 'like', '%' . $search . '%');
                });
            });
        })->when($filters['min_money'] ?? null, function ($query, $minMoney){
            $query->where('monetary_value', '>=',  $minMoney);
        })->when($filters['min_money'] ?? null, function ($query,  $maxMoney){
            $query->where('monetary_value', '<=', $maxMoney);

        })->when($filters['category'] ?? null, function($query, $category){
            $query->where('category', $category);
        })->when($filters['grants'] ?? null, function($query, $grants){
            $query->where('grants', $grants);
        });

    }

    
}
