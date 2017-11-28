<template>
    <li class="dropdown-submenu pull-lefttao">
        <a tabindex="-1" v-on:mouseenter="taoEnter({valueid:item3.valueid,propertyid:item3.propertyid})">
            <img :src="item3.modpicurl" style="width: 50px;height: 33.4px"/>{{item3.valuename}}</a>
        <ul class="dropdown-menu" v-if="taoSeries.length > 0" style="width: 100%;">
            <!-- 车系 -->
            <li v-for="(item4 , index4) of taoSeries" class="dropdown-submenu pull-left">
                <a tabindex="-1" href="#" v-on:mouseenter="taoEnter2({valueid:item4.valueid,propertyid:item4.propertyid})" >
                    <img :src="item4.modpicurl" style="width: 50px;height: 33.4px"/>{{item4.valuename}}</a>
                <ul class="dropdown-menu" v-if="taoYear.length > 0" style="width: 100%;">
                    <!-- 年份-->
                    <li v-for="(item5 , index5) of taoYear" class="dropdown-submenu pull-left">
                        <a tabindex="-1" v-on:mouseenter="taoEnter3({valueid:item5.valueid,propertyid:item5.propertyid})">{{item5.valuename}}</a>
                        <ul class="dropdown-menu" v-if="taoType.length > 0" style="width: 100%;">
                            <!--车型-->
                            <li v-for="(item6 , index6) of taoType" class="dropdown-submenu pull-left" >
                                <a tabindex="-1" href="#" v-html="item6.valuename"></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</template>
<script>
//    const cacheTaoSeries={};
//    const cacheTaoSeries2={};
//    const cacheTaoSeries3={};
    import {taoCarList} from '../../api/car.js';
    export default {
        name:'tao-carlist',
        props:{
            item3:{
                type: Object
            }
        },
        data(){
            return {
                taoSeries:[],
                taoYear:[],
                taoType:[]
            }
        },
        methods:{
            taoEnter(args){
//                if(cacheTaoSeries[args.valueid + args.propertyid] !== undefined){
//                    this.typet = cacheTaoSeries[args.valueid + args.propertyid];
//                    return;
//                }
                if(this.taoSeries.length>0){
                    return;
                }
                taoCarList(args).then((resp)=>{
                    this.taoSeries = resp;
                    cacheTaoSeries[args.valueid + args.propertyid]=resp
                }).catch((error)=>{
                    console.log(error);
                })
            },

            taoEnter2(args){
//                if(this.taoYear.length > 0){
//                    return;
//                }
                taoCarList(args).then((resp)=>{
                    this.taoYear = resp;
                }).catch((error)=>{
                    console.log(error);
                })
            },
            taoEnter3(args){
//                if(this.taoType.length>0){
//                    return;
//                }
                taoCarList(args).then((resp)=>{
                    this.taoType = resp;
                }).catch((error)=>{
                    console.log(error);
                })
            }
        }

    }
</script>