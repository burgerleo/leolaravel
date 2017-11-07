<?php
namespace App\Transformer;

class LessonTransformer extends Transformer
{

    public function transform($Lessons){
        return[
            'title' => $Lessons['title'],
            'content' => $Lessons['body'],
            'is_free' => (Boolean)$Lessons['free']
        ];
    }
}

