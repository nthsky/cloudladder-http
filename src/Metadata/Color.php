<?php

namespace Cloudladder\Http\Metadata;

// 染色
final class Color implements MetadataInterface
{
    const KEY = "x1-gp-color";

    const ENV_KEY = "CLOUDLADDER_DEPLOY_ENV";

    public static function getKey(): string
    {
        return self::KEY;
    }

    public static function getValue(): string
    {
        // 从request取
        if (function_exists("request")) {
            $hv = request()->header(self::KEY);
            if (!empty($hv)) {
                return $hv;
            }
        }

        // 从系统env取
        return getenv(self::ENV_KEY) ?: "";
    }
}
