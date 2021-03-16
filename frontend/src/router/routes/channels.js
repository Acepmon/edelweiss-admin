export default [
  {
    path: '/channels/web/settings',
    name: 'channels-web-settings',
    component: () => import('@/views/channels/web/settings/Settings.vue'),
    meta: {
      pageTitle: 'Settings',
      breadcrumb: [
        {
          text: 'Channels',
        },
        {
          text: 'Online Store',
        },
        {
          text: 'Settings',
          active: true,
        },
      ],
    },
  },
]
