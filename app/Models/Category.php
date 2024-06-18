<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function posts(): HasMany
=======



class Category extends Model
{

    use HasFactory;

    public function posts()
>>>>>>> a434854402a4837457c54b3eade1dfd1bffd9b2e
    {
        return $this->hasMany(Post::class);
    }
}
