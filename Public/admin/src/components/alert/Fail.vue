<template>
<div :tabIndex='0' @keyup.esc="closeModal" v-focus="test()" style="outline:none;">
    <form class="form-horizontal">
        <div class="control-group">
            <label class="control-label">UserName</label>
            <div class="controls">
                <input type="text" v-model="item.name">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Email</label>
            <div class="controls">
                <input type="text" v-model="item.email">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="button" class="btn"  @click="sub()">Submit</button>
                <button type="button" class="btn" @click="closeModal()">Cancel</button>
            </div>
        </div>
    </form>
</div>
</template>
<script>
    export default {
        name:'fail-alert',
        props:['props'],
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
            return {
                item:this.props.item
            }
        },
        methods:{
            closeModal(){
                this.$emit('vuedals:close');
            },
            test(){

            },
            sub(){
                console.log(this.item.name);
            },
        }
    }
</script>
