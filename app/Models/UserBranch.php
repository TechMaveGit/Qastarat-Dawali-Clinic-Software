<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBranch extends Model
{

    use HasFactory;
    protected $table = "user_branchs";

    public function userBranchName() {
        return $this->belongsTo(Branch::class, 'add_branch','id');

    }

}
