<?php

namespace Cloudladder\Http\Metadata;

interface MetadataInterface
{
    public static function getKey(): string;

    public static function getValue(): string;
}
