<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'view_name',
        'cpf',
        'cnpj',
        'date_birth',
        'telephone',
        'type_person_id',
        'active',
        'is_admin',
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relations
    public function vehicle(){
        return $this->hasMany(VehicleModel::class);
    }

    public function immobile(){
        return $this->hasMany(ImmobileModel::class);
    }

    public function bid(){
        return $this->hasMany(BidModel::class);
    }
    
    public function auction_item(){
        return $this->hasMany(AuctionItemModel::class);
    }
    
}
