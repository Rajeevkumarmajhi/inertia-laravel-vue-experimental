import './bootstrap';

import { createApp, h } from 'vue'
import { Head, Link, createInertiaApp } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        // const pages = import.meta.glob('./Pages/**/*.vue')
        let page = pages[`./Pages/${name}.vue`];
        // page.default.layout = page.default.layout || Layout
        if(page.default.layout === undefined){
            page.default.layout = Layout;
        }
        return page;
        // return pages[`./Pages/${name}.vue`]()
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link',Link)
            .component('Head',Head)
            .mount(el)
    },

    title: title =>  "My App - " + title,
})