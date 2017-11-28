<template>
    <div>
    <span>{{messageplus}}</span>
        <input type="text" v-model="test2" />

    <button type="button" v-on:click="changeHello">Click Me!</button>
    </div>
</template>
<script>
    export default{
        name:"select",
        props:['message', ],
        data() {
          return {
              test2: this.$store.state.count
          }
        },
        computed:{
            messageplus:function () {
                return this.message+"hello";
            }
        },
        methods:{
            changeHello:function(){
                let args={
                    username:"daxia",
                    passwd:"passwd"
                }
                this.$store.dispatch('checkUser',args).then((data)=>{

                });
                //     .then((data) => {
                //     commit('checkUserQuering',data);
                // }).catch((error)=>{
                //     alert(error);
                // });
            }
        }

    }
</script>