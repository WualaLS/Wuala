<template>
  <q-page padding>
    <!--<q-btn @click="ajaxTest">Ajax Test</q-btn>-->
    <q-card>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input float-label="Username"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input float-label="Password"></q-input></q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="primary">Log In</q-btn>
        <q-btn color="primary" @click="signUp">Sign Up</q-btn>
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
export default {
  name: 'NewAccount',
  methods: {
    ajaxTest () {
      console.log('ajaxTest')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=customers%2Ftest').then((response) => {
        console.log('response')
        console.log(response.data)
      })
    },
    signUp () {
      this.$router.push({name: 'NewAccount'})
    }
  }
}
</script>
