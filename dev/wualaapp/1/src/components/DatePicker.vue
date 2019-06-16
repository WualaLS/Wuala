<template>
  <q-datetime :stack-label="stackLabel" :float-label="floatLabel" v-model="datePicker" type="date" :first-day-of-week="1" format="MM/DD/YYYY" @input="dateChange" :disable="disable" :readonly="readonly"/>
</template>

<script>
// import Moment from 'moment'

export default {
  name: 'DatePicker',
  props: {
    value: { default: null, required: true },
    disable: { default: null, required: false },
    readonly: { default: null, required: false },
    stackLabel: { default: null, required: false },
    floatLabel: { default: null, required: false }
  },
  data () {
    return {
    }
  },
  mounted () {
  },
  computed: {
    datePicker: {
      get () {
        return this.convert2Picker(this.value)
      },
      set (value) {
      }
    }
  },
  methods: {
    dateChange (newDate) {
      this.$emit('input', this.convert2Date(newDate))
    },
    convert2Picker (value) {
      var m = this.$moment(value, 'YYYY-MM-DD')
      if (m.isValid()) {
        return m.format('YYYY-MM-DDTHH:mm:ss.SSSZ')
      } else {
        return null
      }
    },
    convert2Date (value) {
      var m = this.$moment.utc(value)
      if (m.isValid()) {
        return m.format('YYYY-MM-DD')
      } else {
        return null
      }
    }
  }
}
</script>
