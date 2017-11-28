<template>
    <div class="bs-docs-example">
        <form class="form-inline">
            <fieldset>
                <label>用户名：</label>
                <input type="text" class="input-small">
                <label>邮箱：</label>
                <input type="text" class="input-small">
                <button type="submit" class="btn">Search</button>
            </fieldset>
            <fieldset class="fr">
                <button type="submit" class="btn btn-primary" @click="add()">新增</button>
            </fieldset>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item , index) of dataList">
                    <td>{{item.username}}</td>
                    <td>{{item.email}}</td>
                    <td>
                        <span class = "edit-span" @click="edit(item)">编辑</span>
                        <span class = "edit-span" @click="del(item)">删除</span>
                    </td>

                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Next</a></li>
                <li><input type="text" class="input-pg-go"/></li>
                <li><a href="#">Go</a></li>
            </ul>
        </div>
        <vuedal @keyup.esc="aaa"></vuedal>
    </div>
</template>
<script>
    import {Component as Vuedal} from 'vuedals'
    import * as alert from '../../alert';
    import {userAction} from '../../api/user';
    export default {
        name: 'userList',
        components:{
            Vuedal
        },
        data(){
            return {

            }
        },
        created() {
            this.getList();
        },
        computed:{
            dataList:function(){
                return this.$store.state.userList
            }
        },
        methods:{
            getList(args){
                this.$store.dispatch('getUserList',args)
            },
            edit(item){
                this.$vuedals.open({
                    title: '编辑',
                    props: {
                        item,
                        action:'edit'
                    },
                    component: alert.UserAdd
                });
            },
            add(item){
                this.$vuedals.open({
                    title: '新增',
                    escapable:true,
                    props: {
                        item,
                        action:'add'
                    },
                    component: alert.UserAdd,

                });
            },
            del(item){
                //请求删除
                //刷新列表
                let args ={uid:item.uid,action:'del'};
                userAction(args).then((data)=>{
                    if(data.status === 200){
                        this.$store.dispatch('getUserList',args)
                    }else{
                        //邮箱不可用
                    }
                }).catch((error)=>{
                    alert('修改失败！')
                })
            }
        }
    }

</script>