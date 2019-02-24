<template>
  <div id="q-app">
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
  mounted () {
    console.log('mounted')
    // this.$router.push({name: 'Index'})
    this.$router.push({name: 'LogIn'})
  }
}
</script>

<style>
</style>
