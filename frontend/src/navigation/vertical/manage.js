export default [
  {
    header: 'Manage',
  },
  {
    title: 'Orders',
    icon: 'DownloadIcon',
    children: [
      {
        title: 'Orders',
        route: 'manage-orders-all'
      },
      {
        title: 'Drafts',
        route: 'manage-orders-drafts'
      },
      {
        title: 'Abondoned carts',
        route: 'manage-orders-abondoned'
      },
    ]
  },
  {
    title: 'Products',
    icon: 'TagIcon',
    children: [
      {
        title: 'All Products',
        route: 'manage-products-all'
      },
      {
        title: 'Inventory',
        route: 'manage-products-inventory'
      },
      {
        title: 'Transfers',
        route: 'manage-products-transfers'
      },
      {
        title: 'Collections',
        route: 'manage-products-collections'
      },
      {
        title: 'Smart Gifts',
        route: 'manage-products-smart-gifts'
      },
    ]
  },
  {
    title: 'Customers',
    route: 'manage-customers',
    icon: 'UsersIcon'
  },
  {
    title: 'Analytics',
    route: 'manage-analytics',
    icon: 'BarChartIcon'
  },
  {
    title: 'Discounts',
    route: 'manage-discounts',
    icon: 'DollarSignIcon'
  },
]
