import {
  withParams
} from 'vuelidate/lib/'
export default (date) => withParams({type: 'date'}, value => {
  let timestamp = Date.parse(value)
  if (isNaN(timestamp) === false) {
    return false
  } else {
    return true
  }
})
