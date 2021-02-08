export default [
  {
    path: '/admins/admins',
    name: 'admins-admins',
    component: () => import('@/views/admins/Admins.vue'),
    meta: {
      pageTitle: 'Admins',
      breadcrumb: [
        {
          text: 'Admins',
          active: true,
        },
      ],
    },
  },
  {
    path: '/admins/menus',
    name: 'admins-menus',
    component: () => import('@/views/admins/Menus.vue'),
    meta: {
      pageTitle: 'Menus',
      breadcrumb: [
        {
          text: 'Menus',
          active: true,
        },
      ],
    },
  },
  {
    path: '/admins/pages',
    name: 'admins-pages',
    component: () => import('@/views/admins/Pages.vue'),
    meta: {
      pageTitle: 'Pages',
      breadcrumb: [
        {
          text: 'Pages',
          active: true,
        },
      ],
    },
  },
  {
    path: '/admins/codes',
    name: 'admins-codes',
    component: () => import('@/views/admins/Codes.vue'),
    meta: {
      pageTitle: 'Codes',
      breadcrumb: [
        {
          text: 'Codes',
          active: true,
        },
      ],
    },
  },
]
