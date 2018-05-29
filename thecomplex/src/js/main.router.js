var log = function(value) {
    console.log("%c" + value, 'background: #bdc3c7; color: black; font-size:10px;');
};
import Vue from 'vue'
import VueRouter from 'vue-router';
import VueHead from 'vue-head'
import store from './store/store';
Vue.use(VueHead);
Vue.use(VueRouter);

const router = new VueRouter( {
    mode: DEV__ ? '':'history',
    routes: [
        { path: '/', component:"", meta:{first:true}},
        { path: '/index', component: "", meta: { first: true } },
        { path: '/page/about', component: require("About"), meta: { isPage: true } },
        { path: '/hong', component: require("pages/hong"), meta: {isPage:true} },
        { path: '/onion', component: require("pages/onion"), meta: { isPage: true } },
        { path: '/liao', component: require("pages/liao"), meta: { isPage: true } },
        { path: '/lai', component: require("pages/lai"), meta: { isPage: true } },
        { path: '/nie', component: require("pages/nie"), meta: { isPage: true } },
        { path: '/yan', component: require("pages/yan"), meta: { isPage: true } },
        { path: '/*', redirect: '/index' }
    ]
});

router.beforeEach(( to, from, next ) => {
    // log(`Router beforeEach to: ${to.path} from: ${from.path}`);
    
    store.commit('isPage', false);    
    if (to.matched.some(record => record.meta.first || false) && store.state.firstshow) {
        next();
    } else {
        store.commit('showfirst', false);
        if (to.matched.some(record => record.meta.isPage || false)) {
            store.commit('isPage', true);
            next();
        }
        next();
    }


});
export default router;
