const elemWrapperConversas = document.getElementById('wrapperConversas');
const elemWrapperChat = document.getElementById('wrapperChat');

elemWrapperConversas.innerHTML = loadPage('front-end/pages/partials/conversas.html');
elemWrapperChat.innerHTML = loadPage('front-end/pages/partials/chatArea.html');
