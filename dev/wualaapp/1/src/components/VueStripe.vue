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
  </div>
</template>
<script>
import Vue from 'vue'
import VueStripeCheckout from 'vue-stripe-checkout'
Vue.use(VueStripeCheckout, 'pk_test_JCESlyN6KWqRwWEA4VUA2Gt0')
export default {
  data () {
    return {
      image: 'https://i.imgur.com/HhqxVCW.jpg',
      name: 'Shut up and take my money!',
      description: 'Cats are the best dog!',
      currency: 'PHP',
      amount: 99999
    }
  },
  methods: {
    async checkout () {
      // token - is the token object
      // args - is an object containing the billing and shipping address if enabled
      // const { token, args } = await this.$refs.checkoutRef.open()
    },
    done ({token, args}) {
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
    }
  }
}
</script>
