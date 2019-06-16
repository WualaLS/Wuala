(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[15],{"4lyN":function(e,t,r){"use strict";r.r(t);var s=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("q-page",{attrs:{padding:""}},[r("q-card",[r("q-card-title",[e._v("\n      Schedule a Wash\n    ")]),r("q-card-main",{staticClass:"row gutter-md no-vert-gutter"},[r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-datetime",{attrs:{"stack-label":"Date",type:"date",format:"MM/DD/YYYY"},model:{value:e.order_date,callback:function(t){e.order_date=t},expression:"order_date"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{readonly:"",options:e.typeOptions,"stack-label":"Wash Type"},model:{value:e.order_type,callback:function(t){e.order_type=t},expression:"order_type"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.timeOptions,"stack-label":"Preferred Pick Up Time"},model:{value:e.order_pick_up_time,callback:function(t){e.order_pick_up_time=t},expression:"order_pick_up_time"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.timeOptions,"stack-label":"Preferred Drop Off Time"},model:{value:e.order_preferred_drop_off,callback:function(t){e.order_preferred_drop_off=t},expression:"order_preferred_drop_off"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.numberOfBagsOptions,"stack-label":"Bags"},model:{value:e.order_bags,callback:function(t){e.order_bags=t},expression:"order_bags"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.yesNoOptions,"stack-label":"Hypoallergenic"},model:{value:e.order_hypoallergenic,callback:function(t){e.order_hypoallergenic=t},expression:"order_hypoallergenic"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.detergentOptions,"stack-label":"Detergent"},model:{value:e.order_detergent,callback:function(t){e.order_detergent=t},expression:"order_detergent"}})],1),4==e.order_detergent||"4"==e.order_detergent?r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-input",{attrs:{"float-label":"Other Detergent"},model:{value:e.order_detergent_other,callback:function(t){e.order_detergent_other=t},expression:"order_detergent_other"}})],1):e._e(),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.dryHeatOptions,"stack-label":"Dry Temp"},model:{value:e.order_dry_heat,callback:function(t){e.order_dry_heat=t},expression:"order_dry_heat"}})],1),r("q-field",{staticClass:"col-xs-12 col-sm-6 col-md-4 col-lg-3"},[r("q-select",{attrs:{options:e.yesNoOptions,"stack-label":"Dryer Sheets?"},model:{value:e.order_dryer_sheets,callback:function(t){e.order_dryer_sheets=t},expression:"order_dryer_sheets"}})],1),r("q-field",{staticClass:"col-xs-12",attrs:{count:1e3}},[r("q-input",{attrs:{type:"textarea","max-height":100,"min-rows":4,"stack-label":"Special Instructions"},model:{value:e.order_special_instructions,callback:function(t){e.order_special_instructions=t},expression:"order_special_instructions"}})],1)],1),r("q-card-separator"),r("q-card-actions",{attrs:{align:"center"}},[1==e.order_payment_approved?r("q-btn",{attrs:{color:"light-green"},on:{click:e.scheduleWash}},[e._v("Schedule Wash")]):e._e(),0==e.order_payment_approved?r("PayPal",{attrs:{amount:"0.01",currency:"USD",client:e.credentials},on:{"payment-completed":e.addPayment}}):e._e()],1)],1)],1)},o=[];s._withStripped=!0;r("ls82");var a=r("yXPU"),n=r.n(a),l=r("4mRW"),i=r("r7Fz"),u=r("aMKO"),c={name:"ScheduleWash",components:{PayPal:i["a"]},mixins:[l["a"]],data:function(){return{credentials:{sandbox:"AZjdvPzsAtkYqUFnAO9XPo9NgFWh85rgO3H66e0NSyDgfOzdXmhrgLXXhPOLTSybcTbJs3vxYuaGJgas",production:"AZjdvPzsAtkYqUFnAO9XPo9NgFWh85rgO3H66e0NSyDgfOzdXmhrgLXXhPOLTSybcTbJs3vxYuaGJgas"},image:"https://i.imgur.com/HhqxVCW.jpg",name:"Shut up and take my money!",description:"Cats are the best dog!",currency:"PHP",amount:99999,paymentType:"Credit/Debit",cardNumber:null,expDate:null,paymentModalOpened:!1,order_id:Object(u["a"])(),order_bags:null,order_type:0,order_hypoallergenic:null,order_detergent:null,order_detergent_other:null,order_dry_heat:null,order_dryer_sheets:null,order_user_id:null,order_date:null,order_pick_up_time:null,order_preferred_drop_off:null,order_status:0,order_special_instructions:null,order_payment_approved:0,order_payment_paypal_id:null,paymentOptions:[{label:"Choose...",value:null},{label:"Credit/Debit",value:"Credit/Debit"},{label:"Bank Account",value:"Bank Account"}],typeOptions:[{label:"Choose...",value:null},{label:"Single Wash $35",value:0},{label:"Pro",value:1},{label:"Premium",value:1}],numberOfBagsOptions:[{label:"Choose...",value:null},{label:"1",value:1},{label:"2",value:2}],timeOptions:[{label:"Choose...",value:null},{label:"06:00AM",value:"06:00"},{label:"07:00AM",value:"07:00"},{label:"08:00AM",value:"08:00"},{label:"09:00AM",value:"09:00"},{label:"10:00AM",value:"10:00"},{label:"11:00AM",value:"11:00am"},{label:"12:00PM",value:"12:00"},{label:"01:00PM",value:"13:00"},{label:"02:00PM",value:"14:00"},{label:"03:00PM",value:"15:00"},{label:"04:00PM",value:"16:00"},{label:"05:00PM",value:"17:00"},{label:"06:00PM",value:"18:00"},{label:"07:00PM",value:"19:00"},{label:"08:00PM",value:"20:00"}],yesNoOptions:[{label:"Choose...",value:null},{label:"Yes",value:1},{label:"No",value:0}],detergentOptions:[{label:"Choose...",value:null},{label:"Persil",value:0},{label:"Tide",value:1},{label:"Arm & Hammer",value:2},{label:"Gain",value:3},{label:"Other",value:4}],dryHeatOptions:[{label:"Choose...",value:null},{label:"Low",value:0},{label:"Medium",value:1},{label:"High",value:2},{label:"Hang Dry",value:3}]}},methods:{addPayment:function(e){console.log("testMethod"),console.log(e)},scheduleWash:function(){var e=this;console.log("scheduleWash");var t={order_id:this.order_id,order_bags:this.order_bags,order_hypoallergenic:this.order_hypoallergenic,order_detergent:this.order_detergent,order_detergent_other:this.order_detergent_other,order_dry_heat:this.order_dry_heat,order_dryer_sheets:this.order_dryer_sheets,order_user_id:this.user_id,order_date:this.order_date,order_pick_up_time:this.order_pick_up_time,order_preferred_drop_off:this.order_preferred_drop_off,order_status:this.order_status,order_special_instructions:this.order_special_instructions};this.$axios.post("https://wualaapp.com/3/web/index.php?r=user-api%2Fschedule-wash-ajax",this.$qs.stringify({UpModel:t})).then(function(t){console.log("save response"),console.log(t.data),t.data["saved"]?(e.$q.notify({color:"green",icon:"done",message:"Saved"}),e.$router.push({name:"History"})):e.$q.notify({color:"negative",icon:"warning",message:"Failed to save"})}).catch(function(t){console.log("save error"),console.log(t),e.$q.notify({color:"negative",icon:"warning",message:"Failed to save"})})},done:function(e){e.token,e.args},opened:function(){},closed:function(){},canceled:function(){},checkout:function(){var e=n()(regeneratorRuntime.mark(function e(){var t,r,s;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return console.log("checkout"),console.log(this.$refs),e.next=4,this.$refs.checkoutRef.open();case 4:t=e.sent,r=t.token,s=t.args,console.log(r),console.log(s);case 9:case"end":return e.stop()}},e,this)}));return function(){return e.apply(this,arguments)}}(),paymentTest:function(){console.log("paymentTest"),this.$router.push({name:"PaymentTest"})}},mounted:function(){console.log("mounted"),console.log(this.$store.state.user.user_id),this.order_date=this.$moment().format("YYYY-MM-DD"),console.log(this.order_date),this.order_hypoallergenic=this.$store.state.preferences.preferences_hypoallergenic,this.order_detergent=this.$store.state.preferences.preferences_detergent,this.order_detergent_other=this.$store.state.preferences.preferences_detergent_other,this.order_dry_heat=this.$store.state.preferences.preferences_dry_heat,this.order_dryer_sheets=this.$store.state.preferences.preferences_dryer_sheets}},d=c,_=(r("69wH"),r("KHd+")),m=Object(_["a"])(d,s,o,!1,null,null,null);m.options.__file="ScheduleWash.vue";t["default"]=m.exports},"4mRW":function(e,t,r){"use strict";t["a"]={computed:{user_id:{get:function(){return this.$store.state.user.user_id},set:function(e){this.$store.commit("user/user_id",e)}},user_username:{get:function(){return this.$store.state.user.user_username},set:function(e){this.$store.commit("user/user_username",e)}},user_password:{get:function(){return this.$store.state.user.user_password},set:function(e){this.$store.commit("user/user_password",e)}},user_first_name:{get:function(){return this.$store.state.user.user_first_name},set:function(e){this.$store.commit("user/user_first_name",e)}},user_last_name:{get:function(){return this.$store.state.user.user_last_name},set:function(e){this.$store.commit("user/user_last_name",e)}},user_address_line_one:{get:function(){return this.$store.state.user.user_address_line_one},set:function(e){this.$store.commit("user/user_address_line_one",e)}},user_address_line_two:{get:function(){return this.$store.state.user.user_address_line_two},set:function(e){this.$store.commit("user/user_address_line_two",e)}},user_city:{get:function(){return this.$store.state.user.user_city},set:function(e){this.$store.commit("user/user_city",e)}},user_state:{get:function(){return this.$store.state.user.user_state},set:function(e){this.$store.commit("user/user_state",e)}},user_zip:{get:function(){return this.$store.state.user.user_zip},set:function(e){this.$store.commit("user/user_zip",e)}},user_email:{get:function(){return this.$store.state.user.user_email},set:function(e){this.$store.commit("user/user_email",e)}},user_mobile_number:{get:function(){return this.$store.state.user.user_mobile_number},set:function(e){this.$store.commit("user/user_mobile_number",e)}},user_home_number:{get:function(){return this.$store.state.user.user_home_number},set:function(e){this.$store.commit("user/user_home_number",e)}},user_birthday:{get:function(){return this.$store.state.user.user_birthday},set:function(e){this.$store.commit("user/user_birthday",e)}},user_washer:{get:function(){return this.$store.state.user.user_washer},set:function(e){this.$store.commit("user/user_washer",e)}},user_active:{get:function(){return this.$store.state.user.user_active},set:function(e){this.$store.commit("user/user_active",e)}},user_password_last_updated:{get:function(){return this.$store.state.user.user_password_last_updated},set:function(e){this.$store.commit("user/user_password_last_updated",e)}},user_password_last_updated_by:{get:function(){return this.$store.state.user.user_password_last_updated_by},set:function(e){this.$store.commit("user/user_password_last_updated_by",e)}},user_password_reset:{get:function(){return this.$store.state.user.user_password_reset},set:function(e){this.$store.commit("user/user_password_reset",e)}},user_driver:{get:function(){return this.$store.state.user.user_driver},set:function(e){this.$store.commit("user/user_driver",e)}},user_pro:{get:function(){return this.$store.state.user.user_pro},set:function(e){this.$store.commit("user/user_pro",e)}},user_premium:{get:function(){return this.$store.state.user.user_premium},set:function(e){this.$store.commit("user/user_premium",e)}},user_admin:{get:function(){return this.$store.state.user.user_admin},set:function(e){this.$store.commit("user/user_admin",e)}}}}},"69wH":function(e,t,r){"use strict";var s=r("nOMN"),o=r.n(s);o.a},nOMN:function(e,t,r){}}]);