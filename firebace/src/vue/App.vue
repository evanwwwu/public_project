<style lang="sass" src="style.sass"></style>

<template lang="pug">
#app.app
    transition(name="fade")
        Enteruser(v-if="checkUser")

    .commits
        .history_com
            commitItem(v-for="item in commit" :item="item")
        Postbox
</template>

<script>

var firebace_com = firebase.database().ref('commits');
import { mapGetters , mapMutations } from 'vuex';
import Postbox  from './component/Postbox';
import Enteruser  from './component/Enteruser';
import commitItem from './component/commitItem'
export default {
    data() {
        return {
            commit:[]
        }
	},
	created(){
	},
    methods:{
        history_scroll() {
            document.querySelector(".history_com").scrollTo(0,document.querySelector(".history_com").scrollHeight);
        }
    },
    mounted(){
		firebace_com.on('value', (db) => { 
                this.commit = db.val();
        });
    },
    watch: {
        commit(val, oldVal) {
            this.history_scroll();
        }
    },
    computed:{
        ...mapGetters(['Xusername']),
        checkUser(){
            return this.Xusername.replace(/ /g,"") == '' ? true:false;
        }
    },
    components:{
        Postbox,
        Enteruser,
        commitItem
    }
}
</script>

