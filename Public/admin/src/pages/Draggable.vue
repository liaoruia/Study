<template>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <td>username</td>
                <td>email</td>
            </tr>
            </thead>
            <draggable :element="'tbody'" v-model="items" >
            <tr v-for="(item , index) of items" style="cursor: pointer">
                <td>{{item.username}}</td>
                <td>{{item.email}}</td>
            </tr>
            </draggable>
        </table>
        <img src="http://s.mizi.com/admin/img/TB1SBw4acD85uJjSZFphmlz3VXa_113122.jpg"/>
    </div>
</template>
<script>
    import draggable from 'vuedraggable'
    export default {
        name:'draggabletable',
        components:{
            draggable
        },
        data(){
            return {
                items:[
                    {username:'thefive',email:'thefive@qq.com'},
                    {username:'thefive1',email:'thefive1@qq.com'}
                ]
            }
        }
    }
</script>