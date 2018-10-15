<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-title>
        Edit Account
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_first_name" float-label="Address Line 1"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_last_name" float-label="Address Line 2"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_email" float-label="City"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_username" float-label="State"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_birthday" float-label="Zip"></q-input></q-field>
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
  }
}
</script>
