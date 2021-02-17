<template>
  <!-- basic search -->
  <b-input-group class="input-group-merge app-mgmt-search">
    <b-input-group-prepend is-text>
      <feather-icon icon="SearchIcon" />
    </b-input-group-prepend>
    <b-form-input placeholder="Search" :value="value" @input="handleInput" />
  </b-input-group>
</template>

<script>
import {
  BInputGroup,
  BInputGroupPrepend,
  BFormInput,
} from 'bootstrap-vue'

export default {
  name: 'app-mgmt-input-search',

  components: {
    BInputGroup,
    BInputGroupPrepend,
    BFormInput
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      type: String,
      default: null
    }
  },

  methods: {
    handleInput (changedValue) {
      this.$emit('input', changedValue)
    }
  }
}
</script>

<style>

</style>