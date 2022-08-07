<?php

namespace Cloudladder\Http;

class Metadata
{
    // 染色
    const ColorKey = "x1-gp-color";

    // 链路追踪id
    const TraceIdKey = "x-gp-trace-id";

    // 认证头
    const AuthKey = "x-auth-header";

    // 所有key
    const Keys = [
        self::ColorKey,
        self::TraceIdKey,
        self::AuthKey
    ];

}
