<?php

namespace Cloudladder\Http\Metadata;

final class MetadataManager
{
    /**
     * @var MetadataInterface::class[]
     */
    const MetadataClasses = [
        Auth::class,
        Color::class,
        Trace::class,
    ];

    public static function getAllMetadata(): array
    {
        $result = [];
        foreach(self::MetadataClasses as $mc) {
            /* @var MetadataInterface $mc */
            $result[call_user_func([$mc, "getKey"])] = call_user_func([$mc, "getValue"]);
        }

        return $result;
    }

}
