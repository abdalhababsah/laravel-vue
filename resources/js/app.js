import './bootstrap';
import '../css/app.css';
import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.min.js';
import 'element-plus/dist/index.css'
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import ElementPlus from 'element-plus';
import VueSweetalert2 from 'vue-sweetalert2';
import VueApexCharts from 'vue3-apexcharts';
import 'sweetalert2/dist/sweetalert2.min.css';
const appName = import.meta.env.VITE_APP_NAME || 'Shantaty';
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(ElementPlus)
            .use(VueSweetalert2)
            .use(VueApexCharts)
            .component('apexchart', VueApexCharts)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
