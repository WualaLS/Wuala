<template>
  <q-page padding>
    <q-card>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="subscribers_first_name" float-label="Username"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="subscribers_last_name" type="password" float-label="Password"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="subscribers_email" type="password" float-label="Password"></q-input></q-field>
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
export default {
  name: 'LogIn',
  data () {
    return {
      subscribers_first_name: null,
      subscribers_lasr_name: null,
      subscribers_email: null,
      subscribers_washer,
    }
  },
  methods: {
    subscribe (){
      
    }
  },
  mounted () {
    console.log('mounted')
  }
}
</script>
