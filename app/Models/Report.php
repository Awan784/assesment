<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table="reports";
    protected $fillable=[
        'title',
        'description'
    ];
    public function reports(){
        return $this->hasMany(ReportHasUser::class,'reports_id');
    }
}
