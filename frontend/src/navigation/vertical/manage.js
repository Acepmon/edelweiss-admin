export default [
  {
    header: 'nav.manage',
  },
  {
    title: 'nav.orders',
    icon: 'DownloadIcon',
    children: [
      {
        title: 'nav.all-orders',
        route: 'manage-orders-all'
      },
      {
        title: 'nav.drafts',
        route: 'manage-orders-drafts'
      }
    ]
  },
  {
    title: 'nav.products',
    icon: 'TagIcon',
    children: [
      {
        title: 'nav.all-products',
        route: 'manage-products'
      },
      {
        title: 'nav.inventory',
        route: 'manage-inventory'
      },
      {
        title: 'nav.transfers',
        route: 'manage-transfers'
      },
      {
        title: 'nav.collections',
        route: 'manage-collections'
      },
      {
        title: 'nav.categories',
        route: 'manage-categories'
      }
    ]
  },
  {
    title: 'nav.customers',
    route: 'manage-customers',
    icon: 'UsersIcon'
  },
  {
    title: 'nav.discounts',
    route: 'manage-discounts',
    icon: 'DollarSignIcon'
  },
]
