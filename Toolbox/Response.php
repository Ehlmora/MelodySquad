<?php

class Response
{
    public static function send(bool $success, $data) {

        $response = [
            "success" => $success,
            "data"    => $data
        ];
        ob_clean();
        echo json_encode($response);
        exit();

    }
}