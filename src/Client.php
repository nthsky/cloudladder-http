<?php

namespace Cloudladder\Http;

use Cloudladder\Http\Metadata\MetadataManager;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\RequestOptions;

class Client extends GuzzleHttpClient
{
    public function __construct(array $config = [])
    {
        // metadata
        $config[RequestOptions::HEADERS] = $this->passMetaData($config[RequestOptions::HEADERS] ?? []);
        // user-agent
        $config[RequestOptions::HEADERS] = $this->setUserAgent($config[RequestOptions::HEADERS] ?? []);
        parent::__construct($config);
    }

    // 透传metadata
    protected function passMetaData(array $header): array
    {
        $allMetadata = MetadataManager::getAllMetadata();
        foreach($allMetadata as $key => $value) {
            if (!empty($value)) {
                $header[$key] = $value;
            }
        }

        return $header;
    }

    private function setUserAgent(array $header): array
    {
        $header['User-Agent'] = "Cloudladder/Http";

        return $header;
    }

}
