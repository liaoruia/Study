/**
 * Created by daxia on 2017/7/17.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

import App from './pages/App.vue';
import Login from './pages/Login.vue';
import reg from './pages/Register.vue';
import UserList from './pages/user/List.vue';
import draggable from './pages/Draggable.vue';
import luck from './pages/luck/luck.vue';
import car from './pages/car/index.vue';

let routes;
routes=[
    {path:'/',component:App,name:'app'},
    {path:'/reg',component:reg,name:'reg'},
    {path:'/login',component:Login,name:'Login'},
    {path:'/user/list',component:UserList,name:'userList'},
    {path:'/draggable',component:draggable,name:'draggabletable'},
    {path:'/luck',component:luck,name:'luck'},
    {path:'/car',component:car,name:'car'},
]
export default new VueRouter({
    routes
});