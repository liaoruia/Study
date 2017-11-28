/**
 * Created by daxia on 2017/7/17.
 */
import Vue from 'vue'
import Vuex from 'vuex';
Vue.use(Vuex);

import actions from './actions.js';
import  mutations from  './mutations.js'
const store = new  Vuex.Store({
    state:{
        count:1,
        logining:true,
        loginmsg:"",
        checkusernamemsg:"",
        postInfo:{},
        commiting:false,
        userList:[],
        user:{
            submiting:false,
            data:{}
        },
        carList:[],
        DtaoList:[]

    },
    mutations,
    actions
});
export default store;