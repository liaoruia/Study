<template>
    <li class="dropdown-submenu">
    <!--<li v-for="(item , index) of dataList" class="dropdown-submenu">-->
        <a tabindex="-1" v-on:mouseenter="enter(item.cb_brand_id)"><img :src="item.cb_brand_pic"/>{{item.cb_brand_name}}</a>
        <ul class="dropdown-menu" v-if="typet.length > 0">
            <li v-for="(item1 , index1) of typet" class="dropdown-submenu">
                <a tabindex="-1" href="#" v-on:mouseenter="enter2(item1.cs_car_id)" >{{item1.cs_name}}</a>
                <ul class="dropdown-menu" v-if="series.length > 0">
                    <li v-for="(item2 , index2) of series" ><a tabindex="-1" href="#">{{item2.cs_name}}</a></li>
                </ul>
            </li>
        </ul>
    <!--</li>-->
    </li>
</template>
<script>
    const carCacheList ={};
    const carSeriesList ={};
    import {getCarKid} from '../../api/car.js';
    export default {
        name:'car-List',
        props:{
            item:{ type: Object}
        },
        data(){
            return {
                typet:[],
                series:[]
            };
        },
        methods:{
            enter(args){
                this.typet=[];
                if(carCacheList[args] !== undefined){
                    this.typet = carCacheList[args];
                    return;
                }
                getCarKid({brand:args}).then((resp)=>{
                    this.typet = resp;
                    carCacheList[args]=resp
                }).catch((error)=>{
                    console.log(error);
                })
            },
            enter2(args){
                this.series = []
                if(carSeriesList[args] !== undefined){
                    this.series = carSeriesList[args];
                    return;
                }
                getCarKid({parent:args}).then((resp)=>{
                    this.series = resp;
                    carSeriesList[args]=resp
                }).catch((error)=>{
                    console.log(error);
                })
            },
        }
    }

</script>