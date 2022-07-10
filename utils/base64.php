<?php
    function convertBase64($file){
        switch($file['error']){
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'arquivo excedeu tamanho limite';
                exit;
            case UPLOAD_ERR_NO_FILE:
                echo 'nenhum arquivo selecionado';
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

        if(!array_search($file['type'], $validTypes, true)){
            echo 'arquivo não é valido';
        }

        $base64 = base64_encode(file_get_contents($file['tmp_name']));
        return sprintf("data:%s;base64,%s", $file['type'], $base64);
    }

?>