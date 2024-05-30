import { createApp } from 'vue';
import App from '@/App.vue';
import { createPinia } from 'pinia';
import piniaPluginPersistedState from 'pinia-plugin-persistedstate';
import primeVue from 'primevue/config';
import primeVueTheme from '@/plugins/primevue';

import router from '@/plugins/router';

import '@/assets/css/app.css';

const app = createApp(App);

const pinia = createPinia();

pinia.use(piniaPluginPersistedState);

app.use(pinia)
    .use(primeVue, { unstyled: true, pt: primeVueTheme })
    .use(router)
    .mount('#app');
