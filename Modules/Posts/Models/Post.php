<?php

namespace Modules\Posts\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return new PostFactory();
    }
}
