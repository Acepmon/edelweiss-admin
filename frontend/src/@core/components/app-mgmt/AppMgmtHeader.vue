<template>
  <!-- Header tabs -->
  <b-card-header header-tag="nav" class="app-mgmt-header p-0">
    <b-nav tabs class="border-bottom w-100 px-2 pt-1">
      <b-nav-item v-for="tab in tabs" :key="tab.key" :disabled="tab.disabled" :active="tab.active" v-on:click="eventTabClick(tab)">{{ $t(tab.title) }}</b-nav-item>
    </b-nav>
  </b-card-header>
</template>

<script>
import { 
  BCardHeader,
  BNav,
  BNavItem
} from 'bootstrap-vue'

export default {
  name: 'app-mgmt-header',

  components: {
    BCardHeader,
    BNav,
    BNavItem,
  },

  props: {
    tabs: {
      type: Array,
      default: []
    }
  },

  methods: {
    eventTabClick (selectedTab) {
      this.tabs.forEach(tab => {
        if (tab.key == selectedTab.key) {
          tab.active = true
        } else {
          tab.active = false
        }
      });

      this.$emit('tabClick', selectedTab)
    }
  }
}
</script>

<style>

</style>