<?php

namespace app\acme;

class MessagesAcme{

	const REQUIRED = '<span class="text-danger">Esse campo é obrigatório</span>';
	const EMAIL = '<span class="text-danger">Digite um e-mail válido</span>';
	const UNIQUE = '<span class="text-danger">O :attribute já está sendo usado</span>';
	const IMAGE = '<span class="text-danger">A :attribute deve ser uma imagem</span>';
	const SAME = '<span class="text-danger">O campo :attribute e :other devem ser iguais</span>';

	public static function Messages(){
		return [
			'required' => self::REQUIRED,
			'email' => self::EMAIL,
			'unique' => self::UNIQUE,
			'image' => self::IMAGE,
			'same' => self::SAME
		];
	}


}