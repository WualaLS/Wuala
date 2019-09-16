<template>
  <q-page class="flex flex-center">
    <img alt="Quasar logo" src="~assets/quasar-logo-full.svg">
    <q-btn @click="firebaseTestWrite()" color="white" text-color="black" label="Firebase Write Test"/>
  </q-page>
</template>

<style>
</style>

<script>
export default {
  name: 'PageIndex',
  data () {
    return {
      userId: 1,
      username: 'Geoff',
      email: 'dgmyers08@gmail.com'
    }
  },
  methods: {
    firebaseTestWrite () {
      console.log('firebaseTestWrite')
      this.$firestore.collection('users').doc('123abc').set({
        userId: this.userId,
        username: this.username,
        email: this.email
      }).then(response => {
        console.log(response)
      }).catch(error => {
        console.log(error)
      })
    }
  }
}
</script>
