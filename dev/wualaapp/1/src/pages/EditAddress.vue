<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-title>
        Edit Address
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_address_line_one" float-label="Address Line 1"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_address_line_two" float-label="Address Line 2"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_city" float-label="City"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_state" float-label="State"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_zip" float-label="Zip"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <q-btn color="light-green" icon="mdi-account" @click="editProfile">Edit Profile</q-btn>
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
import UserComputeds from 'pages/UserComputeds.js'

export default {
  name: 'EditAddress',
  mixins: [UserComputeds],
  data () {
    return {
    }
  },
  methods: {
    save () {
      console.log('save')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fput-user-profile-ajax',
        this.$qs.stringify({
          UpModel: this.$store.state.user
        })
      ).then((response) => {
        console.log('save response')
        console.log(response.data)
        if (response.data['saved']) {
          this.$q.notify({
            color: 'green',
            icon: 'done',
            message: 'Saved'
          })
        } else {
          this.$q.notify({
            color: 'negative',
            icon: 'warning',
            message: 'Failed to save'
          })
        }
      }).catch(error => {
        console.log('save error')
        console.log(error)
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Failed to save'
        })
      })
    },
    editProfile () {
      this.$router.push({name: 'MyAccount'})
    }
  }
}
</script>
