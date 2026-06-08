<script>
    const chatWindow = document.getElementById('chatWindow');
    const chatBody = document.getElementById('chatBody');
    const chatInput = document.getElementById('chatInput');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const STORAGE_KEY_HISTORY = 'gatoys_chat_history';
    const STORAGE_KEY_STATE = 'gatoys_chat_state';
    const STORAGE_KEY_SIZE = 'gatoys_chat_size';

    // 1. Inisialisasi History Tanpa Menggunakan Simbol yang Bikin Error
    let savedHistory = sessionStorage.getItem(STORAGE_KEY_HISTORY);
    let historyArray = [];

    if (savedHistory !== null) {
        historyArray = JSON.parse(savedHistory);
    } else {
        // Jika belum ada history, masukkan pesan sapaan default
        historyArray = [{
            role: 'bot',
            text: 'Halo! Saya Asisten AI dari GA Toys 👋<br>Ada yang bisa saya bantu terkait produk blind box atau figure hari ini?'
        }];
        sessionStorage.setItem(STORAGE_KEY_HISTORY, JSON.stringify(historyArray));
    }

    // 2. Load Status Buka/Tutup
    let chatState = sessionStorage.getItem(STORAGE_KEY_STATE);
    if (chatState === 'open') {
        chatWindow.classList.add('active');
    }

    // 3. Load Status Ukuran (Expanded/Normal)
    let chatSize = sessionStorage.getItem(STORAGE_KEY_SIZE);
    if (chatSize === 'expanded') {
        chatWindow.classList.add('expanded');
    }

    // 4. Render semua pesan yang ada di history ke layar
    function renderHistory() {
        chatBody.innerHTML = ''; // Bersihkan layar dulu
        for (let i = 0; i < historyArray.length; i++) {
            let msg = historyArray[i];
            appendMessageUI(msg.text, msg.role);
        }
    }

    // Panggil render saat halaman dimuat
    renderHistory();

    // --- FUNGSI-FUNGSI UTAMA ---

    function toggleChat() {
        chatWindow.classList.toggle('active');
        if (chatWindow.classList.contains('active')) {
            sessionStorage.setItem(STORAGE_KEY_STATE, 'open');
            if (chatInput) chatInput.focus();
        } else {
            sessionStorage.setItem(STORAGE_KEY_STATE, 'closed');
        }
    }

    function toggleSize() {
        chatWindow.classList.toggle('expanded');
        if (chatWindow.classList.contains('expanded')) {
            sessionStorage.setItem(STORAGE_KEY_SIZE, 'expanded');
        } else {
            sessionStorage.setItem(STORAGE_KEY_SIZE, 'normal');
        }
    }

    function handleKeyPress(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    }

    function scrollToBottom() {
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    // Fungsi khusus untuk menampilkan pesan di HTML
    function appendMessageUI(text, sender) {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'message-row ' + sender;

        let formattedText = text.replace(/\n/g, '<br>');
        formattedText = formattedText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

        if (sender === 'bot') {
            rowDiv.innerHTML = '<div class="message-avatar"><i class="bi bi-robot fs-5"></i></div><div class="message bot">' + formattedText + '</div>';
        } else {
            rowDiv.innerHTML = '<div class="message user">' + formattedText + '</div>';
        }

        chatBody.appendChild(rowDiv);
        scrollToBottom();
    }

    // Fungsi untuk menambah pesan ke Array lalu simpan ke SessionStorage
    function addAndSaveMessage(text, sender) {
        historyArray.push({
            role: sender,
            text: text
        });
        sessionStorage.setItem(STORAGE_KEY_HISTORY, JSON.stringify(historyArray));
    }

    function showTyping() {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'message-row bot typing-wrapper';
        rowDiv.id = 'typingIndicator';
        rowDiv.innerHTML = '<div class="message-avatar"><i class="bi bi-robot fs-5"></i></div><div class="typing-indicator"><span></span><span></span><span></span></div>';
        chatBody.appendChild(rowDiv);
        scrollToBottom();
    }

    function hideTyping() {
        const indicator = document.getElementById('typingIndicator');
        if (indicator) indicator.remove();
    }

    async function sendMessage() {
        const question = chatInput.value.trim();
        if (question === '') return;

        chatInput.value = '';

        // 1. Tampilkan di UI
        appendMessageUI(question, 'user');

        // 2. Simpan di Memori Browser
        addAndSaveMessage(question, 'user');

        showTyping();

        try {
            const response = await fetch('{{ route("clientChatbotSend") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    question: question
                })
            });

            const data = await response.json();
            hideTyping();

            if (response.ok) {
                let botReply = data.answer;

                if (data.sources && data.sources.length > 0) {
                    botReply += '<br><br>';
                    data.sources.forEach(src => {
                        if (src.type === 'product' && src.product_name) {
                            botReply += '<span class="source-badge"><i class="bi bi-box-seam"></i> ' + src.product_name + ' ($' + src.price + ')</span> ';
                        }
                    });
                }

                // 1. Tampilkan Balasan Bot di UI
                appendMessageUI(botReply, 'bot');

                // 2. Simpan Balasan Bot di Memori Browser
                addAndSaveMessage(botReply, 'bot');

            } else {
                appendMessageUI('Maaf, ' + (data.error || 'Terjadi kesalahan sistem.'), 'bot');
            }

        } catch (error) {
            hideTyping();
            appendMessageUI('Gagal menghubungi server AI. Pastikan server sedang berjalan.', 'bot');
        }
    }
</script>
