<template>
    <!--<router-link to="/reg">Register</router-link>-->
    <!--<router-link to="/login">Sign In</router-link>-->
    <!--欢迎进入-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div style="width: 100%;height: 80px"></div>
      <div class="span2" style="border: 1px solid #e5e5e5; height: 100%">
        <ul class="nav nav-list">
          <li class="nav-header">List header</li>
          <li class="active"><a href="#">首页</a></li>
          <router-link to="/login" target="myFrameName">Sign In</router-link>
        </ul>
        <!--Sidebar content-->
      </div>
      <div class="span9">
        <iframe style="width: 100%"src="http://www.baidu.com" name="myFrameName"></iframe>
        <!--Body content-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      test: '123'
    }
  },
  computed:{
    test2(){
      return this.test;
    }
  },
  methods: {
    testa:function (message) {
      this.test = message
    },
    login:function (username,passwd) {

    }
  },
  watch:{}
}
</script>
