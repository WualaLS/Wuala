
export default [
  {
    path: '/',
    component: () => import('layouts/default'),
    children: [
      { name: 'LogIn', path: '/log-in', component: () => import('pages/LogIn') },
      { name: 'NewAccount', path: '/new-account', component: () => import('pages/NewAccount') }
    ]
  },

  { // Always leave this as last one
    path: '*',
    component: () => import('pages/404')
  }
]
