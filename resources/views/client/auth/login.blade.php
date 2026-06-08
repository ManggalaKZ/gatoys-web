<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — {{ $shop->name_shop ?? 'Toko' }}</title>
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
            min-height: 560px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,.10);
        }

        /* ── Sisi kiri (form) ── */
        .auth-left {
            flex: 1;
            padding: 3rem 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            margin-bottom: 2.5rem;
            text-decoration: none;
            color: #111;
        }
        .auth-brand img {
            height: 36px;
            object-fit: contain;
        }
        .auth-brand span {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .auth-title {
            font-size: 2rem;
            font-weight: 800;
            color: #111;
            margin-bottom: .4rem;
        }
        .auth-subtitle {
            font-size: .95rem;
            color: #888;
            margin-bottom: 2rem;
        }

        /* Error global */
        .alert-error {
            background: #fff0f0;
            border: 1px solid #ffc2c2;
            color: #c0392b;
            padding: .75rem 1rem;
            border-radius: 10px;
            font-size: .88rem;
            margin-bottom: 1.25rem;
        }

        /* Form group */
        .form-group {
            position: relative;
            margin-bottom: 1.1rem;
        }
        .form-group label {
            display: block;
            font-size: .85rem;
            font-weight: 700;
            color: #444;
            margin-bottom: .4rem;
        }
        .input-wrap {
            position: relative;
        }
        .input-wrap i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1rem;
        }
        .input-wrap input {
            width: 100%;
            padding: .75rem 1rem .75rem 2.8rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 10px;
            font-family: inherit;
            font-size: .95rem;
            color: #222;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
            background: #fafafa;
        }
        .input-wrap input:focus {
            border-color: #111;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(17,17,17,.08);
        }
        .input-wrap input.is-invalid {
            border-color: #e74c3c;
        }
        .invalid-msg {
            font-size: .8rem;
            color: #e74c3c;
            margin-top: .3rem;
        }

        /* Remember + forgot */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: .88rem;
        }
        .form-footer label {
            display: flex;
            align-items: center;
            gap: .4rem;
            color: #555;
            cursor: pointer;
        }
        .form-footer a {
            color: #111;
            font-weight: 600;
            text-decoration: none;
        }
        .form-footer a:hover { text-decoration: underline; }

        /* Submit button */
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
            transition: background .2s, transform .1s;
        }
        .btn-submit:hover { background: #333; }
        .btn-submit:active { transform: scale(.98); }

        .auth-switch {
            text-align: center;
            margin-top: 1.5rem;
            font-size: .9rem;
            color: #777;
        }
        .auth-switch a {
            color: #111;
            font-weight: 700;
            text-decoration: none;
        }
        .auth-switch a:hover { text-decoration: underline; }

        /* ── Sisi kanan (dekorasi) ── */
        .auth-right {
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
        .auth-right .deco-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: .85;
        }
        .auth-right h2 {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: .75rem;
            line-height: 1.3;
        }
        .auth-right p {
            font-size: .95rem;
            opacity: .6;
            line-height: 1.7;
        }
        .auth-right .deco-dots {
            display: flex;
            gap: .4rem;
            margin-top: 2rem;
        }
        .auth-right .deco-dots span {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,.25);
        }
        .auth-right .deco-dots span.active {
            background: #fff;
            width: 24px;
            border-radius: 4px;
        }

        @media (max-width: 640px) {
            .auth-right { display: none; }
            .auth-left { padding: 2.5rem 1.75rem; }
        }
    </style>
</head>
<body>
<div class="auth-wrapper">

    {{-- ── Kiri: Form Login ── --}}
    <div class="auth-left">
        <a href="{{ route('clientHome') }}" class="auth-brand">
            @if($shop && $shop->path)
                <img src="{{ asset('shop/' . $shop->path) }}" alt="{{ $shop->name_shop }}">
            @endif
            <span>{{ $shop->name_shop ?? 'Toko' }}</span>
        </a>

        <h1 class="auth-title">Masuk</h1>
        <p class="auth-subtitle">Belum punya akun? <a href="{{ route('clientRegisterPage') }}" style="color:#111;font-weight:700;">Daftar sekarang</a></p>

        @if($errors->has('email') && !$errors->has('name') && !$errors->has('full_name'))
            <div class="alert-error">
                <i class="bi bi-exclamation-circle me-1"></i>
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('clientLoginPost') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrap">
                    <i class="bi bi-envelope"></i>
                    <input
                        id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        autocomplete="email" autofocus
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    >
                </div>
                @error('email') <div class="invalid-msg">{{ $message }}</div> @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <i class="bi bi-lock"></i>
                    <input
                        id="password" type="password" name="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    >
                </div>
                @error('password') <div class="invalid-msg">{{ $message }}</div> @enderror
            </div>

            {{-- Remember --}}
            <div class="form-footer">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Ingat saya
                </label>
            </div>

            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <div class="auth-switch">
            Belum punya akun? <a href="{{ route('clientRegisterPage') }}">Daftar di sini</a>
        </div>
    </div>

    {{-- ── Kanan: Dekorasi ── --}}
    <div class="auth-right">
        <div class="deco-icon">🛍️</div>
        <h2>Belanja lebih<br>mudah & menyenangkan</h2>
        <p>Login untuk melacak pesananmu,<br>simpan favorit, dan nikmati pengalaman<br>belanja yang lebih personal.</p>
        <div class="deco-dots">
            <span class="active"></span>
            <span></span>
            <span></span>
        </div>
    </div>

</div>
</body>
</html>