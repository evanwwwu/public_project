import Vue from 'vue'
import Vuex from 'vuex';
Vue.use(Vuex);

const state = {
    username: ''
};
const getters = {
    Xusername: state => state.username,
};

const mutations = {
    setUsername(state, value) {
        state.username = value;
    },
};

const actions = {

};


const myPlugin = store => {
};

export default new Vuex.Store({
    plugins: [myPlugin],
    state,
    getters,
    actions,
    mutations,
    strict: true, //嚴格模式
});