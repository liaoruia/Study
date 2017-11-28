import config from '../config.js';
export function getCarList(args){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:config.car.brandList,
            type:'post',
            dataType:'json',
            data:args,
        }).done((resp)=>{
            if(resp.status == 200){
                resolve(resp.data);
            } else {
                reject(resp||'获取数据失败！')
            }
        }).fail((jqXHR,textStatus,erroThrown)=>{
            if(textStatus !=='abort'){
                reject("服务器错误！");
            }
        })
    })
}
export function getCarKid(args){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:config.car.list,
            type:'post',
            dataType:'json',
            data:args,
        }).done((resp)=>{
            if(resp.status == 200){
                resolve(resp.data);
            } else {
                reject(resp||'获取数据失败！')
            }
        }).fail((jqXHR,textStatus,erroThrown)=>{
            if(textStatus !=='abort'){
                reject("服务器错误！");
            }
        })
    })
}
//===========淘宝车信息============
export function taoCarList(args) {
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:config.car.taoList,
            type:'post',
            dataType:'json',
            data:args,
        }).done((resp)=>{
            if(resp.status == 200){
                resolve(resp.data);
            } else {
                reject(resp||'获取数据失败！')
            }
        }).fail((jqXHR,textStatus,erroThrown)=>{
            if(textStatus !=='abort'){
                reject("服务器错误！");
            }
        })
    })
}