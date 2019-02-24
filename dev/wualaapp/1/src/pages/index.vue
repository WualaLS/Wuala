<template>
  <q-page padding>
    <q-card class="bg-grey-2">
      <q-card-title class="bg-blue-grey-3">
        <span class="wualaPurple">On-Demand Laundry Service App</span>
      </q-card-title>
      <q-list>
        <br>
        <q-item>
          Sign Up on the Wuala App
          <q-item-side right icon="mdi-cellphone" color="deep-purple-8" />
        </q-item>
        <q-item>
          Place Your Order
          <q-item-side right icon="mdi-washing-machine" color="deep-purple-8" />
        </q-item>
        <q-item>
          Wait for Pickup
          <q-item-side right icon="mdi-truck-fast" color="deep-purple-8" />
        </q-item>
        <q-item>
          Enjoy Your Non Laundry Time
          <q-item-side right icon="tag_faces" color="deep-purple-8" />
        </q-item>
        <q-item>
          Clean Laundry Delivered back to your door
          <q-item-side right icon="mdi-check" color="deep-purple-8" />
        </q-item>
      </q-list>
      <div class="row">
        <img src="statics/wuala_logo_Tagline.png" height="100" width="200" align="middle">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        <h4 class="wualaPurple">Beta Testers Needed</h4>
      </div>
      <q-card-actions align="center">
        <q-btn color="light-green" @click="subscribe">Subscribe</q-btn>
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style lang="stylus" scoped>
  @import '~variables'
  .wualaPurple {
    color: $deep-purple-8
  }
</style>

<script>
export default {
  name: 'PageIndex',
  data () {
    return {
      username: null,
      password: null
    }
  },
  methods: {
    subscribe () {
      window.open('http://wualaapp.com/subscribe')
    }
  },
  mounted () {
    console.log('mounted')
    console.log('isGuest')
    this.isGuest()
    console.log('isLoggedIn')
    this.isLoggedIn()
  }
}
</script>
