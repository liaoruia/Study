/**
 * Created by daxia on 2017/7/17.
 */
import config from '../config.js';
export function checkUser(args){
    return new Promise((resolve, reject)=>{
        $.ajax({
            url:  config.user.login,
            type:'get',
            dataType:'json',
            data:args,
        }).done((resp)=>{
            if(resp.status ==200){
                resolve(resp.data);
            }else{
                reject(resp.info || '检查失败');
            }
        }).fail((jqXHR, textStatus, errorThrown)=>{
            if(textStatus !=='abort'){
                reject("服务器错误！");
            }
        });
    });
}
export function checkUsername(args) {
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:config.user.check,
            type:'get',
            dataType:'json',
            data:args
        }).done((resp)=>{
            if(resp.status == 200){
                resolve(resp);
            }else{
                reject(resp.data.info || '检查失败');
            }
        }).fail((jqXHR,textStatus,errorThrown)=>{
            if(textStatus !=='abort'){
                reject("服务器错误！");
            }
        })
    })
}
export function userAction(args) {
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:config.user.check,
            type:'get',
            dataType:'json',
            data:args
        }).done((resp)=>{
            if(resp.status ==200){
                resolve(resp);
            }else{
                reject(resp || '检查失败');
            }
        }).fail((jqXHR,textStatus,errorThrown)=>{
            if(textStatus !=='abort'){
                reject("服务器错误！");
            }
        })
    })
}
export function getUserList(args){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:config.user.list,
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