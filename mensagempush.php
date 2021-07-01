<?php
function enviarToken($r, $t, $m)
    {
    // API access key from Google API's Console
        if (!defined('API_ACCESS_KEY')) define( 'API_ACCESS_KEY', 'SUA API KEY' );
        $tokenarray = array($r);
        // prep the bundle
        $msg = array
        (
            'title'     => $t,
            'message'     => $m,
            'vibrate'   => true,
             'body'  => $m,
             'image' => "https://www.ifsudestemg.edu.br/cataguases/galeria-de-fotos-o-campus/10-alunos.jpg/@@images/ab37bb49-c15c-4b24-a088-4bdae62abd8e.jpeg",
            'force_show_in_foreground'=> true,
            'sound'     => 1

        );
        $fields = array
        (
            'registration_ids'     => $tokenarray,
            'data'            => $msg,
            'notification'          => $msg,
            'badge'            => 2
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        echo $result;
        curl_close( $ch );
        
    }


function enviarTopico($top, $t, $m)
    {
    // API access key from Google API's Console
        if (!defined('API_ACCESS_KEY')) define( 'API_ACCESS_KEY', 'SUA API KEY' );

        // prep the bundle
        $msg = array
        (
            'title'     => $t,
            'message'     => $m,
            'vibrate'   => true,
             'body'  => $m,
             'image' => "https://www.ifsudestemg.edu.br/cataguases/galeria-de-fotos-o-campus/10-alunos.jpg/@@images/ab37bb49-c15c-4b24-a088-4bdae62abd8e.jpeg",
            'force_show_in_foreground'=> true,
            'sound'     => 1

        );
        $fields = array
        (
            'to'  =>$top,
            'data'            => $msg,
            'notification'          => $msg,
            'badge'            => 2
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        echo $result;
        curl_close( $ch );
        
    }



//enviarToken("TOKEN DO SEU CELULAR", "Titulo envio por token", "Olá Galera!");

enviarTopico("/topics/topicotodos","Enviando msg para o topicotodos", "finalizamos o estudo!");
?>