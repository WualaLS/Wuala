import { firebase } from '@firebase/app'
import '@firebase/firestore'

const firebaseApp = firebase.initializeApp({
  apiKey: 'AIzaSyDCVqql91gXOK9az-r-qpGdZcBD019y_Wc',
  authDomain: 'wualaapp-a781a.firebaseapp.com',
  databaseURL: 'https://wualaapp-a781a.firebaseio.com',
  projectId: 'wualaapp-a781a',
  storageBucket: 'wualaapp-a781a.appspot.com',
  messagingSenderId: '41146969657',
  appId: '1:41146969657:web:5e12267440aef377'
})

export default async ({ Vue }) => {
  Vue.prototype.$firestore = firebaseApp.firestore()
}
