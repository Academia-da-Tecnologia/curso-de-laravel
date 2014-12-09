<?php

namespace app\controllers\site;
use \app\models\site\PostModel as post;

class TagsController extends \BaseController {

	use \app\traits\LoadVariables;

	public function show($tag)
	{
		$this->loadVariables();

		$postsTag = post::busca( $tag );

		return \View::make('site.tags')->with(
            [
                'titulo' => 'Posts com a tag '.$tag,
                'categorias' => $this->categorias,
                'posts' => $this->posts,
                'maisComentados' => $this->maisComentados,
                'maisVistos' => $this->maisVistos,
                'tags' => $this->tags,
                'postsTags' => $postsTag->getCollection(),
                'links' => $postsTag->links(),
                'tag' => $tag,
                 'ultimosComentarios' => $this->ultimosComentarios,
                'i' => 1
            ]);

	}


}
