<template>
  <b-card
    v-bind="cardAttrs"
    no-body
    v-on="$listeners"
  >
    <div class="card-header">
      <!-- Title & SubTitle -->
      <div>
        <b-card-title>{{ $attrs.title }}</b-card-title>
        <b-card-sub-title v-if="$attrs['sub-title']">
          {{ $attrs['sub-title'] }}
        </b-card-sub-title>
      </div>

      <b-button variant="primary">Register</b-button>
    </div>

    <b-table responsive="md" :items="items" :fields="fields">
      <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
    </b-table>

  </b-card>
</template>

<script>
import { BCard, BCardTitle, BCardSubTitle } from 'bootstrap-vue'

export default {
  name: 'crud',

  components: {
    BCard,
    BCardTitle,
    BCardSubTitle,
  },

  computed: {
    cardAttrs() {
      const cardAttrs = JSON.parse(JSON.stringify(this.$attrs))
      delete cardAttrs.title
      delete cardAttrs['sub-title']
      return cardAttrs
    },
  }
}
</script>

<style>

</style>