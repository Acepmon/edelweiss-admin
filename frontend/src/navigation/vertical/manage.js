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
      }
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
      }
    ]
  },
  {
    title: 'Customers',
    route: 'manage-customers',
    icon: 'UsersIcon'
  },
  {
    title: 'Discounts',
    route: 'manage-discounts',
    icon: 'DollarSignIcon'
  },
]
