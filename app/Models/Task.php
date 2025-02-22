<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'category_id'];
    protected $casts = ['due_date' => 'datetime',];
    

    // Определите связь с моделью Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
