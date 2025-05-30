import { ref } from 'vue';

export const isChatbotVisible = ref(false);
export function showChatbot() {
    isChatbotVisible.value = true;
    //console.log('VALOR:'+isChatbotVisible.value);
    window.dispatchEvent(new CustomEvent('show-chatbot'));
}

export function hideChatbot() {
    isChatbotVisible.value = false;
    //console.log('VALOR:'+isChatbotVisible.value);
    window.dispatchEvent(new CustomEvent('hide-chatbot'));
}
