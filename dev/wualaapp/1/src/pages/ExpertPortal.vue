<template>
  <q-page padding>
    <q-table
      title="Assigned Orders"
      ref="washAssignedTable"
      :data="assignedWashes"
      :columns="washColumns"
      row-key="order_id"
      dense
      >
      <q-td slot="body-cell-actions" slot-scope="row">
        <q-btn small flat icon="mdi-pencil" @click="expertEditOrder(row.row.order_id)"></q-btn>
      </q-td>
    </q-table>
    <br>
    <!--<q-table
      title="Completed Washes"
      ref="washHistoryTable"
      :data="washHistory"
      :columns="washColumns"
      row-key="order_id"
      dense
    >
    </q-table>-->
  </q-page>
</template>

<style>
</style>

<script>
import Moment from 'moment'
import UserComputeds from 'pages/UserComputeds.js'

export default {
  name: 'ExpertPortal',
  mixins: [UserComputeds],
  data () {
    return {
      assignedWashes: [],
      washColumns: [
        {
          name: 'order_date',
          label: 'Date',
          field: 'order_date',
          sortable: true,
          align: 'left',
          type: 'date',
          format (value, row) {
            let m = Moment(value, 'YYYY-MM-DD')
            if (m.isValid()) {
              return m.format('MM/DD/YYYY')
            } else {
              return null
            }
          }
        },
        {
          name: 'order_bags',
          label: 'Number of Bags',
          field: 'order_bags',
          sortable: true,
          align: 'left'
        },
        {
          name: 'order_hypoallergenic',
          label: 'Hypoalergenic',
          field: 'order_hypoallergenic',
          sortable: true,
          align: 'left',
          format (value, row) {
            if (value === 1) {
              return 'Yes'
            } else if (value === 0) {
              return 'No'
            } else {
              return null
            }
          }
        },
        {
          name: 'order_status',
          label: 'Status',
          field: 'order_status',
          sortable: true,
          align: 'left',
          format (value, row) {
            if (value === 0) {
              return 'Pending'
            } else if (value === 1) {
              return 'Processing'
            } else if (value === 2) {
              return 'Completed'
            } else {
              return null
            }
          }
        },
        {
          name: 'order_pick_up',
          label: 'Picked Up',
          field: 'order_pick_up',
          sortable: true,
          align: 'left'
        },
        {
          name: 'order_drop_off',
          label: 'Droped Off',
          field: 'order_drop_off',
          sortable: true,
          align: 'left'
        },
        {
          name: 'driver_fullname',
          label: 'Driver',
          field: 'driver_fullname',
          sortable: true,
          align: 'left'
        },
        {
          name: 'washer_fullname',
          label: 'Washer',
          field: 'washer_fullname',
          sortable: true,
          align: 'left'
        },
        {
          name: 'actions',
          label: 'Actions',
          field: 'actions',
          width: '50px',
          align: 'left',
          type: 'string'
        }
      ]
    }
  },
  methods: {
    getExpertAssignedWashes () {
      console.log('getExpertAssignedWashes')
      let UpModel = {
        'user_id': this.user_id
      }
      this.$axios.post(process.env.serverPath + '/web/index.php?r=user-api%2Fget-expert-assigned-washes',
        this.$qs.stringify({
          UpModel: UpModel
        })
      ).then((response) => {
        console.log('save response')
        console.log(response.data)
        this.assignedWashes = response.data
      }).catch(error => {
        console.log('save error')
        console.log(error)
        this.$q.notify({
          color: 'negative',
          icon: 'warning',
          message: 'Failed to get assigned washes'
        })
      })
    },
    expertEditOrder (orderId) {
      this.$router.push({name: 'ExpertOrderEdit', params: { orderId: orderId }})
    }
  },
  mounted () {
    console.log('mounted')
    this.getExpertAssignedWashes()
  }
}
</script>
