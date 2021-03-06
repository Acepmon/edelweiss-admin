export default [
  {
    path: '/manage/orders',
    name: 'manage-orders',
    component: () => import('@/views/manage/orders/Orders.vue'),
    children: [
      {
        path: '',
        name: 'manage-orders-grid',
        component: () => import('@/views/manage/orders/OrdersGrid.vue'),
        redirect: { name: 'manage-orders-grid-all' },
        children: [
          {
            path: 'all',
            name: 'manage-orders-grid-all',
            component: () => import('@/views/manage/orders/OrdersGridAll.vue'),
            meta: {
              pageTitle: 'Orders',
              breadcrumb: [
                {
                  text: 'Orders',
                },
                {
                  text: 'All',
                  active: true
                }
              ]
            },
          },
          {
            path: 'unfulfilled',
            name: 'manage-orders-grid-unfulfilled',
            component: () => import('@/views/manage/orders/OrdersGridUnfulfilled.vue'),
            meta: {
              pageTitle: 'Orders',
              breadcrumb: [
                {
                  text: 'Orders',
                },
                {
                  text: 'Unfulfilled',
                  active: true
                }
              ]
            },
          },
          {
            path: 'unpaid',
            name: 'manage-orders-grid-unpaid',
            component: () => import('@/views/manage/orders/OrdersGridUnpaid.vue'),
            meta: {
              pageTitle: 'Orders',
              breadcrumb: [
                {
                  text: 'Orders',
                },
                {
                  text: 'Unpaid',
                  active: true
                }
              ]
            },
          },
          {
            path: 'open',
            name: 'manage-orders-grid-open',
            component: () => import('@/views/manage/orders/OrdersGridOpen.vue'),
            meta: {
              pageTitle: 'Orders',
              breadcrumb: [
                {
                  text: 'Orders',
                },
                {
                  text: 'Open',
                  active: true
                }
              ]
            },
          },
          {
            path: 'closed',
            name: 'manage-orders-grid-closed',
            component: () => import('@/views/manage/orders/OrdersGridClosed.vue'),
            meta: {
              pageTitle: 'Orders',
              breadcrumb: [
                {
                  text: 'Orders',
                },
                {
                  text: 'Closed',
                  active: true
                }
              ]
            },
          }
        ]
      },
      {
        path: ':order',
        name: 'manage-orders-details',
        component: () => import('@/views/manage/orders/OrdersDetails.vue'),
        meta: {
          backTo: { name: 'manage-orders-grid' },
          pageTitle: 'Order Details',
          breadcrumb: [
            {
              text: 'Orders',
            },
            {
              text: 'Details',
              active: true
            }
          ],
        }
      },
      {
        path: ':order/edit',
        name: 'manage-orders-edit',
        component: () => import('@/views/manage/orders/OrdersEdit.vue'),
        meta: {
          backTo: { name: 'manage-orders-grid' },
          pageTitle: 'Edit Order',
          breadcrumb: [
            {
              text: 'Orders',
            },
            {
              text: 'Details'
            },
            {
              text: 'Edit',
              active: true
            }
          ],
        }
      }
    ]
  },
  {
    path: '/manage/drafts',
    name: 'manage-drafts',
    component: () => import('@/views/manage/drafts/Drafts.vue'),
    children: [
      {
        path: '',
        name: 'manage-drafts-grid',
        component: () => import('@/views/manage/drafts/DraftsGrid.vue'),
        meta: {
          pageTitle: 'Drafts',
          breadcrumb: [
            {
              text: 'Drafts',
              active: true,
            },
          ],
        },
      },
    ]
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
      },
      {
        path: ':product',
        name: 'manage-products-edit',
        component: () => import('@/views/manage/products/ProductsEdit.vue'),
        meta: {
          backTo: { name: 'manage-products-grid' },
          pageTitle: 'Add Product',
          breadcrumb: [
            {
              text: 'Products',
              to: { name: 'manage-products-grid' }
            },
            {
              text: 'Edit Product',
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
      },
      {
        path: ':category',
        name: 'manage-categories-edit',
        component: () => import('@/views/manage/categories/CategoriesEdit.vue'),
        meta: {
          backTo: { name: 'manage-categories-grid' },
          pageTitle: 'Edit Category',
          breadcrumb: [
            {
              text: 'Categories',
              to: { name: 'manage-categories-grid' }
            },
            {
              text: 'Edit Category',
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
