// console.log( 'process.env.NODE_ENV', process.env.NODE_ENV );
// console.log('__DEV__', DEV__);
import Vue from 'vue'
import VueTouch from 'vue-directive-touch';
import { TweenLite, Elastic } from "gsap";
import store from "./store/store";
import router from './main.router';
import App from "App.vue";
Vue.use(VueTouch);

Vue.config.devtools = DEV__;
Vue.config.debug = DEV__;

new Vue( {
    el: '#app',
    store,
    router,
    // components: { 'app': require( 'App' ) },
    // 直接取代 html #app
    render: h => h( App )    
});
