<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportHasUser extends Model
{
    use HasFactory;
    protected $table='reports_has_users';
    protected $fillable=[
        'reports_id',
        'users_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function report(){
        return $this->belongsTo(Report::class,'reports_id');
    }

}
