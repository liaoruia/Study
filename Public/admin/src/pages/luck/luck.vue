<template>
    <div style="width: 600px;height: 600px;display: block;background-color: #c4e3f3" class="luck">
        <table style="width: 100%;border: #ff2a31 2px solid;height: 100%;table-layout:fixed; word-break: break-all; word-wrap: break-word; ">

            <tr style="width: 33.3%;height: 33.3%" v-for="(item,index) of items">
                <td v-for="(data ,inx) of item.data" :id="data.id" :class="{'bred': lucky== data.id}">
                    <span>{{data.value}}</span>
                </td>

            </tr>
        </table>
        <button style="background-color: red;color: white" @click="start()">抽奖</button>
        <button style="background-color: red;color: white" @click="end()">结束</button>
    </div>
</template>
<script>
    export default {
        name:'luck',
        data(){
            return {
                items:[
                    {data:[
                        {id:1,value:'奖项1'},
                        {id:2,value:'奖项2'},
                        {id:3,value:'奖项3'}
                        ]
                    },
                    {data:[
                        {id:4,value:'奖项4'},
                        {id:5,value:'奖项5'},
                        {id:6,value:'奖项6'}
                        ]
                    },
                    {data:[
                        {id:7,value:'奖项7'},
                        {id:8,value:'奖项8'},
                        {id:9,value:'奖项9'}
                        ]
                    },
                ],
                lucky:0,
                timer:0,
                counter:2000,
                timer1:0
            }
        },
        methods:{
            start(){
                this.counter = 2000;
                this.lucky=0;
                console.log(this.timer);
                let i = 0
                if(this.timer > 0){
                    return ;
                }
                this.timer = setInterval(()=>{
                        this.timerFunction();
                    },
                    this.counter
                )
//                this.timer = setInterval(()=>{
//                    if(i > 9){
//                        i=0
//                    }
//                    this.lucky=i;
//                    i++;
//
//                },20)
            },
            timerFunction(){
                clearInterval(this.timer);
                this.counter = this.counter - 100;
                if(this.timer1 > 500){
                    this.lucky=2;
                    this.end();
                    return;
                }
                if(this.lucky >= 9){
                    this.lucky=0
                }
                this.lucky++;
                this.timer1++;
                this.timer = setInterval(this.timerFunction,this.counter)
            },
            end(){
                console.log(this.timer1);
                clearInterval(this.timer);
                this.timer = 0;
            }
        }
    }
</script>