<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class AuditLogMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check() && $this->isAdminRoute($request)) {
            AuditLog::create([
                'user_id' => Auth::id(),
                'route_name' => $request->route()?->getName() ?? 'unnamed',
                'http_method' => $request->method(),
                'url' => $request->fullUrl(),
                'ip_masked' => $this->maskIP($request->ip()),
                'payload_summary' => json_encode($this->summarizePayload($request)),
            ]);
        }

        return $response;
    }

    protected function isAdminRoute(Request $request): bool
    {
        return $request->is('admin/*') || $request->is('dashboard');
    }

    protected function maskIP(?string $ip): string
    {
        if (!$ip) return 'unknown';
        return preg_replace('/(\.\d+){2}$/', '.xxx.xxx', $ip);
    }

    protected function summarizePayload(Request $request): array
    {
        // Hapus field sensitif dari log
        $safe = $request->except(['password', '_token', 'password_confirmation']);
        return array_map(fn($v) => is_array($v) ? '[array]' : mb_substr(is_scalar($v) ? (string) $v : '', 0, 50), $safe);
    }
}
