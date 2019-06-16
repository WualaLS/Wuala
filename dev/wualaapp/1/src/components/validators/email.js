import {
  withParams
} from 'vuelidate/lib/'
export default withParams({
  type: 'email'
}, value => {
  // console.log(value)
  // console.log(typeof value)
  if (typeof value === 'string') {
    if (value.trim() === '') {
      return true
    } else {
      return value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) !== null
    }
  } else if (value === null) {
    return true
  } else {
    return false
  }
})
