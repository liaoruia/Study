<template>
    <div >
        <template v-if="$route.params.id== 'Foo'">
            <Hello></Hello>
        </template>
        <template v-else>
            <Msg message="test"></Msg>
        </template>
        {{ $route.params.id }}
    </div>
</template>
<script>
    import Hello from '../components/Hello.vue';
    import Msg from '../components/Select.vue';
    export default {
        name:'logins',
        components:{
            Hello,
            Msg
        },
        data(){
            return {
                id:this.$route.params.id
            }
        }
    }
</script>