
export default [
  {
    path: '/',
    component: () => import('layouts/default'),
    children: [
      { name: 'Index', path: '', component: () => import('pages/index') },
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
      { name: 'ScheduleWash', path: '/schedule-wash', component: () => import('pages/ScheduleWash') },
      { name: 'History', path: '/history', component: () => import('pages/History') },
      { name: 'AdminPortal', path: '/admin-portal', component: () => import('pages/AdminPortal') },
      { name: 'AdminOrderEdit', path: '/admin-order-edit', component: () => import('pages/AdminOrderEdit'), props: true },
      { name: 'PaymentTest', path: '/payment-test', component: () => import('pages/PaymentTest'), props: true },
      { name: 'PayPalDemo', path: '/pay-pal-demo', component: () => import('pages/PayPalDemo'), props: true },
      { name: 'ExpertPortal', path: '/expert-portal', component: () => import('pages/ExpertPortal'), props: true },
      { name: 'ExpertOrderEdit', path: '/expert-order-edit', component: () => import('pages/ExpertOrderEdit'), props: true }
    ]
  },

  { // Always leave this as last one
    path: '*',
    component: () => import('pages/404')
  }
]
