<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;

    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];


    /**
     * Получить родительскую категорию
     * 
     * @return BlogCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Пример аксессора (Accessor)
     * 
     * @url https://laravel.com/5.8/eloquent-mutators
     * 
     */ 
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot() 
            ? 'КОРЕНЬ' 
            : '???');   
        return $title;
    }

    public function isRoot()
    {
        return $this->id === self::ROOT;
    }

    /**
     * Пример аксессора (Accessor)
     * 
     */ 
    public function getTitleAttribute($valueFromObject)
    {
        return mb_strtoupper($valueFromObject);
    }

    /**
     * Пример мутатора (Mutator)
     * 
     */ 
    public function setTitleAttribute($incomingValue)
    {
        $this->attributes['title'] = mb_strtolower($incomingValue);
    }
}
