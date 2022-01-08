<?php

class Response
{
    public static function send(bool $success, $data, $options = []) {

        $response = [
            "success" => $success,
            "data"    => $data,
            "options" => $options
        ];
        ob_clean();
        echo json_encode($response);
        exit();
    }
}