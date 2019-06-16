<template>
  <q-page padding>
    <q-card>
      <q-card-title>
        Expert Edit
      </q-card-title>
      <q-stepper no-header-navigation flat ref="stepper">
        <!-- Step: -->
        <q-step default title="First Step" subtitle="Here we go">
          ...Step content, components, ...
        </q-step>

        <!-- Step: -->
        <q-step title="Step 2">...</q-step>

        <!-- Step: -->
        <q-step title="Step 3" subtitle="Review and submit">...</q-step>

        <!--
          Optional.

          "Globally" available Stepper navigation which means
          that it will be visible regardless of the current step.
          If we'd put QStepperNavigation under a QStep then we'd
          be using it for that step only.
        -->
        <q-stepper-navigation>
          <q-btn
            flat
            @click="$refs.stepper.previous()"
            label="Back"
          />
          <q-btn
            @click="$refs.stepper.next()"
            label="Next"
          />
        </q-stepper-navigation>
      </q-stepper>
      <q-card-main class="row gutter-md no-vert-gutter">
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-datetime readonly v-model="order_date" stack-label="Date" type="date" format="MM/DD/YYYY"></q-datetime></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_type" :options="typeOptions" stack-label="Wash Type"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_pick_up_time" :options="timeOptions" stack-label="Preferred Pick Up Time"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_preferred_drop_off" :options="timeOptions" stack-label="Preferred Drop Off Time"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_hypoallergenic" :options="yesNoOptions" stack-label="Hypoallergenic"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_detergent" :options="detergentOptions" stack-label="Detergent"></q-select></q-field>
        <q-field v-if="order_detergent == 4 || order_detergent == '4'" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-input readonly v-model="order_detergent_other" float-label="Other Detergent"></q-input></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_dry_heat" :options="dryHeatOptions" stack-label="Dry Temp"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_dryer_sheets" :options="yesNoOptions" stack-label="Dryer Sheets?"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_driver_id" :options="driversOptions" stack-label="Driver"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_washer_id" :options="washersOptions" stack-label="Washer"></q-select></q-field>
        <q-field class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><q-select readonly v-model="order_status" :options="statusOptions" stack-label="Status"></q-select></q-field>
        <q-field class="col-xs-12" :count="1000"><q-input readonly v-model="order_special_instructions" type="textarea" :max-height="100" :min-rows="4" stack-label="Special Instructions"></q-input></q-field>
      </q-card-main>
      <q-card-separator />
      <q-card-actions align="center">
        <q-btn color="light-green" @click="saveOrder">Picked Up</q-btn>
        <q-btn color="light-green" @click="saveOrder">Dropped Off to Washer</q-btn>
        <q-btn color="light-green" @click="saveOrder">Washer Received</q-btn>
        <q-btn color="light-green" @click="saveOrder">Washer Checklist</q-btn>
        <q-btn color="light-green" @click="saveOrder">Washer Done</q-btn>
        <q-btn color="light-green" @click="saveOrder">Driver Pick Up</q-btn>
        <q-btn color="light-green" @click="saveOrder">Drop Off</q-btn>
      </q-card-actions>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
import UserComputeds from 'pages/UserComputeds.js'

export default {
  name: 'ScheduleWash',
  components: {
  },
  props: {
    orderId: { required: true }
  },
  mixins: [UserComputeds],
  data () {
    return {
      order_id: null,
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
      order_admin_notes: null,
      order_driver_id: null,
      order_washer_id: null,
      order_drop_off_washer_driver: null,
      order_drop_off_washer_washer: null,
      order_pick_up_washer_driver: null,
      order_pick_up_washer_washer: null,
      order_checklist_washer: null,
      customerName: null,
      customerAddress: null,
      customerPhoneNumber: null,
      driversOptions: [],
      washersOptions: [],
      statusOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Pending',
          value: 0
        },
        {
          label: 'Processing',
          value: 1
        },
        {
          label: 'Completed',
          value: 2
        }
      ],
      typeOptions: [
        {
          label: 'Choose...',
          value: null
        },
        {
          label: 'Single Wash $35',
          value: 0
        },
        {
          label: 'Pro',
          value: 1
        },
        {
          label: 'Premium',
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
      ]
    }
  },
  methods: {
    saveOrder () {
      console.log('scheduleWash')
      let UpModel = {
        'order_id': this.order_id,
        'order_bags': this.order_bags,
        'order_hypoallergenic': this.order_hypoallergenic,
        'order_detergent': this.order_detergent,
        'order_detergent_other': this.order_detergent_other,
        'order_dry_heat': this.order_dry_heat,
        'order_dryer_sheets': this.order_dryer_sheets,
        'order_user_id': this.order_user_id,
        'order_date': this.order_date,
        'order_pick_up_time': this.order_pick_up_time,
        'order_preferred_drop_off': this.order_preferred_drop_off,
        'order_status': this.order_status,
        'order_special_instructions': this.order_special_instructions,
        'order_driver_id': this.order_driver_id,
        'order_washer_id': this.order_washer_id,
        'order_admin_notes': this.order_admin_notes
      }
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fput-order-ajax',
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
    },
    getOrder () {
      console.log('getOrder')
      let UpModel = {
        'order_id': this.orderId
      }
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fget-order',
        this.$qs.stringify({
          UpModel: UpModel
        })
      ).then((response) => {
        console.log('save response')
        console.log(response.data)
        this.order_id = response.data.order_id
        this.order_bags = response.data.order_bags
        this.order_hypoallergenic = response.data.order_hypoallergenic
        this.order_detergent = response.data.order_detergent
        this.order_detergent_other = response.data.order_detergent_other
        this.order_dry_heat = response.data.order_dry_heat
        this.order_dryer_sheets = response.data.order_dryer_sheets
        this.order_user_id = response.data.order_user_id
        this.order_date = response.data.order_date
        this.order_pick_up_time = response.data.order_pick_up_time
        this.order_preferred_drop_off = response.data.order_preferred_drop_off
        this.order_status = response.data.order_status
        this.order_special_instructions = response.data.order_special_instructions
        this.order_admin_notes = response.data.order_admin_notes
        this.order_driver_id = response.data.order_driver_id
        this.order_washer_id = response.data.order_washer_id
      }).catch(error => {
        console.log('save error')
        console.log(error)
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Failed to get order'
        })
      })
    },
    getDriversDropdown () {
      console.log('getDriversDropdown')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fget-drivers-dropdown'
      ).then((response) => {
        console.log('getDriversDropdown response')
        console.log(response.data)
        this.driversOptions = response.data
      }).catch(error => {
        console.log('save error')
        console.log(error)
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Failed to get drivers dropdown'
        })
      })
    },
    getWashersDropdown () {
      console.log('getWashersDropdown')
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fget-washers-dropdown'
      ).then((response) => {
        console.log('getWashersDropdown response')
        console.log(response.data)
        this.washersOptions = response.data
      }).catch(error => {
        console.log('save error')
        console.log(error)
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Failed to get washers dropdown'
        })
      })
    }
  },
  mounted () {
    console.log('mounted')
    this.getOrder()
    this.getDriversDropdown()
    this.getWashersDropdown()
  }
}
</script>
