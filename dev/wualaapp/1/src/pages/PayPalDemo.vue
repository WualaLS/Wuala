<template>
  <div>
    <PayPal
      amount="0.01"
      currency="USD"
      v-on:payment-completed="testMethod"
      :client="credentials">
    </PayPal>
  </div>
</template>
<script>
import PayPal from 'vue-paypal-checkout'
export default {
  components: {
    PayPal
  },
  data () {
    return {
      credentials: {
        sandbox: 'AZjdvPzsAtkYqUFnAO9XPo9NgFWh85rgO3H66e0NSyDgfOzdXmhrgLXXhPOLTSybcTbJs3vxYuaGJgas',
        production: 'AZjdvPzsAtkYqUFnAO9XPo9NgFWh85rgO3H66e0NSyDgfOzdXmhrgLXXhPOLTSybcTbJs3vxYuaGJgas'
      }
    }
  },
  methods: {
    testMethod (data) {
      console.log('testMethod')
      console.log(data)
    }
  },
  mounted () {
    console.log('mounted')
  }
}
</script>
