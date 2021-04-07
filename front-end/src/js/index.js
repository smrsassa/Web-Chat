const elemWrapperConversas = document.getElementById('wrapperConversas');
const elemWrapperChat = document.getElementById('wrapperChat');

elemWrapperConversas.innerHTML = loadPage('partials/conversas.html');
elemWrapperChat.innerHTML = loadPage('partials/chatArea.html');
