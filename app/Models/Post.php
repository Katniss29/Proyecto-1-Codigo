<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = [];
=======
    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
>>>>>>> a434854402a4837457c54b3eade1dfd1bffd9b2e

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
