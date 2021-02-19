export default [
  {
    path: '/system/admins',
    name: 'system-admins',
    component: () => import('@/views/system/Admins.vue'),
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
    path: '/system/codes',
    name: 'system-codes',
    component: () => import('@/views/system/codes/Codes.vue'),
    children: [
      {
        path: '',
        name: 'system-codes-grid',
        component: () => import('@/views/system/codes/CodesGrid.vue'),
        meta: {
          pageTitle: 'Codes',
          breadcrumb: [
            {
              text: 'Codes',
              active: true,
            }
          ],
        },
      },
      {
        path: ':code',
        name: 'system-codes-edit',
        component: () => import('@/views/system/codes/CodesEdit.vue'),
        meta: {
          pageTitle: 'Edit Code',
          breadcrumb: [
            {
              text: 'Codes',
            },
            {
              text: 'Edit',
              active: true,
            }
          ],
        },
      },
    ]
  },
]
