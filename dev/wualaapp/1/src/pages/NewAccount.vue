<template>
  <q-page class="flex flex-center">
    <q-btn @click="ajaxTest">Ajax Test</q-btn>
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
    }
  }
}
</script>
