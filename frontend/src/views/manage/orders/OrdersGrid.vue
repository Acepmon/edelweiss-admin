<template>
  <app-mgmt>
    <app-mgmt-header :tabs="tabs" @tabClick="onTabClick"></app-mgmt-header>

    <router-view></router-view>
    
  </app-mgmt>
</template>

<script>
import AppMgmt from '@/@core/components/app-mgmt/AppMgmt.vue'
import AppMgmtHeader from '@/@core/components/app-mgmt/AppMgmtHeader.vue'
import AppMgmtButton from '@/@core/components/app-mgmt/AppMgmtButton.vue'

export default {
  name: 'manage-orders-grid',

  components: {
    AppMgmt,
    AppMgmtHeader,
    AppMgmtButton,
  },

  data () {
    return {
      tabs: [
        { key: 'all', title: 'All', active: true },
        { key: 'unfulfilled', title: 'Unfulfilled', active: false },
        { key: 'unpaid', title: 'Unpaid', active: false },
        { key: 'open', title: 'Open', active: false },
        { key: 'closed', title: 'Closed', active: false },
      ],
    }
  },

  methods: {
    onTabClick (tab) {
      switch (tab.key) {
        case 'all':
          this.$router.push({name: 'manage-orders-grid-all'})
          break;
        case 'unfulfilled':
          this.$router.push({name: 'manage-orders-grid-unfulfilled'})
          break;
        case 'unpaid':
          this.$router.push({name: 'manage-orders-grid-unpaid'})
          break;
        case 'open':
          this.$router.push({name: 'manage-orders-grid-open'})
          break;
        case 'closed':
          this.$router.push({name: 'manage-orders-grid-closed'})
          break;
        default:
          break;
      }
    }
  }
}
</script>

<style>

</style>