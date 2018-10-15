<template>
  <q-page padding>
    <div>
      <gmap-map
        :center="center"
        :zoom="4"
        style="height: 450px; width: 100%"
      >
        <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened">
        </gmap-info-window>
        <gmap-marker
        >
        </gmap-marker>
      </gmap-map>
    </div>
    <q-card>
      <q-card-main>
         Hello Geoffrey<br>
         Lets get washing!
         <br>
         <q-search
          v-model="searchWasher"
          :debounce="600"
          placeholder="Search"
          icon="mdi-magnify"
          float-label="Address"
        />
      </q-card-main>
      <q-card-separator />
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyAEG70Sgdk9zwFxL4K4usPuGZEqQIvQ1eU',
    libraries: 'places'
  }
})

export default {
  name: 'WualaMap',
  data () {
    return {
      searchWasher: null,
      infoPosition: null,
      infoOpened: null,
      infoCurrentKey: null,
      infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35
        }
      },
      center: {lat: 33.7490, lng: -84.3880}
    }
  },
  methods: {
  },
  mounted () {
    console.log('mounted')
  }
}
</script>
