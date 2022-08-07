<?php

namespace Cloudladder\Http;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\RequestOptions;

class Client extends GuzzleHttpClient
{
    public function __construct(array $config = [])
    {
        $config[RequestOptions::HEADERS] = $this->passMetaData($config[RequestOptions::HEADERS] ?? []);
        parent::__construct($config);
    }

    // 透传metadata
    protected function passMetaData(array $header): array
    {
        // 只考虑在laravel框架中使用
        if (!function_exists("request")) {
            return $header;
        }

        foreach(Metadata::Keys as  $metadataKey) {
           if (request()->hasHeader($metadataKey)) {
               $header[$metadataKey] = request()->header($metadataKey);
           }
        }

        return $header;
    }

}
