import { createApp } from 'vue';
import Broadcaster from './components/Broadcaster.vue';
import Viewer from './components/Viewer.vue';

const app = createApp({});
app.component('broadcaster', Broadcaster);
app.component('viewer', Viewer);

app.mount('#app');
