import { createApp } from 'vue';
import App from '@/App.vue';
import { createPinia } from 'pinia';
import piniaPluginPersistedState from 'pinia-plugin-persistedstate';
import primeVue from 'primevue/config';
import primeVueTheme from '@/plugins/primevue';
import ToastService from 'primevue/toastservice';
import Tooltip from 'primevue/tooltip';

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import '@/plugins/icons';

import router from '@/plugins/router';

import '@/assets/css/app.css';

const app = createApp(App);

const pinia = createPinia();

pinia.use(piniaPluginPersistedState);

app.use(pinia)
  .use(primeVue, { unstyled: true, pt: primeVueTheme })
  .use(ToastService)
  .use(router)
	.directive('tooltip', Tooltip)
  .component('font-awesome-icon', FontAwesomeIcon)
  .mount('#app');
