<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user(){ // Un video pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function category(){ // Un video pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    public function comments(){ // Un video tiene muchos comentarios
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function image(){ // un video tiene una imagen
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(){ // Un video puede tener muchas etiquetas y una etiqueta puede tener muchos posts
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
