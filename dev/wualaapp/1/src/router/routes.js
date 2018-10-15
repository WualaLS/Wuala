
export default [
  {
    path: '/',
    component: () => import('layouts/default'),
    children: [
      { name: 'LogIn', path: '/log-in', component: () => import('pages/LogIn') },
      { name: 'HomePage', path: '/home-page', component: () => import('pages/HomePage') }
    ]
  },
  {
    path: '/',
    component: () => import('layouts/NewAccountLayout'),
    children: [
      // { name: 'LogIn', path: '/log-in', component: () => import('pages/LogIn') },
      { name: 'NewAccount', path: '/new-account', component: () => import('pages/NewAccount') }
    ]
  },
  {
    path: '/',
    component: () => import('layouts/MyAccountLayout'),
    children: [
      // { name: 'LogIn', path: '/log-in', component: () => import('pages/LogIn') },
      { name: 'MyAccount', path: '/my-account', component: () => import('pages/MyAccount') },
      { name: 'EditAddress', path: '/edit-address', component: () => import('pages/EditAddress') },
      { name: 'WualaMap', path: '/wuala-map', component: () => import('pages/WualaMap') },
      { name: 'PaymentInfo', path: '/payment-info', component: () => import('pages/PaymentInfo') },
      { name: 'WasherSignUp', path: '/washer-sign-up', component: () => import('pages/WasherSignUp') },
      { name: 'ScheduleWash', path: '/schedule-wash', component: () => import('pages/ScheduleWash') }
    ]
  },

  { // Always leave this as last one
    path: '*',
    component: () => import('pages/404')
  }
]
