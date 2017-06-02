<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Plugin\History\HistoryPlugin;

class Request
{
    private static $ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)';

    public static function get(string $url, string $ref=null) : array
    {
        if(!is_string($url) || strlen($url) == 0)
        {
            return
            [
                'status'    =>  400,
                'type'      =>  null,
                'body'      =>  null
            ];
        }

        $ref = $url;

        $client = new Client(['verify' => false]);
        try
        {
            $response = $client->request
            (
                'GET',
                $url,
                [
                    'headers'   =>
                    [
                        'User-Agent'    =>  Request::$ua,
                        'Referer'       =>  $ref
                    ],
                    'timeout'   =>  5
                ]
            );

            return
            [
                'status'    =>  $response->getStatusCode(),
                'type'      =>  $response->getHeader('Content-Type'),
                'body'      =>  $response->getBody()
            ];
        }
        catch(\Error $e)
        {
            return
            [
                'status'    =>  500,
                'type'      =>  null,
                'body'      =>  null
            ];
        }
        catch(\Exception $e)
        {
            return
            [
                'status'    =>  500,
                'type'      =>  null,
                'body'      =>  null
            ];
        }
        catch(\Throwable $t)
        {
            return
            [
                'status'    =>  500,
                'type'      =>  null,
                'body'      =>  null
            ];
        }
    }

    public static function post(string $url, string $ref=null) : array
    {
        if(!is_string($url) || strlen($url) == 0)
        {
            return
            [
                'status'    =>  400,
                'type'      =>  null,
                'body'      =>  null
            ];
        }

        $ref = $url;

        $client = new Client(['verify' => false]);
        try
        {
            $response = $client->request
            (
                'POST',
                $url,
                [
                    'headers'   =>
                    [
                        'User-Agent'    =>  Request::$ua,
                        'Referer'       =>  $ref
                    ],
                    'timeout'   =>  5
                ]
            );

            return
            [
                'status'    =>  $response->getStatusCode(),
                'type'      =>  $response->getHeader('Content-Type'),
                'body'      =>  $response->getBody()
            ];
        }
        catch(\Error $e)
        {
            return
            [
                'status'    =>  500,
                'type'      =>  null,
                'body'      =>  null
            ];
        }
        catch(\Exception $e)
        {
            return
            [
                'status'    =>  500,
                'type'      =>  null,
                'body'      =>  null
            ];
        }
        catch(\Throwable $t)
        {
            return
            [
                'status'    =>  500,
                'type'      =>  null,
                'body'      =>  null
            ];
        }
    }
}
