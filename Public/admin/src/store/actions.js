/**
 * Created by daxia on 2017/7/17.
 */
import {checkUser} from '../api/user.js';
import {checkUsername} from '../api/user.js';
import {getUserList} from '../api/user.js';
import {userAction} from '../api/user.js';
import {getCarList} from '../api/car.js';
import {taoCarList} from '../api/car.js';

export default {
    checkUser({commit},args){

        return checkUser(args);
        //     .then((data) => {
        //     commit('checkUserQuering',data);
        // }).catch((error)=>{
        //     alert(error);
        // });
    },
    checkUsername({commit},args) {
        checkUsername(args).then((data)=>{
            commit('checkUsernameQuering',data);
        }).catch((error)=>{
            commit('checkUsernameQuering',error);
        },(data)=>{
            commit('checkUsernameQuering',data);
        })
    },
    login({commit},args){
        login(args).then()
    },
    getUserList({commit},args){
        getUserList(args).then((data)=>{
            commit('getUserListQuering',data);
        }).catch((error)=>{
            commit('getUserListQuering',error);
        })
    },
    userAction({commit},args){
        userAction(args).then((data)=>{
            commit('userActionQuering',data);
        }).catch((error)=>{
            commit('userActionQuering',error);
        })
    },
    //==============car============
    getCarList({commit},args){
        getCarList(args).then((data)=>{
            commit('getCarListQuering',data);
        }).catch((error)=>{
            commit('getCarListQuering',error);
        })
    },
    taoCarList({commit},args){
        taoCarList(args).then((data)=>{
            commit('getTaoCarListQuering',data);
        }).catch((error)=>{
            commit('getTaoCarListQuering',error);
        })
    }
}