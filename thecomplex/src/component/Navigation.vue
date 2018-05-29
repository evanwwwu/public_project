<style lang='sass' src="partials/header.sass" scoped></style>

<template lang="pug">
transition(name="fade")
    nav.navbar(v-if="!isPage")
        .left-logo
            img(src="~images/logotype.svg")
        .right-link
            router-link.link(to="/page/about") 關於計畫
</template>

<script>
import { mapGetters } from 'vuex';
export default{
    data(){
        return {

        }
    },
    computed:{
        ...mapGetters(['firstshow','isPage'])
    },
    methods:{

    },
    mounted(){

    },
    destroyed(){

    },
    components:{

    }
}
</script>