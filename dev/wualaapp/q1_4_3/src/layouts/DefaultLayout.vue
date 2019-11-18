<template>
  <q-layout view="hHh LpR lFr">
    <q-header reveal>
      <q-toolbar>
        <q-toolbar-title>
          Wuala
          <div class="text-subtitle2">Laundry Services</div>
        </q-toolbar-title>
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { openURL } from 'quasar'

export default {
  name: 'DefaultLayout',
  data () {
    return {
      leftDrawerOpen: this.$q.platform.is.desktop
    }
  },
  methods: {
    openURL
  }
}
</script>

<style>
</style>
