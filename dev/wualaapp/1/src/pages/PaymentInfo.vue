<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-title>
        Payment
      </q-card-title>
      <q-card-main>
        &nbsp;
        <q-list highlight>
          <q-list-header>Paymet Methods</q-list-header>
          <q-item>
            <q-btn flat dense icon="mdi-credit-card">American Express 1002</q-btn>
          </q-item>
          <q-item>
            <q-btn flat dense icon="mdi-paypal">PayPal</q-btn>
          </q-item>
        </q-list>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn icon="mdi-plus" @click="save">Add Credit Card</q-btn>
        <!--<q-btn color="light-green" @click="ajaxTest">Ajax Test</q-btn>-->
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
      user_authkey: uid(),
      user_first_name: null,
      user_last_name: null,
      user_email: null,
      user_username: null,
      user_birthday: null,
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
          'user_authkey': this.user_authkey,
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
            color: 'green',
            icon: 'done',
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
    save () {
      console.log('save')
      this.$q.notify({
        color: 'green',
        icon: 'done',
        message: 'Saved'
      })
    }
  }
}
</script>
