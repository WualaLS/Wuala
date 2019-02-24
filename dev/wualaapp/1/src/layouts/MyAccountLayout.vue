<template>
  <q-layout view="lHh Lpr lFf">
    <q-layout-header reveal>
      <q-toolbar>
        <q-btn
          flat round dense
          @click="leftDrawerOpen = !leftDrawerOpen"
          icon="menu"
        />
        <q-toolbar-title>
          Wuala
          <div slot="subtitle">Laundry Services</div>
        </q-toolbar-title>
      </q-toolbar>
      <q-layout-drawer
        v-model="leftDrawerOpen"
        :content-class="$q.theme === 'mat' ? 'bg-grey-2' : null"
        :width="200"
      >
        <q-list highlight>
          <q-list-header>{{user_first_name}}</q-list-header>
          <q-item>
            <q-btn flat dense color="deep-purple-8" icon="mdi-pencil" @click="editProfile">Edit Profile</q-btn>
          </q-item>
          <!--
          <q-item>
            <q-btn flat dense color="light-green" icon="mdi-magnify" @click="openWualaMap">Find A Washer</q-btn>
          </q-item>
          -->
          <q-item>
            <q-btn flat dense color="light-green" icon="mdi-washing-machine" @click="scheduleWash">Schedule a Wash</q-btn>
          </q-item>
          <q-item>
            <q-btn flat dense color="deep-purple-8" icon="mdi-history" @click="washHistory" >Washes</q-btn>
          </q-item>
          <q-item>
            <q-btn flat dense color="light-green" icon="mdi-car" @click="scheduleWash">Driver Portal</q-btn>
          </q-item>
          <q-item>
            <q-btn flat dense color="deep-purple-8" icon="mdi-tshirt-crew" @click="washHistory" >Washer Portal</q-btn>
          </q-item>
          <q-item>
            <q-btn flat dense color="light-green" icon="mdi-account-key" @click="washHistory" >Admin Portal</q-btn>
          </q-item>
          <!--
          <q-item>
            <q-btn flat dense color="deep-purple-8" icon="mdi-credit-card" @click="openPaymentInfo">Payment Info</q-btn>
          </q-item>
          <q-item>
            <q-btn flat dense color="deep-purple-8" icon="mdi-washing-machine" @click="becomeAWasher">Become A Washer</q-btn>
          </q-item>
          -->
          <q-item>
            <q-btn flat dense color="deep-purple-8" icon="mdi-settings">Settings</q-btn>
          </q-item>
        </q-list>
      </q-layout-drawer>
    </q-layout-header>
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { openURL } from 'quasar'
import UserComputeds from 'pages/UserComputeds.js'

export default {
  name: 'MyAccountLayout',
  mixins: [UserComputeds],
  data () {
    return {
      leftDrawerOpen: this.$q.platform.is.desktop
    }
  },
  methods: {
    openURL,
    openWualaMap () {
      this.leftDrawerOpen = false
      this.$router.push({name: 'WualaMap'})
    },
    editProfile () {
      this.leftDrawerOpen = false
      this.$router.push({name: 'MyAccount'})
    },
    scheduleWash () {
      this.leftDrawerOpen = false
      this.$router.push({name: 'ScheduleWash'})
    },
    washHistory () {
      this.leftDrawerOpen = false
      this.$router.push({name: 'History'})
    },
    openPaymentInfo () {
      this.leftDrawerOpen = false
      this.$router.push({name: 'PaymentInfo'})
    },
    becomeAWasher () {
      this.leftDrawerOpen = false
      this.$router.push({name: 'WasherSignUp'})
    }
  },
  mounted () {
    console.log('mounted')
    console.log(this.$q.platform.is)
  }
}
</script>

<style>
</style>
