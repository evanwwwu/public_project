<style lang="sass" scoped>
$animation_time: 2.5s;
$ring_color: #2084a7;
$ring_bg_color: #8e8f8f;
</style>
<template lang="pug">

transition(name='fade', mode='out-in')
    .loading_wrap(v-show='showLoading')
        .loader-container
            .tp-loader
                .ring

</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default{
    computed: {
        ...mapGetters([
            'showLoading'
        ])
    },
}
</script>