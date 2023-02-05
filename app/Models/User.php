<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Data\Models\File;
use App\Data\Models\Student;
use App\Helpers\StringHelper;
use App\Traits\BasicAudit;
use App\Traits\HasAttachable;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SnowflakeID, HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions, SoftDeletes, BasicAudit, HasAttachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*protected $attachOne = [
        'avatar' => File::class,
    ];
    protected $appends = ['avatar'];*/

    protected function allowedPermissions(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getAllPermissions()->map(fn ($permission) => StringHelper::extractPermissionName($permission->name))
        );
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
            }
        });

        static::updating(function ($user) {
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
            }
        });
    }

    /*public function getAvatarAttribute()
    {
        return $this->avatar ? $this->avatar->url : 'https://ui-avatars.com/api/?name='.$this->name;
    }*/

    public function students(): HasOne
    {
        return $this->hasOne(Student::class);
    }
}
