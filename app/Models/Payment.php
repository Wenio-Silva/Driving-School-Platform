<?php

namespace App\Models;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'amount',
        'date',
        'payment_method'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
