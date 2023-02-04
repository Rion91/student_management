<?php

namespace App\Data\Models;

use App\Models\User;
use App\Traits\BasicAudit;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes, BasicAudit, SnowflakeID;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'mobile_number',
        'identity_type',
        'identity_number',
        'gender',
        'nationality',
        'academic_field',
        'contact_person',
        'contact_number',
        'address',
        'status',
        'avatar',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => optional($this->user)->avatar->url,
            set: fn ($value) => $value ? $value->url : 'https://ui-avatars.com/api/?name='.$this->user->name
        );
    }*/
}
