<template>
    <div class="loginForm">
    <form class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="inputEmail">{{usernameL}}</label>
            <div class="controls">
                <input type="text" id="inputEmail" v-bind:placeholder="placeholder">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password">
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <label class="checkbox">
                    <input type="checkbox"> Remember me
                </label>
                <button type="button" class="btn" v-on:click="login">Sign in</button>
                <router-link to="/login/reg" class="btn">Register</router-link>
            </div>
        </div>
    </form>
    </div>
    </template>

<script>
    export default{
        name:"Login",
        data(){
            return {
                usernameL:"UserName",
                placeholder:"Username"
            }
        },
        methods:{
            login:function () {

            }
        }

    }
</script>
<style>
    .loginForm{
        margin: 20px auto;width: 33%;
        position: relative;
        padding: 39px 19px 14px;
        background-color: #fff;
        border: 1px solid #ddd;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .loginForm:after{
        content: "VUE-大侠";
        position: absolute;
        top: -1px;
        left: -1px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: bold;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        color: #9da0a4;
        -webkit-border-radius: 4px 0 4px 0;
        -moz-border-radius: 4px 0 4px 0;
        border-radius: 4px 0 4px 0;
    }
</style>