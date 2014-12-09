<?php

namespace app\acme;

use \app\acme\MessagesAcme as messages;
use Validator as validator;
use Input as input;
use Redirect as redirect;
use \app\models\site\AttributesValidateModel as attributes;

class ValidateAcme extends validator{

    private $validator;
    private $input;
    private $attribute = [];

    public function __construct(){
        $this->input = input::all();
    }

    private function nomesLegiveisErros(){
        $attributes = attributes::all();

        foreach( $attributes as $attribute ){
            $this->attribute[ $attribute->tb_attributes_validate_key ] = $attribute->tb_attributes_validate_value;
        }
        $this->validator->setAttributeNames( $this->attribute );
    }

    public function isValid( $rules, $nomesLegiveis = null ){

        $messages = messages::Messages();
        $this->validator = parent::make($this->input ,$rules,$messages);

        if( $nomesLegiveis != null ){
            $this->nomesLegiveisErros();
        }

        if( $this->validator->fails() ){
            return false;
        }

        return true;
    }

    public function errorsValidate( $pathRedirect ){
        $redirect = redirect::to( $pathRedirect );
        $redirect->withInput( $this->input );
        $redirect->withErrors($this->validator->messages());
        return $redirect;
    }

}