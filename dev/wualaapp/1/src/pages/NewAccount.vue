<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-title>
        Create an Account
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_first_name" float-label="First Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_last_name" float-label="Last Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_email" float-label="Email Address"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_username" float-label="User Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_password" float-label="Password"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_confirm_password" float-label="Confirm Password"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_mobile_number" float-label="Phone Number"></q-input></q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="primary" @click="createAccount">Create Account</q-btn>
        <q-btn color="primary" @click="ajaxTest">Ajax Test</q-btn>
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
import { uid } from 'quasar'

export default {
  name: 'NewAccount',
  data () {
    return {
      user_id: uid(),
      user_first_name: null,
      user_last_name: null,
      user_email: null,
      user_username: null,
      user_password: null,
      user_confirm_password: null,
      user_mobile_number: null
    }
  },
  methods: {
    createAccount () {
      console.log('createAccount')
      console.log(this.user_id)
      if (this.user_password === this.user_confirm_password && this.user_password !== null && this.user_password !== '') {
        let UpModel = {
          'user_id': this.user_id,
          'user_first_name': this.user_first_name,
          'user_last_name': this.user_last_name,
          'user_email': this.user_email,
          'user_username': this.user_username,
          'user_password': this.user_password,
          'user_mobile_number': this.user_mobile_number
        }
        this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fput-user-ajax',
          this.$qs.stringify({
            UpModel: UpModel
          })
        ).then((response) => {
          console.log('createAccount response')
          console.log(response.data)
          this.$q.notify({
            color: 'negative',
            icon: 'warning',
            message: 'New Account Created'
          })
        }).catch(error => {
          console.log('createAccount error')
          console.log(error)
          this.$q.notify({
            color: 'negative',
            icon: 'warning',
            message: 'Failed to Create New Account'
          })
        })
      } else if (this.user_password !== this.user_confirm_password) {
        console.log('Password Not Confirmed')
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Password Not Confirmed'
        })
      } else if (this.user_password === null || this.user_password === '') {
        console.log('No Password Entered')
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Please Enter a Password'
        })
      }
    },
    ajaxTest () {
      console.log('ajaxTest')
      this.$axios.get(process.env.serverPath + '/web/index.php?r=user-api%2Ftest').then((response) => {
        console.log('response')
        console.log(response.data)
      })
    }
  }
}
</script>
