<template>
    <div :tabIndex='0' @keyup.esc="closeModal" v-focus="focus()" style="outline:none;">
        <form class="form-horizontal">
            <div class="control-group" v-bind:class="{error:usernameError}">
                <label class="control-label">UserName</label>
                <div class="controls">
                    <input type="text" v-model="item.username" @blur="AddCheckUsername">
                    <span class="help-inline">{{usernameErrorMgs}}</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >Email</label>
                <div class="controls">
                    <input type="text" v-model="item.email">
                </div>
            </div>
            <div class="control-group" v-if="props.action=='add'">
                <label class="control-label" >PassWord</label>
                <div class="controls">
                    <input type="password" v-model="item.passwd">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="button" class="btn"  @click="sub()" :disabled="!subDisabled">Submit</button>
                    <button type="button" class="btn" @click="closeModal()">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import {checkUsername} from '../../api/user.js';
    import {userAction} from '../../api/user';
    export default {
        name:'edit-user',
        props:['item','action'],
        directives: {
            // 注册一个局部的自定义指令 v-focus
            focus: {
                // 指令的定义
                inserted: function (el) {
                    // 聚焦元素
                    el.focus()
                }
            }
        },
        data(){
            console.log(this);
            let item;
            if(this.item === null || typeof(this.item) === 'undefined'){
                item={username:"",email:"",passwd:""}
            } else {
                item = this.item;
            }
            return {
                item,
                usernameError:false,
                usernameErrorMgs:'',
                subDisabled:true
            }
        },
        methods:{
            closeModal(){
                this.$emit('vuedals:close');
            },
            focus(){
                //让弹窗获取焦点 方便响应Esc键盘事件关闭窗体
            },
            AddCheckUsername(event) {
                this.subDisabled = true;
                checkUsername({username:this.item.username,action:'checkusername'}).then((data)=>{
                    if(data.status != 200){
                        this.usernameError=true;
                        this.usernameErrorMgs=data.info;
                        this.subDisabled = false;
                    } else {
                        this.usernameError=false;
                        this.usernameErrorMgs='';
                    }
                }).catch((error)=>{
                    this.usernameError=true;
                    this.usernameErrorMgs=error;
                    this.subDisabled = false;
                })

            },
            sub(){
                if(this.action == 'add'){
                    //新增提交
                    let args = this.item;
                    args.action=this.action;
                    userAction(args).then((data)=>{
                        if(data.status === 200){
                            this.$store.dispatch('getUserList',args)
                        }
                    }).catch((error)=>{
                        alert('添加失败！')
                    })
                    this.$emit('vuedals:close');
                } else if(this.action === 'edit') {
                    //修改提交
                    let args = this.item;
                    args.action=this.action;
                    userAction(args).then((data)=>{
                        if(data.status === 200){
                            this.$store.dispatch('getUserList',args)
                        }else if(data.status === 201){
                            //用户名不可用
                        } else if(data.status === 203){
                            //邮箱不可用
                        }
                    }).catch((error)=>{
                        alert('修改失败！')
                    })
                }
            },
        }
    }
</script>