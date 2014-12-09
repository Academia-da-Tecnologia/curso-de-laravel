<?php

namespace app\acme;
use \app\models\site\PostModel as post;

class TagsAcme{

    private $tags = [];

    private function tagsToArray(){
        $postsCadastrados = post::all();

        foreach( $postsCadastrados as $post ){
            $this->tags[] = $post->tb_post_tags;
        }
        return $this->tags;
    }

    public function separarTags(){
        $tagsComVirgula = implode( ',', $this->tagsToArray() );
        $explodeTags = explode( ',', $tagsComVirgula );
        return array_count_values( $explodeTags );
    }

}