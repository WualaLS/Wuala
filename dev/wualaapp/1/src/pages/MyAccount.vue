<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-title>
        Edit Address
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_first_name" float-label="First Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_last_name" float-label="Last Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_email" float-label="Email Address"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_username" float-label="User Name"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_birthday" float-label="Birthday"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_mobile_number" float-label="Phone Number"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <q-btn color="light-green" icon="mdi-home" @click="editAddress">Edit Address</q-btn>
        </q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="light-green" @click="save">Save</q-btn>
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
    save () {
      console.log('save')
      this.$q.notify({
        color: 'green',
        icon: 'done',
        message: 'Saved'
      })
    },
    editAddress () {
      this.$router.push({name: 'EditAddress'})
    }
  }
}
</script>
