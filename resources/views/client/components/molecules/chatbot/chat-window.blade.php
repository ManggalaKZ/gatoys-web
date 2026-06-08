<!-- Jendela Chat -->
<div class="chat-window" id="chatWindow">
    <div class="chat-header">
        <i class="bi bi-three-dots header-action" onclick="toggleSize()" title="Perbesar/Perkecil" style="font-size: 28px;"></i>
        <div class="header-profile">
            <div class="avatar-status">
                <img src="https://ui-avatars.com/api/?name=GA+Toys&background=ffffff&color=0044ff&rounded=true&bold=true" alt="Bot Avatar">
                <span class="status-dot"></span>
            </div>
            <span class="profile-name">GA Toys Assistant</span>
        </div>
        <i class="bi bi-dash-lg header-action" onclick="toggleChat()" title="Tutup" style="font-size: 32px; font-weight: bold;"></i>
    </div>
    <div class="chat-body" id="chatBody"></div>
    <div class="chat-footer">
        @if(config('chatbot.require_login') && auth()->guest())
            <div class="chat-login-required">
                <i class="bi bi-lock-fill"></i>
                <span>Silakan login dulu untuk ngobrol dengan Asisten AI.</span>
                <a href="{{ route('clientLoginPage') }}" class="chat-login-btn">Login Sekarang</a>
            </div>
        @else
            <div class="input-wrapper">
                <input type="text" id="chatInput" placeholder="Type a message..." autocomplete="off" onkeypress="handleKeyPress(event)">
                <button class="send-icon" onclick="sendMessage()" id="sendBtn">
                    <i class="bi bi-send"></i>
                </button>
            </div>
        @endif
    </div>
</div>
