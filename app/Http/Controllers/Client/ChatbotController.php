<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'question' => 'required|string'
        ]);

        // Gate: saat mode "wajib login" aktif, tolak guest (untuk pengumpulan data UAT).
        // Dikontrol oleh CHATBOT_REQUIRE_LOGIN di .env (lihat config/chatbot.php).
        if (config('chatbot.require_login') && !Auth::check()) {
            return response()->json([
                'error' => 'Silakan login terlebih dahulu untuk menggunakan chatbot.',
                'require_login' => true,
            ], 401);
        }

        try {
            // Session ID unik pengunjung (guest maupun user login)
            $sessionId = session()->getId();

            // ID user untuk atribusi data di chat_logs ('anonymous' jika guest/mode publik)
            $userId = Auth::check() ? (string) Auth::id() : 'anonymous';

            // Mengirim request ke server FastAPI
            $response = Http::timeout(30)->post(config('chatbot.api_url') . '/chat', [
                'question'   => $request->question,
                'user_id'    => $userId,
                'session_id' => $sessionId,
            ]);

            if ($response->successful()) {
                return response()->json($response->json(), 200);
            }

            return response()->json(['error' => 'Maaf, server AI sedang sibuk.'], 500);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal terhubung ke Chatbot Server.'], 500);
        }
    }
}
