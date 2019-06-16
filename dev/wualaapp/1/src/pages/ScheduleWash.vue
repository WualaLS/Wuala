<template>
  <q-page padding>
    <q-card>
      <q-card-title>
        Schedule a Wash
      </q-card-title>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field :error="$v.order_date.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-datetime v-model="order_date" stack-label="Date" type="date" format="MM/DD/YYYY"></q-datetime></q-field>
        <q-field :error="$v.order_type.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_type" :options="typeOptions" stack-label="Wash Type"></q-select></q-field>
        <q-field :error="$v.order_pick_up_time.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_pick_up_time" :options="timeOptions" stack-label="Preferred Pick Up Time"></q-select></q-field>
        <q-field :error="$v.order_preferred_drop_off.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_preferred_drop_off" :options="timeOptions" stack-label="Preferred Drop Off Time"></q-select></q-field>
        <q-field :error="$v.order_hypoallergenic.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_hypoallergenic" :options="yesNoOptions" stack-label="Hypoallergenic"></q-select></q-field>
        <q-field :error="$v.order_detergent.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_detergent" :options="detergentOptions" stack-label="Detergent"></q-select></q-field>
        <q-field v-if="order_detergent == 4 || order_detergent == '4'" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input v-model="order_detergent_other" float-label="Other Detergent"></q-input></q-field>
        <q-field :error="$v.order_dry_heat.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_dry_heat" :options="dryHeatOptions" stack-label="Dry Temp"></q-select></q-field>
        <q-field :error="$v.order_dryer_sheets.$error" error-label="Required" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select v-model="order_dryer_sheets" :options="yesNoOptions" stack-label="Dryer Sheets?"></q-select></q-field>
        <q-field :error="$v.order_special_instructions.$error" error-label="Max Length 1000" class="col-xs-12" :count="1000"><q-input v-model="order_special_instructions" type="textarea" :max-height="100" :min-rows="4" stack-label="Special Instructions"></q-input></q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="light-green" v-if="order_payment_approved == 1" @click="scheduleWash">Schedule Wash</q-btn>
        <!--<q-btn color="light-green" v-if="order_payment_approved == 0" @click="payPalModal = true">Add Payment</q-btn>-->
        <PayPal
          v-if="order_payment_approved == 0"
          amount="0.01"
          currency="USD"
          v-on:payment-completed="addPayment"
          :client="credentials">
        </PayPal>
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
import UserComputeds from 'pages/UserComputeds.js'
import PayPal from 'vue-paypal-checkout'
import { uid } from 'quasar'
import {required, maxLength} from 'vuelidate/lib/validators'

export default {
  name: 'ScheduleWash',
  components: {
    PayPal
  },
  mixins: [UserComputeds],
  data () {
    return {
      credentials: {
        sandbox: 'AZjdvPzsAtkYqUFnAO9XPo9NgFWh85rgO3H66e0NSyDgfOzdXmhrgLXXhPOLTSybcTbJs3vxYuaGJgas',
        production: 'AZjdvPzsAtkYqUFnAO9XPo9NgFWh85rgO3H66e0NSyDgfOzdXmhrgLXXhPOLTSybcTbJs3vxYuaGJgas'
      },
      order_id: uid(),
      order_bags: null,
      order_type: 0,
      order_hypoallergenic: null,
      order_detergent: null,
      order_detergent_other: null,
      order_dry_heat: null,
      order_dryer_sheets: null,
      order_user_id: null,
      order_date: null,
      order_pick_up_time: null,
      order_preferred_drop_off: null,
      order_status: 0,
      order_special_instructions: null,
      order_payment_approved: 1,
      order_payment_paypal_id: null,
      paymentOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Credit/Debit',
          value: 'Credit/Debit'
        },
        {
          label: 'Bank Account',
          value: 'Bank Account'
        }
      ],
      typeOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Single Wash',
          value: 0
        },
        {
          label: 'Pro (Coming Soon)',
          value: 1
        },
        {
          label: 'Premium (Coming Soon)',
          value: 2
        }
      ],
      numberOfBagsOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: '1',
          value: 1
        },
        {
          label: '2',
          value: 2
        }
      ],
      timeOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: '06:00AM',
          value: '06:00'
        },
        {
          label: '07:00AM',
          value: '07:00'
        },
        {
          label: '08:00AM',
          value: '08:00'
        },
        {
          label: '09:00AM',
          value: '09:00'
        },
        {
          label: '10:00AM',
          value: '10:00'
        },
        {
          label: '11:00AM',
          value: '11:00am'
        },
        {
          label: '12:00PM',
          value: '12:00'
        },
        {
          label: '01:00PM',
          value: '13:00'
        },
        {
          label: '02:00PM',
          value: '14:00'
        },
        {
          label: '03:00PM',
          value: '15:00'
        },
        {
          label: '04:00PM',
          value: '16:00'
        },
        {
          label: '05:00PM',
          value: '17:00'
        },
        {
          label: '06:00PM',
          value: '18:00'
        },
        {
          label: '07:00PM',
          value: '19:00'
        },
        {
          label: '08:00PM',
          value: '20:00'
        }
      ],
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
      ],
      showAllErrors: false
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
    addPayment (data) {
      console.log('testMethod')
      console.log(data)
    },
    scheduleWash () {
      console.log('scheduleWash')
      if (this.$v.$invalid) {
        this.showAllErrors = true
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Please fix all errors to continue',
          position: 'bottom'
        })
      } else {
        let UpModel = {
          'order_id': this.order_id,
          'order_bags': this.order_bags,
          'order_hypoallergenic': this.order_hypoallergenic,
          'order_detergent': this.order_detergent,
          'order_detergent_other': this.order_detergent_other,
          'order_dry_heat': this.order_dry_heat,
          'order_dryer_sheets': this.order_dryer_sheets,
          'order_user_id': this.user_id,
          'order_date': this.order_date,
          'order_pick_up_time': this.order_pick_up_time,
          'order_preferred_drop_off': this.order_preferred_drop_off,
          'order_status': this.order_status,
          'order_special_instructions': this.order_special_instructions
        }
        this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fschedule-wash-ajax',
          this.$qs.stringify({
            UpModel: UpModel
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
            this.$router.push({name: 'History'})
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
    done ({token, args}) {
      // token - is the token object
      // args - is an object containing the billing and shipping address if enabled
      // do stuff...
    },
    opened () {
      // do stuff
    },
    closed () {
      // do stuff
    },
    canceled () {
      // do stuff
    },
    async checkout () {
      console.log('checkout')
      console.log(this.$refs)
      // token - is the token object
      // args - is an object containing the billing and shipping address if enabled
      const { token, args } = await this.$refs.checkoutRef.open()
      console.log(token)
      console.log(args)
    },
    paymentTest () {
      console.log('paymentTest')
      this.$router.push({name: 'PaymentTest'})
    }
  },
  mounted () {
    console.log('mounted')
    console.log(this.$store.state.user.user_id)
    this.order_date = this.$moment().format('YYYY-MM-DD')
    console.log(this.order_date)
    this.order_hypoallergenic = this.$store.state.preferences.preferences_hypoallergenic
    this.order_detergent = this.$store.state.preferences.preferences_detergent
    this.order_detergent_other = this.$store.state.preferences.preferences_detergent_other
    this.order_dry_heat = this.$store.state.preferences.preferences_dry_heat
    this.order_dryer_sheets = this.$store.state.preferences.preferences_dryer_sheets
  },
  validations: {
    order_type: {
      required
    },
    order_hypoallergenic: {
      required
    },
    order_detergent: {
      required
    },
    order_dry_heat: {
      required
    },
    order_dryer_sheets: {
      required
    },
    order_date: {
      required
    },
    order_pick_up_time: {
      required
    },
    order_preferred_drop_off: {
      required
    },
    order_special_instructions: {
      maxLength: maxLength(1000)
    }
  }
}
</script>
