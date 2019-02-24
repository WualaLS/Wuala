import twilio from 'twilio'

export default ({ Vue }) => {
  Vue.prototype.$twilio = twilio
}
