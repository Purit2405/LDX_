<!DOCTYPE html>

<html lang="th">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<meta
    name="robots"
    content="noindex, nofollow"
>

<title>Admin Login | LDX Elevator</title>

<style>

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;

        background:
            linear-gradient(
                135deg,
                #f4f6f8 0%,
                #e9edf1 100%
            );

        font-family:
            "Segoe UI",
            Tahoma,
            Arial,
            sans-serif;

        color: #1f2937;
    }

    .login-wrapper {
        width: 100%;
        max-width: 440px;
    }

    .login-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;

        padding: 42px;

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .brand {
        text-align: center;
        margin-bottom: 32px;
    }

    .brand-logo {
        width: 64px;
        height: 64px;

        margin: 0 auto 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #111827;
        color: #ffffff;

        border-radius: 12px;

        font-size: 24px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .brand h1 {
        font-size: 24px;
        font-weight: 700;
        color: #111827;
    }

    .brand p {
        margin-top: 6px;

        font-size: 13px;
        color: #6b7280;
    }

    .divider {
        height: 1px;
        background: #e5e7eb;

        margin: 0 0 28px;
    }

    .login-title {
        margin-bottom: 24px;
    }

    .login-title h2 {
        font-size: 20px;
        font-weight: 600;
        color: #111827;
    }

    .login-title p {
        margin-top: 6px;

        font-size: 13px;
        line-height: 1.6;

        color: #6b7280;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;

        margin-bottom: 8px;

        font-size: 14px;
        font-weight: 600;

        color: #374151;
    }

    .form-control {
        width: 100%;

        height: 46px;

        padding: 0 14px;

        border: 1px solid #d1d5db;
        border-radius: 8px;

        background: #ffffff;

        font-size: 14px;
        color: #111827;

        outline: none;

        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .form-control:focus {
        border-color: #374151;

        box-shadow:
            0 0 0 3px rgba(55, 65, 81, 0.1);
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .error-box {
        margin-bottom: 20px;

        padding: 12px 14px;

        border: 1px solid #fecaca;
        border-radius: 8px;

        background: #fef2f2;

        color: #b91c1c;

        font-size: 13px;
        line-height: 1.5;
    }

    .login-button {
        width: 100%;
        height: 46px;

        border: none;
        border-radius: 8px;

        background: #111827;
        color: #ffffff;

        font-size: 14px;
        font-weight: 600;

        cursor: pointer;

        transition:
            background 0.2s ease,
            transform 0.1s ease;
    }

    .login-button:hover {
        background: #1f2937;
    }

    .login-button:active {
        transform: translateY(1px);
    }

    .security-note {
        margin-top: 24px;

        padding-top: 20px;

        border-top: 1px solid #e5e7eb;

        text-align: center;

        font-size: 12px;
        line-height: 1.6;

        color: #9ca3af;
    }

    .footer {
        margin-top: 20px;

        text-align: center;

        font-size: 12px;
        color: #9ca3af;
    }

    @media (max-width: 480px) {

        body {
            padding: 16px;
        }

        .login-card {
            padding: 30px 24px;
        }

        .brand h1 {
            font-size: 21px;
        }

    }

</style>

</head>

<body>

<div class="login-wrapper">

<div class="login-card">

    {{-- Brand --}}
    <div class="brand">

        <div class="brand-logo">
            LDX
        </div>

        <h1>
            LDX Elevator
        </h1>

        <p>
            Administration System
        </p>

    </div>


    <div class="divider"></div>


    {{-- Login Title --}}
    <div class="login-title">

        <h2>
            Administrator Login
        </h2>

        <p>
            กรุณาเข้าสู่ระบบเพื่อจัดการเว็บไซต์ LDX Elevator
        </p>

    </div>


    {{-- Error --}}
    @if ($errors->any())

        <div class="error-box">

            {{ $errors->first() }}

        </div>

    @endif


    {{-- Login Form --}}
    <form
        method="POST"
        action="{{ route('admin.login.submit') }}"
    >

        @csrf


        {{-- Email --}}
        <div class="form-group">

            <label for="email">
                Email Address
            </label>

            <input
                id="email"
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="admin@example.com"
                autocomplete="email"
                required
                autofocus
            >

        </div>


        {{-- Password --}}
        <div class="form-group">

            <label for="password">
                Password
            </label>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter your password"
                autocomplete="current-password"
                required
            >

        </div>


        {{-- Submit --}}
        <button
            type="submit"
            class="login-button"
        >
            Sign In
        </button>

    </form>


    {{-- Security --}}
    <div class="security-note">

        This area is restricted to authorized administrators only.

    </div>

</div>


{{-- Footer --}}
<div class="footer">

    © {{ date('Y') }} LDX Elevator. All rights reserved.

</div>


</div>

</body>

</html>
