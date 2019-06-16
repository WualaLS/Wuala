<template>
  <q-select
    :stack-label="stackLabel"
    :float-label="floatLabel"
    v-model="selectedValue"
    :options="selectOptions"
    @change="inputChange"
   />
</template>

<script>
/*
      <q-select
    v-model="select"
    :options="selectOptions"
  />
<select v-model="text" ref="state" @input="input" >
  <option value >Choose...</option>
  <option v-for="state in states" :value="state.abbreviation">{{ state.name }}</option>
</select>
*/
// value: { default: '', required: true },

export default {
  name: 'RuiStateInput',
  components: {
  },
  props: {
    value: { type: String, required: false },
    stackLabel: { required: false, default: null },
    floatLabel: { required: false, default: null }
  },
  data () {
    return {
      selectOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Alabama',
          value: 'AL'
        },
        {
          label: 'Alaska',
          value: 'AK'
        },
        {
          label: 'Arizona',
          value: 'AZ'
        },
        {
          label: 'Arkansas',
          value: 'AR'
        },
        {
          label: 'California',
          value: 'CA'
        },
        {
          label: 'Colorado',
          value: 'CO'
        },
        {
          label: 'Connecticut',
          value: 'CT'
        },
        {
          label: 'Delaware',
          value: 'DE'
        },
        {
          label: 'District Of Columbia',
          value: 'DC'
        },
        {
          label: 'Florida',
          value: 'FL'
        },
        {
          label: 'Georgia',
          value: 'GA'
        },
        {
          label: 'Hawaii',
          value: 'HI'
        },
        {
          label: 'Idaho',
          value: 'ID'
        },
        {
          label: 'Illinois',
          value: 'IL'
        },
        {
          label: 'Indiana',
          value: 'IN'
        },
        {
          label: 'Iowa',
          value: 'IA'
        },
        {
          label: 'Kansas',
          value: 'KS'
        },
        {
          label: 'Kentucky',
          value: 'KY'
        },
        {
          label: 'Louisiana',
          value: 'LA'
        },
        {
          label: 'Maine',
          value: 'ME'
        },
        {
          label: 'Maryland',
          value: 'MD'
        },
        {
          label: 'Massachusetts',
          value: 'MA'
        },
        {
          label: 'Michigan',
          value: 'MI'
        },
        {
          label: 'Minnesota',
          value: 'MN'
        },
        {
          label: 'Mississippi',
          value: 'MS'
        },
        {
          label: 'Missouri',
          value: 'MO'
        },
        {
          label: 'Montana',
          value: 'MT'
        },
        {
          label: 'Nebraska',
          value: 'NE'
        },
        {
          label: 'Nevada',
          value: 'NV'
        },
        {
          label: 'New Hampshire',
          value: 'NH'
        },
        {
          label: 'New Jersey',
          value: 'NJ'
        },
        {
          label: 'New Mexico',
          value: 'NM'
        },
        {
          label: 'New York',
          value: 'NY'
        },
        {
          label: 'North Carolina',
          value: 'NC'
        },
        {
          label: 'North Dakota',
          value: 'ND'
        },
        {
          label: 'Ohio',
          value: 'OH'
        },
        {
          label: 'Oklahoma',
          value: 'OK'
        },
        {
          label: 'Oregon',
          value: 'OR'
        },
        {
          label: 'Pennsylvania',
          value: 'PA'
        },
        {
          label: 'Rhode Island',
          value: 'RI'
        },
        {
          label: 'South Carolina',
          value: 'SC'
        },
        {
          label: 'South Dakota',
          value: 'SD'
        },
        {
          label: 'Tennessee',
          value: 'TN'
        },
        {
          label: 'Texas',
          value: 'TX'
        },
        {
          label: 'Utah',
          value: 'UT'
        },
        {
          label: 'Vermont',
          value: 'VT'
        },
        {
          label: 'Virgin Islands',
          value: 'VI'
        },
        {
          label: 'Virginia',
          value: 'VA'
        },
        {
          label: 'Washington',
          value: 'WA'
        },
        {
          label: 'West Virginia',
          value: 'WV'
        },
        {
          label: 'Wisconsin',
          value: 'WI'
        },
        {
          label: 'Wyoming',
          value: 'WY'
        }
      ]
    }
  },
  mounted () {
  },
  computed: {
    selectedValue: {
      get () {
        return this.value
      },
      set (value) {
      }
    }
  },
  watch: {
  },
  methods: {
    inputChange (newValue) {
      console.log('input')
      console.log(newValue)
      this.$emit('input', newValue)
    }
  }
}
</script>

<style>
</style>
