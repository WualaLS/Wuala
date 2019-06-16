<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-title>
        Create Account
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field :error="$v.user_first_name.$error" error-label="Required, Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_first_name" float-label="First Name"></q-input></q-field>
        <q-field :error="$v.user_last_name.$error" error-label="Required, Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_last_name" float-label="Last Name"></q-input></q-field>
        <q-field :error="$v.user_username.$error" error-label="Required, Please enter a valid email address, Max Length: 45" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_username" float-label="Email/User Name"></q-input></q-field>
        <q-field :error="$v.user_birthday.$error" error-label="Valid Date" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><date-picker v-model="user_birthday" float-label="Birthday"></date-picker></q-field>
        <q-field :error="$v.user_mobile_number.$error" error-label="Required, Max Length: 45" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_mobile_number" float-label="Phone Number"></q-input></q-field>
        <q-field :error="$v.user_password.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_password" type="password" float-label="Password"></q-input></q-field>
        <q-field :error="$v.user_confirm_password.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_confirm_password" type="password" float-label="Confirm Password"></q-input></q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-title>
        <span slot="subtitle">Address</span>
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field :error="$v.user_address_line_one.$error" error-label="Required, Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_address_line_one" float-label="Address Line 1"></q-input></q-field>
        <q-field :error="$v.user_address_line_two.$error" error-label="Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_address_line_two" float-label="Address Line 2"></q-input></q-field>
        <q-field :error="$v.user_city.$error" error-label="Required, Max Length: 45" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_city" float-label="City"></q-input></q-field>
        <q-field :error="$v.user_state.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><state-select v-model="user_state" stack-label="State"></state-select></q-field>
        <q-field :error="$v.user_zip.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_zip" float-label="Zip"></q-input></q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="light-green" @click="createAccount">Create Account</q-btn>
        <!--<q-btn color="light-green" @click="ajaxTest">Ajax Test</q-btn>-->
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
import { uid } from 'quasar'
import DatePicker from 'components/DatePicker'
import StateSelect from 'components/StateSelect'
import {required, maxLength} from 'vuelidate/lib/validators'
import email from 'components/validators/email.js'
import date from 'components/validators/date.js'

export default {
  name: 'NewAccount',
  components: {
    DatePicker,
    StateSelect
  },
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
      user_mobile_number: null,
      user_address_line_one: null,
      user_address_line_two: null,
      user_city: null,
      user_state: null,
      user_zip: null,
      showAllErrors: false
    }
  },
  watch: {
    showAllErrors: function (newValue) {
      if (newValue) {
        this.$v.$touch()
      } else {
        this.$v.$reset()
      }
    }
  },
  methods: {
    createAccount () {
      console.log('createAccount')
      console.log(this.user_id)
      console.log(this.user_birthday)
      console.log(this.user_state)
      if (this.$v.$invalid) {
        this.showAllErrors = true
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Please fix all errors to continue',
          position: 'bottom'
        })
      } else {
        if (this.user_password === this.user_confirm_password && this.user_password !== null && this.user_password !== '') {
          let UpModel = {
            'user_id': this.user_id,
            'user_authkey': this.user_authkey,
            'user_first_name': this.user_first_name,
            'user_last_name': this.user_last_name,
            'user_email': this.user_username,
            'user_username': this.user_username,
            'user_birthday': this.user_birthday,
            'user_password': this.user_password,
            'user_mobile_number': this.user_mobile_number,
            'user_address_line_one': this.user_address_line_one,
            'user_address_line_two': this.user_address_line_two,
            'user_city': this.user_city,
            'user_state': this.user_state,
            'user_zip': this.user_zip
          }
          this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fput-user-ajax',
            this.$qs.stringify({
              UpModel: UpModel
            })
          ).then((response) => {
            console.log('createAccount response')
            console.log(response.data)
            if (response.data === 'emailExists') {
              this.$q.notify({
                color: 'negative',
                icon: 'warning',
                message: 'Email/Username Already Exists'
              })
            } else if (response.data['saved'] === false) {
              this.$q.notify({
                color: 'negative',
                icon: 'warning',
                message: 'Failed to Create New Account'
              })
            } else {
              this.$q.notify({
                color: 'green',
                icon: 'done',
                message: 'New Account Created'
              })
              this.$store.commit('user/setUser', response.data['model'])
              this.$store.commit('preferences/setPreferences', response.data['Preferences'])
              this.$router.push({name: 'MyAccount'})
            }
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
      }
    },
    ajaxTest () {
      console.log('ajaxTest')
      this.$axios.get(process.env.serverPath + '/web/index.php?r=user-api%2Ftest').then((response) => {
        console.log('response')
        console.log(response.data)
      })
    }
  },
  validations: {
    user_first_name: {
      required,
      maxLength: maxLength(128)
    },
    user_last_name: {
      required,
      maxLength: maxLength(128)
    },
    user_username: {
      email,
      required,
      maxLength: maxLength(45)
    },
    user_birthday: {
      date
    },
    user_password: {
      required,
      maxLength: maxLength(128)
    },
    user_confirm_password: {
      required,
      maxLength: maxLength(128)
    },
    user_mobile_number: {
      required,
      maxLength: maxLength(45)
    },
    user_address_line_one: {
      required,
      maxLength: maxLength(128)
    },
    user_address_line_two: {
      maxLength: maxLength(128)
    },
    user_city: {
      required,
      maxLength: maxLength(45)
    },
    user_state: {
      required
    },
    user_zip: {
      required
    }
  }
}
</script>
