<?php

namespace Cloudladder\Http\Metadata;

// 认证头
final class Auth implements MetadataInterface
{
    const KEY = "x-auth-header";

    public static function getKey(): string
    {
        return self::KEY;
    }

    public static function getValue(): string
    {
        if (function_exists("request")) {
            return request()->header(self::KEY) ?: "";
        }

        return "";
    }


}
