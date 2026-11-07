<?php

namespace App\Services;

use App\Models\Pixel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacebookApiService
{
    public function sendPageView(Request $request, string $eventId): array
    {
        $pixel = Pixel::first();

        if (
            !$pixel ||
            !$pixel->facebook_pixel_enabled ||
            !$pixel->conversions_api_enabled ||
            !$pixel->facebook_pixel_id ||
            !$pixel->facebook_access_token
        ) {
            return ['success' => false, 'message' => 'API is disabled'];
        }

        $event = [
            'event_name' => 'PageView',
            'event_time' => time(),
            'event_id' => $eventId,
            'action_source' => 'website',
            'event_source_url' => $request->fullUrl(),

            'user_data' => array_filter([
                'client_ip_address' => $request->ip(),
                'client_user_agent' => $request->userAgent(),
                'fbp' => $request->cookie('_fbp'),
                'fbc' => $request->cookie('_fbc'),
            ]),
        ];

        try {
            $response = Http::timeout(5)->post(
                'https://graph.facebook.com/v26.0/' .
                $pixel->facebook_pixel_id .
                '/events?access_token=' .
                urlencode($pixel->facebook_access_token),
                [
                    'data' => [$event],
                ]
            );

            if (!$response->successful()) {
                Log::error('Facebook API Error', [
                    'status' => $response->status(),
                    'response' => $response->json(),
                ]);
            }

            return [
                'success' => $response->successful(),
                'response' => $response->json(),
            ];

        } catch (\Throwable $e) {

            Log::error('Facebook API Exception: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}