<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasManyThrough(User::class,ProjectUser::class,'project_id','id','id','id');
    }

    public function instance()
    {
      return  $this->hasOne(Instance::class);
    }
}
