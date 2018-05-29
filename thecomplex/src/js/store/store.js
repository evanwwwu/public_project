import Vue from 'vue'
import Vuex from 'vuex';
Vue.use(Vuex);

const section_data = [{
        id: '0',
        video: 'http://img.lymma.net/thecomplex/hong.mp4',
        img: 'assets/images/hong.jpg',
        date: '8/5',
        name: "洪鈺堂",
        data: {
            title: "洪鈺堂的電車難題",
            info: "過去累積經驗的過程中，我發現自己還是會想要回到「做設計」這件事情。我記得之前工作的時候，有一陣子不太喜歡做設計，覺得同樣的工作做太久，做的東西不是我想要的。後來發現自己喜歡創作，想要有一些些創作空間，可以選擇想做的案子，甚至希望在談論案子的過程都可以是很興奮的。",
            url: "/hong",
            isOpen:true
        }
    },
    {
        id: '1',
        video: 'http://img.lymma.net/thecomplex/onion2.mp4',
        img: 'assets/images/onion.jpg',
        date: '8/11',
        name: "洋蔥設計",
        data: {
            title: "洋蔥設計的電車難題",
            info: "「來來來，你們喝酒嗎？」木製地板，木製吧台，木製桌椅，洋蔥設計工作室的裝潢是大片的暖色系，牆面除了張貼過往的作品，也釘上許多店家的名片菜單。黃家賢以酒代水招待我們，採訪之際，時而起身走向書櫃翻找提及的書籍海報，時而轉身向同事呼喊「開點音樂好了，太安靜了......然後壓力很大。」",
            url: "/onion",
            isOpen: true
        }
    },
    {
        id: '2',
        video: 'http://img.lymma.net/thecomplex/liao.mp4',
        img: 'assets/images/liao.jpg',
        date: '8/18',
        name: "廖小子",
        data: {
            title: "廖小子的電車難題",
            info: "「一隻老虎的牙齒放在你面前你可能不會覺得怎樣，但如果加上牠的毛、牠的眼睛、牠的肌肉，你會拔腿就跑，腿都軟了尿都噴出來了。」他說，「最銳利的那一面，背後有那些軟的東西，才會讓牙齒有力道。」談到此事，他的聲調放軟許多。",
            url: "/liao",
            isOpen: true
        }
    },
    {
        id: '3',
        video: 'http://img.lymma.net/thecomplex/lai.mp4',
        img: 'assets/images/lai.jpg',
        date: '8/25',
        name: "賴佳韋",
        data: {
            title: "賴佳韋的電車難題",
            info: "「我還在其他設計工作室當助理的時候，曾經有三個月沒有放假過，六日都要去工作室工作，每天出門不知道什麼時候回家。」採訪當日賴佳韋早上七點才睡，下午一點受訪時還沒吃早餐，「現在長久住在台北，很緊繃的環境當中，我比較容易適應、逼自己在這樣的戰鬥狀態。」",
            url: "/lai",
            isOpen: true
        }
    },
    {
        id: '4',
        video: 'http://img.lymma.net/thecomplex/nie.mp4',
        img: 'assets/images/nie.jpg',
        date: '9/1',
        name: "聶永真",
        data: {
            title: "聶永真的電車難題",
            info: "談到是否該將本土文化元素置放到平面設計作品中，聶永真的回答很堅定，「無論如何，我們做出來的東西都還是會有這個土地的氣味。」他說，「在不刻意把本土意識加進去的情況下，拿出來的作品跟日本、中國比較，我們依然看得出這些作品來自不同地域，有某種特定的氛圍。」",
            url: "/nie",
            isOpen:true
        }
    },
    {
        id: '5',
        video: 'http://img.lymma.net/thecomplex/yan.mp4',
        img: 'assets/images/yan.jpg',
        date: '9/8',
        name: "顏伯駿",
        data: {
            title: "顏伯駿的電車難題",
            info: "「美感到底是什麼？我們希望小孩擁有的美感是什麼？是判斷整齊、比例、分佈嗎？還是所謂透過美感讓思考更先進？還是什麼？」成長時深受歐美流行音樂文化影響，他說，「美感對我來說並不是美，而是一種思想上的突破。」",
            url: "/yan",
            isOpen: true
        }
    }

];
const state = {
    firstshow: true,
    showLoading: false,
    isPage: false,
    scrollback: false,
    sections: section_data,
};
/**
    computed:{
        ...Vuex.mapGetters(['showLoading','isLogin','userName'])
    },
 */
const getters = {
    showLoading: state => state.showLoading,
    sections: state => state.sections,
    firstshow: state => state.firstshow,
    isPage: state => state.isPage,
    scrollback: state => state.scrollback
};

// vue 裡用 this.$store.commit('showLoading' , true)
// mutation 必須是同步函數, 很重要
const mutations = {
    showfirst(state, value) {
        state.firstshow = value;
    },
    showLoading(state, value) {
        state.showLoading = value;
    },
    isPage(state, value) {
        state.isPage = value;
    },
    setback(state, value) {
        state.scrollback = value;
    }
};

const actions = {
    showfirst({
        commit
    }, value) {
        commit('showfirst', value);
    },
    isPage({
        commit
    }, value) {
        commit('isPage', value);
    },
    login({
        commit,
        state
    }, {
        email,
        password
    }) {
        return new Promise(resolve => {
            commit('showLoading', true);
            console.log('action login', email, password);
            setTimeout(async() => {
                var response = await axios.get('api.txt');
                var data = response.data;
                if (data.status == 'ok') {
                    commit('userName', data.name);
                    // action 不應該直接修改 state 的值, 
                    // 要使用 commit 的方式呼叫 mutations 去改值
                    // 以下寫法在嚴格模式會發生錯誤
                }
                resolve(data);
                commit('showLoading', false);
            }, 1000);
        })
    }

};


// https://vuex.vuejs.org/en/plugins.html
// Plugins
const myPlugin = store => {
    // called when the store is initialized
    store.subscribe((mutation, state) => {
        // called after every mutation.
        // console.log( mutation );
        // The mutation comes in the format of { type, payload }.
    });
};

export default new Vuex.Store({
    plugins: [myPlugin],
    state,
    getters,
    actions,
    mutations,
    strict: true, //嚴格模式
});