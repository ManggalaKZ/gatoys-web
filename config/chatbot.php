<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Wajib Login untuk Chatbot
    |--------------------------------------------------------------------------
    | Saat true, fitur chatbot HANYA bisa dipakai user yang sudah login.
    | Dipakai SEMENTARA selama pengumpulan data UAT agar setiap percakapan
    | terekam per responden (chat_logs.user_id).
    |
    | Setelah data cukup, set CHATBOT_REQUIRE_LOGIN=false di .env agar chatbot
    | kembali bisa diakses publik (guest) tanpa perlu ubah kode.
    */
    'require_login' => env('CHATBOT_REQUIRE_LOGIN', false),

    /*
    |--------------------------------------------------------------------------
    | URL Server Chatbot (FastAPI)
    |--------------------------------------------------------------------------
    */
    'api_url' => env('CHATBOT_API_URL', 'http://127.0.0.1:8001'),

];
