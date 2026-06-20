<style>
    /* Desain Tombol Floating */
    .chat-btn {
        position: fixed !important;
        bottom: 30px !important;
        right: 30px !important;
        width: 60px;
        height: 60px;
        background-color: #0044ff;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 68, 255, 0.4);
        z-index: 99998 !important;
        transition: transform 0.3s;
    }

    .chat-btn:hover {
        transform: scale(1.1);
    }

    /* Desain Jendela Chat Kotak Utama */
    .chat-window {
        position: fixed !important;
        bottom: 100px !important;
        right: 30px !important;
        width: 360px;
        height: 550px;
        background-color: #fcfcfc;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        z-index: 99999 !important;
        overflow: hidden;
        transform: scale(0);
        opacity: 0;
        transform-origin: bottom right;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        pointer-events: none;
    }

    .chat-window.active {
        transform: scale(1);
        opacity: 1;
        pointer-events: auto;
    }

    .chat-window.expanded {
        width: 480px;
        height: 80vh;
    }

    /* Header Gelap */
    .chat-header {
        background-color: #1e1e1e;
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-action {
        cursor: pointer;
        font-size: 24px;
        line-height: 1;
        color: #a0a0a0;
        transition: 0.2s;
    }

    .header-action:hover {
        color: white;
    }

    .header-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .avatar-status {
        position: relative;
    }

    .avatar-status img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
    }

    .status-dot {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 10px;
        height: 10px;
        background-color: #2ECC71;
        border: 2px solid #1e1e1e;
        border-radius: 50%;
    }

    .profile-name {
        font-weight: 600;
        font-size: 16px;
    }

    /* Body & Message */
    .chat-body {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        background-color: #f9f9fa;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .message-row {
        display: flex;
        width: 100%;
        align-items: flex-end;
        gap: 10px;
    }

    .message-row.user {
        justify-content: flex-end;
    }

    .message-row.bot {
        justify-content: flex-start;
    }

    .message-avatar {
        width: 35px;
        height: 35px;
        background-color: #f0f2f5;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #0044ff;
        flex-shrink: 0;
    }

    .message {
        max-width: 75%;
        padding: 12px 18px;
        font-size: 14.5px;
        line-height: 1.5;
        word-wrap: break-word;
    }

    .message.bot {
        background-color: #ffffff;
        color: #1e1e1e;
        border-radius: 20px 20px 20px 4px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        border: 1px solid #f0f0f0;
    }

    .message.user {
        background-color: #0044ff;
        color: white;
        border-radius: 20px 20px 4px 20px;
        box-shadow: 0 4px 15px rgba(0, 68, 255, 0.15);
    }

    /* Footer / Area Input */
    .chat-footer {
        padding: 15px 20px;
        background-color: white;
        display: flex;
        align-items: center;
    }

    .input-wrapper {
        display: flex;
        align-items: center;
        width: 100%;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 30px;
        padding: 5px 15px;
    }

    .input-wrapper input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 10px 0;
        outline: none;
        font-size: 14px;
    }

    .send-icon {
        background: transparent;
        border: none;
        color: #1e1e1e;
        font-size: 20px;
        cursor: pointer;
        padding: 0;
        margin-left: 10px;
        transition: 0.2s;
        display: flex;
        align-items: center;
    }

    .send-icon:hover {
        color: #0044ff;
    }

    /* Animasi Typing & Source Badge */
    .typing-indicator {
        display: flex;
        gap: 5px;
        padding: 15px;
        background-color: #ffffff;
        border-radius: 20px 20px 20px 4px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        border: 1px solid #f0f0f0;
        align-self: flex-start;
        width: fit-content;
    }

    .typing-indicator span {
        width: 8px;
        height: 8px;
        background-color: #a0a0a0;
        border-radius: 50%;
        animation: typing 1.4s infinite ease-in-out both;
    }

    .typing-indicator span:nth-child(1) {
        animation-delay: -0.32s;
    }

    .typing-indicator span:nth-child(2) {
        animation-delay: -0.16s;
    }

    @keyframes typing {

        0%,
        80%,
        100% {
            transform: scale(0);
            opacity: 0.5;
        }

        40% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .source-badge {
        font-size: 11.5px;
        background: #f0f2f5;
        padding: 4px 10px;
        border-radius: 6px;
        margin-top: 8px;
        display: inline-block;
        color: #495057;
        font-weight: 600;
        border: 1px solid #e9ecef;
    }

    /* Gate "wajib login" untuk chatbot (mode pengumpulan data UAT) */
    .chat-login-required {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        text-align: center;
        padding: 14px 16px;
        width: 100%;
        color: #495057;
        font-size: 14px;
    }
    .chat-login-required i {
        font-size: 22px;
        color: #0044ff;
    }
    .chat-login-btn {
        background-color: #0044ff;
        color: #fff !important;
        padding: 8px 18px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: background-color .2s;
    }
    .chat-login-btn:hover {
        background-color: #0033cc;
    }

    /* Kartu rekomendasi produk (horizontal scrollable) */
    .rec-cards {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        padding: 8px 2px 4px;
        margin-top: 8px;
        -webkit-overflow-scrolling: touch;
    }
    .rec-cards::-webkit-scrollbar { height: 6px; }
    .rec-cards::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    .rec-card {
        flex: 0 0 auto;
        width: 118px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
        text-decoration: none;
        color: #1f2937;
        transition: box-shadow .15s, transform .15s;
    }
    .rec-card:hover { box-shadow: 0 6px 16px rgba(0,0,0,.14); transform: translateY(-2px); }
    .rec-card img {
        width: 100%;
        height: 90px;
        object-fit: contain;
        background: #f8f9fa;
        display: block;
    }
    .rec-card-name {
        font-size: 11px;
        font-weight: 600;
        line-height: 1.3;
        padding: 6px 7px 0;
        max-height: 43px;
        overflow: hidden;
    }
    .rec-card-price {
        font-size: 12px;
        font-weight: 700;
        color: #0044ff;
        padding: 3px 7px 9px;
    }
</style>
