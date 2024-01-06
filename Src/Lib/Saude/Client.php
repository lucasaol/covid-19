<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Saude;

/**
 * Description of Client
 *
 * @author lucas
 */
class Client
{

    private $conn;

    const URI = 'https://xx9p7hp1p7.execute-api.us-east-1.amazonaws.com/prod/';

    public function __construct($token)
    {
        $this->openConnection($token);
    }

    private function openConnection($token): void
    {
        $this->conn = new \GuzzleHttp\Client([
            'base_uri' => self::URI,
            'timeout' => 2.0,
            'headers' => [
                'x-parse-application-id' => $token
            ]
        ]);
    }

    public function getStates(): array
    {
        $response = $this->conn->request('GET', 'PortalMapa');

        $data = $this->formatResponseBody($response);
        return $data->results;
    }

    public function getGeneral(): \stdClass
    {
        $response = $this->conn->request('GET', 'PortalGeral');

        $data = $this->formatResponseBody($response);
        return $data->results[0];
    }

    private function formatResponseBody(\Psr\Http\Message\ResponseInterface $response): \stdClass
    {
        $code = $response->getStatusCode();
        if ($code !== 200) {
            throw new \Exception('Unable to establish connection to host.', 502);
        }

        $body = $response->getBody();
        $content = $body->getContents();

        $data = json_decode($content);
        if (!isset($data->results) || !is_array($data->results)) {
            throw new \Exception('Invalid response json from host.', 400);
        }

        return $data;
    }

}
