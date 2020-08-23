<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){ // Un post pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function category(){ // Un post pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    public function comments(){ // Un post tiene muchos comentarios
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function image(){ // Tiene una imagen
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(){ // Un post puede tener muchas etiquetas y una etiqueta puede tener muchos posts
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
