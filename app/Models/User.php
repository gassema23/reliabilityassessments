<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Casts\FullName;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens , HasFactory , Notifiable , SoftDeletes , HasUuids;

    public $incrementing = false;
    public $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_name' ,
        'l_name' ,
        'p_number' ,
        'employe_id' ,
        'approved_at' ,
        'role_id' ,
        'team_id' ,
        'email' ,
        'password' ,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password' ,
        'remember_token' ,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime' ,
        'name' => FullName::class ,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Relationship to team
     */
    public function team()
    {
        return $this->belongsTo(Team::class)->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Relationship to Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class)->withTrashed();
    }

    /**
     * @return string|void
     * Redirect after login/register
     */
    public function getRedirectRouteName()
    {
        $roles = Role::find($this->role_id)->get();
        if($roles) {
            foreach ($roles as $role) {
                if (auth()->user()->role_id === $role->id) {
                    return strtolower($role->role_name).'.dashboard';
                }
            }
        }else{
            abort(404);
        }
    }
}
