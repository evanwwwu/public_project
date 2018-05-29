console.log( 'process.env.NODE_ENV', process.env.NODE_ENV );
console.log('__DEV__', DEV__);
import Vue from 'vue'
import store from "./store/store";
import App from "App.vue";

Vue.config.devtools = DEV__;
Vue.config.debug = DEV__;

new Vue( {
    el: '#app',
    store,
    render: h => h( App )    
});
