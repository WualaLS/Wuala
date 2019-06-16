<template>
  <q-page padding>
    <q-list>
      <q-collapsible icon="mdi-account" label="General" opened>
        <q-item class="row gutter-sm">
          <q-field :error="$v.user_first_name.$error" error-label="Required, Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_first_name" float-label="First Name"></q-input></q-field>
          <q-field :error="$v.user_last_name.$error" error-label="Required, Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_last_name" float-label="Last Name"></q-input></q-field>
          <q-field :error="$v.user_username.$error" error-label="Required, Please enter a valid email address, Max Length: 45" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input readonly v-model="user_username" float-label="Email/User Name"></q-input></q-field>
          <q-field :error="$v.user_birthday.$error" error-label="Valid Date" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><date-picker v-model="user_birthday" float-label="Birthday"></date-picker></q-field>
          <q-field :error="$v.user_mobile_number.$error" error-label="Required, Max Length: 45" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_mobile_number" float-label="Phone Number"></q-input></q-field>
        </q-item>
      </q-collapsible>
      <q-collapsible icon="mdi-home" label="Address">
        <q-item class="row gutter-sm">
          <q-field :error="$v.user_address_line_one.$error" error-label="Required, Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_address_line_one" float-label="Address Line 1"></q-input></q-field>
          <q-field :error="$v.user_address_line_two.$error" error-label="Max Length: 128" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_address_line_two" float-label="Address Line 2"></q-input></q-field>
          <q-field :error="$v.user_city.$error" error-label="Required, Max Length: 45" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_city" float-label="City"></q-input></q-field>
          <q-field :error="$v.user_state.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><state-select v-model="user_state" stack-label="State"></state-select></q-field>
          <q-field :error="$v.user_zip.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="user_zip" float-label="Zip"></q-input></q-field>
        </q-item>
      </q-collapsible>
      <q-collapsible icon="mdi-account-settings" label="Preferences">
        <q-item class="row gutter-sm">
          <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="preferences_hypoallergenic" :options="yesNoOptions" stack-label="Hypoallergenic?"></q-select></q-field>
          <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="preferences_detergent" :options="detergentOptions" stack-label="Detergent"></q-select></q-field>
          <q-field v-if="preferences_detergent == 4 || preferences_detergent == '4'" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="preferences_detergent_other" float-label="Other Detergent"></q-input></q-field>
          <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="preferences_dry_heat" :options="dryHeatOptions" stack-label="Dry Temp"></q-select></q-field>
          <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="preferences_dryer_sheets" :options="yesNoOptions" stack-label="Dryer Sheets?"></q-select></q-field>
        </q-item>
      </q-collapsible>
      <q-collapsible v-if="user_driver === 1 || user_washer === 1" icon="mdi-account-card-details" label="Expert Info">
        <q-item class="row gutter-sm"></q-item>
      </q-collapsible>
      <q-collapsible icon="mdi-star" label="Subscription">
        <q-item class="row gutter-sm">Coming Soon</q-item>
      </q-collapsible>
      <q-collapsible icon="mdi-credit-card" label="Payment Info">
        <q-item class="row gutter-sm">Coming Soon</q-item>
      </q-collapsible>
    </q-list>
    <q-layout-footer>
      <q-toolbar>
        <q-btn flat @click="save" icon="save">Save</q-btn>
      </q-toolbar>
    </q-layout-footer>
  </q-page>
</template>

<style>
</style>

<script>
import UserComputeds from 'pages/UserComputeds.js'
import PreferenceComputeds from 'pages/PreferenceComputeds.js'
import DatePicker from 'components/DatePicker'
import StateSelect from 'components/StateSelect'
import {required, maxLength} from 'vuelidate/lib/validators'
import email from 'components/validators/email.js'
import date from 'components/validators/date.js'

export default {
  name: 'MyAccount',
  components: {
    DatePicker,
    StateSelect
  },
  mixins: [UserComputeds, PreferenceComputeds],
  data () {
    return {
      showAllErrors: false,
      yesNoOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Yes',
          value: 1
        },
        {
          label: 'No',
          value: 0
        }
      ],
      detergentOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Persil',
          value: 0
        },
        {
          label: 'Tide',
          value: 1
        },
        {
          label: 'Arm & Hammer',
          value: 2
        },
        {
          label: 'Gain',
          value: 3
        },
        {
          label: 'Other',
          value: 4
        }
      ],
      dryHeatOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Low',
          value: 0
        },
        {
          label: 'Medium',
          value: 1
        },
        {
          label: 'High',
          value: 2
        },
        {
          label: 'Hang Dry',
          value: 3
        }
      ]
    }
  },
  watch: {
    showAllErrors: function (newValue) {
      if (newValue) {
        this.$v.$touch()
      } else {
        this.$v.$reset()
      }
    }
  },
  methods: {
    save () {
      if (this.$v.$invalid) {
        this.showAllErrors = true
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Please fix all errors to continue',
          position: 'bottom'
        })
      } else {
        console.log('save')
        this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fput-user-profile-ajax',
          this.$qs.stringify({
            UpModel: this.$store.state.user,
            UpModelPreferences: this.$store.state.preferences
          })
        ).then((response) => {
          console.log('save response')
          console.log(response.data)
          if (response.data['saved']) {
            this.$q.notify({
              color: 'green',
              icon: 'done',
              message: 'Saved'
            })
          } else {
            this.$q.notify({
              color: 'negative',
              icon: 'warning',
              message: 'Failed to save'
            })
          }
        }).catch(error => {
          console.log('save error')
          console.log(error)
          this.$q.notify({
            color: 'negative',
            icon: 'warning',
            message: 'Failed to save'
          })
        })
      }
    },
    editAddress () {
      this.$router.push({name: 'EditAddress'})
    }
  },
  mounted () {
    console.log('mounted')
    console.log(this.$store.state.user.user_id)
    this.order_date = this.$moment().format('YYYY-MM-DD')
    console.log(this.order_date)
  },
  validations: {
    user_first_name: {
      required,
      maxLength: maxLength(128)
    },
    user_last_name: {
      required,
      maxLength: maxLength(128)
    },
    user_username: {
      email,
      required,
      maxLength: maxLength(45)
    },
    user_birthday: {
      date
    },
    user_mobile_number: {
      required,
      maxLength: maxLength(45)
    },
    user_address_line_one: {
      required,
      maxLength: maxLength(128)
    },
    user_address_line_two: {
      maxLength: maxLength(128)
    },
    user_city: {
      required,
      maxLength: maxLength(45)
    },
    user_state: {
      required
    },
    user_zip: {
      required
    }
  }
}
</script>
