export default [
  {
    path: '/manage/orders/all',
    name: 'manage-orders-all',
    component: () => import('@/views/manage/orders/OrdersAll.vue'),
    meta: {
      pageTitle: 'All Orders',
      breadcrumb: [
        {
          text: 'Orders',
        },
        {
          text: 'All Orders',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/orders/drafts',
    name: 'manage-orders-drafts',
    component: () => import('@/views/manage/orders/OrdersDrafts.vue'),
    meta: {
      pageTitle: 'Drafts',
      breadcrumb: [
        {
          text: 'Orders',
        },
        {
          text: 'Drafts',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/orders/abondoned',
    name: 'manage-orders-abondoned',
    component: () => import('@/views/manage/orders/OrdersAbondoned.vue'),
    meta: {
      pageTitle: 'Abondoned Carts',
      breadcrumb: [
        {
          text: 'Orders',
        },
        {
          text: 'Abondoned Carts',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/products/all',
    name: 'manage-products-all',
    component: () => import('@/views/manage/products/ProductsAll.vue'),
    meta: {
      pageTitle: 'Products',
      breadcrumb: [
        {
          text: 'Products',
        },
        {
          text: 'All Products',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/products/inventory',
    name: 'manage-products-inventory',
    component: () => import('@/views/manage/products/ProductsInventory.vue'),
    meta: {
      pageTitle: 'Inventory',
      breadcrumb: [
        {
          text: 'Products',
        },
        {
          text: 'Inventory',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/products/transfers',
    name: 'manage-products-transfers',
    component: () => import('@/views/manage/products/ProductsTransfers.vue'),
    meta: {
      pageTitle: 'Transfers',
      breadcrumb: [
        {
          text: 'Products',
        },
        {
          text: 'Transfers',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/products/collections',
    name: 'manage-products-collections',
    component: () => import('@/views/manage/products/ProductsCollections.vue'),
    meta: {
      pageTitle: 'Collections',
      breadcrumb: [
        {
          text: 'Products',
        },
        {
          text: 'Collections',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/products/smart-gifts',
    name: 'manage-products-smart-gifts',
    component: () => import('@/views/manage/products/ProductsSmartGifts.vue'),
    meta: {
      pageTitle: 'Smart Gifts',
      breadcrumb: [
        {
          text: 'Products',
        },
        {
          text: 'Smart Gifts',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/customers',
    name: 'manage-customers',
    component: () => import('@/views/manage/Customers.vue'),
    meta: {
      pageTitle: 'Customers',
      breadcrumb: [
        {
          text: 'Customers',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/analytics',
    name: 'manage-analytics',
    component: () => import('@/views/manage/Analytics.vue'),
    meta: {
      pageTitle: 'Analytics',
      breadcrumb: [
        {
          text: 'Analytics',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/discounts',
    name: 'manage-discounts',
    component: () => import('@/views/manage/Discounts.vue'),
    meta: {
      pageTitle: 'Discounts',
      breadcrumb: [
        {
          text: 'Discounts',
          active: true,
        },
      ],
    },
  },
]
