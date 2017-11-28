<template>
    <div class="bs-docs-example">
        <div class="pull-left">
            <div class="dropdown clearfix">
                <ul  class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
                    <carList v-for="(item , index) of dataList" :item="item"></carList>
                    <!--<li v-for="(item , index) of dataList" class="dropdown-submenu">-->
                        <!--<a tabindex="-1" v-on:mouseenter="enter(item.cb_brand_id)"><img :src="item.cb_brand_pic"/>{{item.cb_brand_name}}</a>-->
                        <!--<ul class="dropdown-menu" v-if="typet.length > 0">-->
                            <!--<li v-for="(item1 , index1) of typet" class="dropdown-submenu">-->
                                <!--<a tabindex="-1" href="#" v-on:mouseenter="enter2(item1.cs_car_id)" >{{item1.cs_name}}</a>-->
                                <!--<ul class="dropdown-menu" v-if="series.length > 0">-->
                                    <!--<li v-for="(item2 , index2) of series" ><a tabindex="-1" href="#">{{item2.cs_name}}</a></li>-->
                                <!--</ul>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
        <div class="pull-right">
            <div class="dropdown">
                <!--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block;position: static; margin-bottom: 5px;">-->
                    <!--<li><a tabindex="-1" href="#">Action</a></li>-->
                    <!--<li><a tabindex="-1" href="#">Another action</a></li>-->
                    <!--<li><a tabindex="-1" href="#">Something else here</a></li>-->
                    <!--<li class="divider"></li>-->
                    <!--<li class="dropdown-submenu pull-left">-->
                        <!--<a tabindex="-1" href="#">More options</a>-->
                        <!--<ul class="dropdown-menu" style="display: block;width: 100%;" >-->
                            <!--<li><a tabindex="-1" href="#">Second level link</a></li>-->
                            <!--<li><a tabindex="-1" href="#">Second level link</a></li>-->
                            <!--<li><a tabindex="-1" href="#">Second level link</a></li>-->
                            <!--<li><a tabindex="-1" href="#">Second levdel link</a></li>-->
                            <!--<li><a tabindex="-1" href="#">Second level link</a></li>-->
                        <!--</ul>-->
                    <!--</li>-->
                <!--</ul>-->
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px;">
                    <!-- 品牌 -->
                    <taoCarlist v-for="(item3 , index) of taoDataList" :item3 = "item3" class="dropdown-submenu pull-lefttao"></taoCarlist>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    import {getCarKid} from '../../api/car.js';
    import {taoCarList} from '../../api/car.js';
    import carList from './AutoItem.vue';
    import taoCarlist from './TaoItem.vue';
    export default {
        name:'cars',
        components:{
            'carList':carList,
            'taoCarlist':taoCarlist
        },
        data(){
            return {
                typet:[],
                series:[],
                taoSeries:[],
                taoYear:[],
                taoType:[]
            }

        },
        created(){
            this.cartList();
            this.MtaoList();
        },
        computed:{
            dataList:function(){
                return this.$store.state.carList
            },
            taoDataList:function(){
                return this.$store.state.DtaoList
            }

        },
        methods:{
            cartList(args){
                this.$store.dispatch('getCarList',args)
            },

            MtaoList(args){
                this.$store.dispatch('taoCarList',args)
            }
        }

    }
</script>