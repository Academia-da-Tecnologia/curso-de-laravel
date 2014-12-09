<?php

namespace app\acme;

use Mail;

class EmailAcme{

    public function enviarEmail( $view, $data ){
        Mail::send( $view, $data, function( $mail ) use( $data ) {
            $mail->from( $data['email'], $data['nome'] );
            $mail->to( $data['emailDestino'] );
            $mail->subject( $data['assunto'] );
        });
    }

}