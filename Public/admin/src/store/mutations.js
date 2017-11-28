/**
 * Created by daxia on 2017/7/17.
 */
export default {
    checkUserQuering(state,data){
        state.loginmsg=data.info;
        state.commiting=true;
    },
    checkUsernameQuering(state,data){
        state.postInfo=data;
    },
    getUserListQuering(state,data){
        if(data.length > 0){
            //请求成功
            state.userList=data
        } else {
            //请求失败
        }
    },
    userActionQuering(state,data){
        state.user.data=data;
        state.user.submiting=true;
    },
    getCarListQuering(state,data){
        if(data.length > 0){
            //请求成功
            state.carList=data
        } else {
            //请求失败
        }
    },
    getTaoCarListQuering(state,data){
        if(data.length > 0){
            //请求成功
            state.DtaoList=data
        } else {
            //请求失败
        }
    },

}
