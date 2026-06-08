<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — {{ $shop->name_shop ?? 'Toko' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            background: #f8f6f3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .auth-wrapper {
            display: flex;
            width: 100%;
            max-width: 960px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,.10);
        }

        /* ── Sisi kiri (dekorasi) ── */
        .auth-left-deco {
            flex: 1;
            background: #111;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2.5rem;
            color: #fff;
            text-align: center;
        }
        .auth-left-deco .deco-icon { font-size: 5rem; margin-bottom: 1.5rem; opacity: .85; }
        .auth-left-deco h2 { font-size: 1.7rem; font-weight: 800; margin-bottom: .75rem; line-height: 1.3; }
        .auth-left-deco p { font-size: .95rem; opacity: .6; line-height: 1.7; }
        .auth-left-deco .deco-dots { display: flex; gap: .4rem; margin-top: 2rem; }
        .auth-left-deco .deco-dots span { width: 8px; height: 8px; border-radius: 50%; background: rgba(255,255,255,.25); }
        .auth-left-deco .deco-dots span.active { background: #fff; width: 24px; border-radius: 4px; }

        /* ── Sisi kanan (form) ── */
        .auth-right-form {
            flex: 1;
            padding: 2.75rem 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }

        .auth-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            margin-bottom: 2rem;
            text-decoration: none;
            color: #111;
        }
        .auth-brand img { height: 36px; object-fit: contain; }
        .auth-brand span { font-size: 1.2rem; font-weight: 800; letter-spacing: .5px; }

        .auth-title { font-size: 2rem; font-weight: 800; color: #111; margin-bottom: .4rem; }
        .auth-subtitle { font-size: .95rem; color: #888; margin-bottom: 1.75rem; }
        .auth-subtitle a { color: #111; font-weight: 700; text-decoration: none; }
        .auth-subtitle a:hover { text-decoration: underline; }

        /* 2 kolom */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .9rem;
        }

        .form-group { position: relative; margin-bottom: .9rem; }
        .form-group label { display: block; font-size: .83rem; font-weight: 700; color: #444; margin-bottom: .35rem; }
        .form-group.full { grid-column: 1 / -1; }

        .input-wrap { position: relative; }
        .input-wrap i { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #aaa; font-size: 1rem; }
        .input-wrap input {
            width: 100%;
            padding: .72rem 1rem .72rem 2.8rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 10px;
            font-family: inherit;
            font-size: .92rem;
            color: #222;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
            background: #fafafa;
        }
        .input-wrap input:focus { border-color: #111; background: #fff; box-shadow: 0 0 0 3px rgba(17,17,17,.08); }
        .input-wrap input.is-invalid { border-color: #e74c3c; }
        .invalid-msg { font-size: .78rem; color: #e74c3c; margin-top: .25rem; }

        .hint { font-size: .78rem; color: #aaa; margin-top: .25rem; }

        .btn-submit {
            width: 100%;
            padding: .85rem;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: .75rem;
            transition: background .2s, transform .1s;
        }
        .btn-submit:hover { background: #333; }
        .btn-submit:active { transform: scale(.98); }

        .auth-switch { text-align: center; margin-top: 1.25rem; font-size: .9rem; color: #777; }
        .auth-switch a { color: #111; font-weight: 700; text-decoration: none; }
        .auth-switch a:hover { text-decoration: underline; }

        @media (max-width: 640px) {
            .auth-left-deco { display: none; }
            .auth-right-form { padding: 2.5rem 1.75rem; }
            .form-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="auth-wrapper">

    {{-- ── Kiri: Dekorasi ── --}}
    <div class="auth-left-deco">
        <div class="deco-icon">🎉</div>
        <h2>Bergabung sekarang<br>& dapatkan akses penuh</h2>
        <p>Daftar gratis dan nikmati<br>pengalaman berbelanja yang lebih<br>mudah & menyenangkan.</p>
        <div class="deco-dots">
            <span></span>
            <span class="active"></span>
            <span></span>
        </div>
    </div>

    {{-- ── Kanan: Form Registrasi ── --}}
    <div class="auth-right-form">
        <a href="{{ route('clientHome') }}" class="auth-brand">
            @if($shop && $shop->path)
                <img src="{{ asset('shop/' . $shop->path) }}" alt="{{ $shop->name_shop }}">
            @endif
            <span>{{ $shop->name_shop ?? 'Toko' }}</span>
        </a>

        <h1 class="auth-title">Buat Akun</h1>
        <p class="auth-subtitle">Sudah punya akun? <a href="{{ route('clientLoginPage') }}">Masuk di sini</a></p>

        <form method="POST" action="{{ route('clientRegisterPost') }}">
            @csrf

            <div class="form-row">
                {{-- Username --}}
                <div class="form-group">
                    <label for="name">Username</label>
                    <div class="input-wrap">
                        <i class="bi bi-at"></i>
                        <input
                            id="name" type="text" name="name"
                            value="{{ old('name') }}"
                            placeholder="username_kamu"
                            autocomplete="username" autofocus
                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                        >
                    </div>
                    @error('name') <div class="invalid-msg">{{ $message }}</div> @enderror
                    @if(!$errors->has('name')) <div class="hint">Dipakai untuk tampilan publik</div> @endif
                </div>

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label for="full_name">Nama Lengkap</label>
                    <div class="input-wrap">
                        <i class="bi bi-person"></i>
                        <input
                            id="full_name" type="text" name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="Nama sesuai KTP"
                            class="{{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                        >
                    </div>
                    @error('full_name') <div class="invalid-msg">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrap">
                    <i class="bi bi-envelope"></i>
                    <input
                        id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        autocomplete="email"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    >
                </div>
                @error('email') <div class="invalid-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-row">
                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock"></i>
                        <input
                            id="password" type="password" name="password"
                            placeholder="Min. 8 karakter"
                            autocomplete="new-password"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                        >
                    </div>
                    @error('password') <div class="invalid-msg">{{ $message }}</div> @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock-fill"></i>
                        <input
                            id="password_confirmation" type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                        >
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">Buat Akun</button>
        </form>

        <div class="auth-switch">
            Sudah punya akun? <a href="{{ route('clientLoginPage') }}">Masuk di sini</a>
        </div>
    </div>

</div>
</body>
</html>