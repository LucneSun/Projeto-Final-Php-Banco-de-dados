<?php
    date_default_timezone_set('America/Sao_Paulo');

    function uploadImg($file){

        switch($file['error']){
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'arquivo excedeu tamanho limite';
                exit;
            case UPLOAD_ERR_NO_FILE:
                echo 'arquivo não enviado';
                exit;
            default:
                echo 'erro desconhecido';
                exit;
        }

        if($file['size'] > 10000000){
            echo 'tamanho superior a 10mb';
        }

        $validTypes = array(
            'jpg' => 'image/jpeg',
             'jpeg' => 'image/jpeg',
              'png' => 'image/png'
            );

        if(!$ext = array_search($file['type'], $validTypes, true)){
            echo 'arquivo não encontrado';
        }

        $path = sprintf('.' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . '%s.%s', md5(date('Y.m.d-H.i.s.ms')), $ext);

        if(move_uploaded_file($file['tmp_name'], $path)){
            return substr($path, 2);
        }

        echo 'erro ao tentar efetuar upload';
    }

?>