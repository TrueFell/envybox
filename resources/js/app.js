require('./bootstrap');


window.Vue = require('vue');
import VueRouter from 'vue-router';
import CreateFeedback from "./components/CreateFeedback";

window.Vue.use(VueRouter);


const routes = [
    {
        path: '/',
        components: {
            createFeedback: CreateFeedback
        }
    },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
