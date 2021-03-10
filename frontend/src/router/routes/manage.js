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
    path: '/manage/products',
    name: 'manage-products',
    component: () => import('@/views/manage/products/Products.vue'),
    redirect: { name: 'manage-products-grid' },
    children: [
      {
        path: '',
        name: 'manage-products-grid',
        component: () => import('@/views/manage/products/ProductsGrid.vue'),
        meta: {
          pageTitle: 'Products',
          breadcrumb: [
            {
              text: 'Products',
              active: true,
            },
          ],
        },
      },
      {
        path: 'create',
        name: 'manage-products-create',
        component: () => import('@/views/manage/products/ProductsCreate.vue'),
        meta: {
          backTo: { name: 'manage-products-grid' },
          pageTitle: 'Add Product',
          breadcrumb: [
            {
              text: 'Products',
              to: { name: 'manage-products-grid' }
            },
            {
              text: 'Create',
              active: true
            }
          ],
        },
      }
    ]
  },
  {
    path: '/manage/inventory',
    name: 'manage-inventory',
    component: () => import('@/views/manage/inventory/Inventory.vue'),
    meta: {
      pageTitle: 'Inventory',
      breadcrumb: [
        {
          text: 'Inventory',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/transfers',
    name: 'manage-transfers',
    component: () => import('@/views/manage/transfers/Transfers.vue'),
    meta: {
      pageTitle: 'Transfers',
      breadcrumb: [
        {
          text: 'Transfers',
          active: true,
        },
      ],
    },
  },
  {
    path: '/manage/collections',
    name: 'manage-collections',
    component: () => import('@/views/manage/collections/Collections.vue'),
    redirect: { name: 'manage-collections-grid' },
    children: [
      {
        path: '',
        name: 'manage-collections-grid',
        component: () => import('@/views/manage/collections/CollectionsGrid.vue'),
        meta: {
          pageTitle: 'Collections',
          breadcrumb: [
            {
              text: 'Collections',
              active: true,
            },
          ],
        },
      }
    ]
  },
  {
    path: '/manage/categories',
    name: 'manage-categories',
    component: () => import('@/views/manage/categories/Categories.vue'),
    redirect: { name: 'manage-categories-grid' },
    children: [
      {
        path: '',
        name: 'manage-categories-grid',
        component: () => import('@/views/manage/categories/CategoriesGrid.vue'),
        meta: {
          pageTitle: 'Categories',
          breadcrumb: [
            {
              text: 'Categories',
              active: true,
            },
          ],
        },
      }
    ]
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
