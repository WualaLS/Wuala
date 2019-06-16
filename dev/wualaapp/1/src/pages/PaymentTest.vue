<template>
  <div>
    <vue-stripe-checkout
      ref="checkoutRef"
      :image="image"
      :name="name"
      :description="description"
      :currency="currency"
      :amount="amount"
      :allow-remember-me="false"
      @done="done"
      @opened="opened"
      @closed="closed"
      @canceled="canceled"
    ></vue-stripe-checkout>
    <button @click="checkout">Checkout</button>
    <button @click="submitPayment">Submit Payment</button>
  </div>
</template>
<script>
import Vue from 'vue'
import VueStripeCheckout from 'vue-stripe-checkout'
Vue.use(VueStripeCheckout, 'pk_live_S9p1cXAsXnb3IwOZMSL3DFFB')
export default {
  data () {
    return {
      image: 'statics/wuala-logo.jpg',
      name: 'Wuala',
      description: 'Laundry Service',
      currency: 'usd',
      amount: 100
    }
  },
  methods: {
    async checkout () {
      console.log('checkout')
      // token - is the token object
      // args - is an object containing the billing and shipping address if enabled
      const { token, args } = await this.$refs.checkoutRef.open()
      console.log(token)
      console.log(args)
    },
    done ({token, args}) {
      console.log('done')
      console.log(token)
      console.log(args)
      // token - is the token object
      // args - is an object containing the billing and shipping address if enabled
      // do stuff...
    },
    opened () {
      // do stuff
    },
    closed () {
      // do stuff
    },
    canceled () {
      // do stuff
    },
    submitPayment () {
      console.log('submitPayment')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fsubmit-payment-ajax'
      ).then((response) => {
        console.log('save response')
        console.log(response.data)
      }).catch(error => {
        console.log('save error')
        console.log(error)
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Failed to save'
        })
      })
    }
  },
  mounted () {
    console.log('mounted')
    this.checkout()
  }
}
</script>
