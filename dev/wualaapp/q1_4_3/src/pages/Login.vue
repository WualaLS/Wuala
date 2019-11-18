<template>
  <q-page padding>
    <q-card>
      <q-card-section class="wuala-card-title">
        <div>Login</div>
      </q-card-section>
      <q-card-section class="row items-start q-col-gutter-md">
        <q-input class="col-xs-12 col-sm-6 col-md-4 col-lg-3" v-model="username" float-label="Email"></q-input>
        <q-input class="col-xs-12 col-sm-6 col-md-4 col-lg-3" v-model="password" type="password" float-label="Password"></q-input>
      </q-card-section>
      <q-separator />
      <q-card-actions align="center">
        <q-btn color="light-green" @click="login">Log In</q-btn>
        <q-btn color="light-green" @click="signUp">Sign Up</q-btn>
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
export default {
  name: 'LogIn',
  data () {
    return {
      username: null,
      password: null
    }
  },
  methods: {
    signUp () {
      this.$router.push({ name: 'NewAccount' })
    },
    isGuest () {
      console.log('isGuest')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fis-guest'
      ).then((response) => {
        console.log('isGuest response')
        console.log(response.data)
      }).catch(error => {
        console.log('isGuest error')
        console.log(error)
      })
    },
    isLoggedIn () {
      console.log('isLoggedIn')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fis-logged-in'
      ).then((response) => {
        console.log('isLoggedIn response')
        console.log(response.data)
      }).catch(error => {
        console.log('isLoggedIn error')
        console.log(error)
      })
    },
    login () {
      console.log('login')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fuser-login',
        this.$qs.stringify({
          username: this.username,
          password: this.password
        })
      ).then((response) => {
        console.log('login response')
        console.log(response.data)
        if (response.data['loggedIn']) {
          this.$store.commit('user/setUser', response.data['userInfo'])
          this.$store.commit('preferences/setPreferences', response.data['Preferences'])
          this.$router.push({ name: 'ScheduleWash' })
        }
      }).catch(error => {
        console.log('login error')
        console.log(error)
      })
    }
  },
  mounted () {
    console.log('mounted')
    console.log('isGuest')
    // this.isGuest()
    console.log('isLoggedIn')
    // this.isLoggedIn()
  }
}
</script>
