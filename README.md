# Cloudladder Http
> 继承自GuzzleHttp 的 Client，附加定制功能，仅用于laravel框架中
## 额外功能
1. 透传header头中的metadata至下游，目前透传的字段有
   1. x1-gp-color 染色
   2. x-gp-trace-id 链路追踪id
   3. x-auth-header 认证头

## 使用方法
> 同GuzzleHttp\Client
```php
use Cloudladder\Http\Client;

$client = new Client();
```
