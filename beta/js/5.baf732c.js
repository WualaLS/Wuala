(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[5],{"84+E":function(o,s,e){"use strict";var n=e("nmOl"),t=e.n(n);t.a},CAD5:function(o,s,e){"use strict";e.r(s);var n=function(){var o=this,s=o.$createElement,e=o._self._c||s;return e("q-page",{attrs:{padding:""}},[e("q-card",[e("q-card-main",{staticClass:"row gutter-md no-vert-gutter"},[e("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[e("q-input",{attrs:{"float-label":"Email/User Name"},model:{value:o.username,callback:function(s){o.username=s},expression:"username"}})],1),e("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[e("q-input",{attrs:{type:"password","float-label":"Password"},model:{value:o.password,callback:function(s){o.password=s},expression:"password"}})],1)],1),e("q-card-separator"),e("q-card-actions",{attrs:{align:"center"}},[e("q-btn",{attrs:{color:"light-green"},on:{click:o.login}},[o._v("Log In")]),e("q-btn",{attrs:{color:"light-green"},on:{click:o.signUp}},[o._v("Sign Up")])],1),e("img",{attrs:{src:"statics/wuala-logo-tagline.jpg",height:"120",width:"200",align:"middle"}})],1)],1)},t=[];n._withStripped=!0;var l={name:"LogIn",data:function(){return{username:null,password:null}},methods:{signUp:function(){this.$router.push({name:"NewAccount"})},isGuest:function(){console.log("isGuest"),this.$axios.post("https://wualaapp.com/3/web/index.php?r=user-api%2Fis-guest").then(function(o){console.log("isGuest response"),console.log(o.data)}).catch(function(o){console.log("isGuest error"),console.log(o)})},isLoggedIn:function(){console.log("isLoggedIn"),this.$axios.post("https://wualaapp.com/3/web/index.php?r=user-api%2Fis-logged-in").then(function(o){console.log("isLoggedIn response"),console.log(o.data)}).catch(function(o){console.log("isLoggedIn error"),console.log(o)})},login:function(){var o=this;console.log("login"),this.$axios.post("https://wualaapp.com/3/web/index.php?r=user-api%2Fuser-login",this.$qs.stringify({username:this.username,password:this.password})).then(function(s){console.log("login response"),console.log(s.data),s.data["loggedIn"]&&(o.$store.commit("user/setUser",s.data["userInfo"]),o.$store.commit("preferences/setPreferences",s.data["Preferences"]),o.$router.push({name:"ScheduleWash"}))}).catch(function(o){console.log("login error"),console.log(o)})}},mounted:function(){console.log("mounted"),console.log("isGuest"),this.isGuest(),console.log("isLoggedIn"),this.isLoggedIn()}},a=l,i=(e("84+E"),e("KHd+")),r=Object(i["a"])(a,n,t,!1,null,null,null);r.options.__file="LogIn.vue";s["default"]=r.exports},nmOl:function(o,s,e){}}]);