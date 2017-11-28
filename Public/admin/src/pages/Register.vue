<template>
    <div class="loginForm">
        <form class="form-horizontal">
            <div class="control-group" v-bind:class="{error:usernameError}">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                    <input type="text" id="inputEmail" placeholder="Email" v-model="username" v-on:blur="checkUsername">
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                    <input type="password" id="inputPassword" placeholder="Password" v-model="passwd">
                </div>
            </div>
            <div class="control-group">
                <div class="controls div-center">
                    <button type="button" class="btn" v-on:click="sub" :disabled="commiting">{{commiting?'Submiting...':'Submit'}}</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default{
        name:'reg',
        data(){
            return {
                username:"",
                passwd:"",
                usernameError:false,
                commiting:false
            }
        },
        computed:{

        },
        methods:{
            checkUsername:function (event) {
                this.$store.dispatch('checkUsername',{username:this.username});
                if(this.$store.state.postInfo.status != 200){
                    this.usernameError=true;
                }
                $(event.currentTarget).next('span').html(this.$store.state.postInfo.info);
            },
            sub:function(){

                this.commiting=true;
            }
        },
        watch:{
            username:{
                handler:function (newvalue) {
                    $(event.currentTarget).next('span').html("您已经输入了"+newvalue.length+"个字");
                }
            }
        }
    }
</script>