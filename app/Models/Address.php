<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'state',
        'city',
        'district',
        'street',
        'number',
        'complement',
        'postal_code'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'address_id', 'id');
    }
}
