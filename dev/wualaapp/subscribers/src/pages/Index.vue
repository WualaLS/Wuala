<template>
  <q-page padding>
    <q-card>
      <q-card-title>
        Beta testers needed. Both for washing and drivers. Please subscribe for more info.
      </q-card-title>
      <q-card-separator />
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="subscribers_first_name" float-label="First Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="subscribers_last_name" float-label="Last Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="subscribers_email" float-label="Email"></q-input></q-field>
        <q-toggle v-model="subscribers_washer" color="primary" true-value="1" false-value="0" label="Are you interested in becoming a driver?"/>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="light-green" @click="subscribe">Subscribe</q-btn>
      </q-card-actions>
      <img src="statics/wuala-logo-tagline.jpg" height="120" width="200" align="middle">
    </q-card>
  </q-page>
</template>
<style>
</style>

<script>
import { uid } from 'quasar'
export default {
  name: 'LogIn',
  data () {
    return {
      subscribers_id: uid(),
      subscribers_first_name: null,
      subscribers_last_name: null,
      subscribers_email: null,
      subscribers_washer: 0
    }
  },
  methods: {
    subscribe () {
      // console.log('subscribe')
      // console.log(this.subscribers_id)
      if (this.subscribers_email === null) {
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          position: 'center',
          message: 'Please enter an email address.'
        })
      } else {
        let UpModel = {
          'subscribers_id': this.subscribers_id,
          'subscribers_first_name': this.subscribers_first_name,
          'subscribers_last_name': this.subscribers_last_name,
          'subscribers_email': this.subscribers_email,
          'subscribers_washer': this.subscribers_washer
        }
        this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fput-subscriber-ajax',
          this.$qs.stringify({
            UpModel: UpModel
          })
        ).then((response) => {
          // console.log('subscribe response')
          // console.log(response.data)
          // console.log(response.data.saved)
          if (response.data.saved) {
            this.$q.notify({
              color: 'green',
              icon: 'done',
              position: 'center',
              message: 'Thank you for subscribing!'
            })
          } else {
            this.$q.notify({
              color: 'negative',
              icon: 'warning',
              position: 'center',
              message: 'Unable to subscribe, please try again.'
            })
          }
          this.subscribers_id = uid()
          this.subscribers_first_name = null
          this.subscribers_last_name = null
          this.subscribers_email = null
          this.subscribers_washer = 0
        }).catch(() => {
          // console.log('subscribe error')
          // console.log(error)
          this.$q.notify({
            color: 'negative',
            icon: 'warning',
            position: 'center',
            message: 'Failed to Subscribe'
          })
        })
      }
    }
  },
  mounted () {
    // console.log('mounted')
  }
}
</script>
