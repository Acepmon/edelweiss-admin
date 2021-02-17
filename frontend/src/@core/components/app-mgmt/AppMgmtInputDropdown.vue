<template>
  <b-form-checkbox-group :checked="selected" @change="handleChange">
    <b-dropdown :text="text" variant="outline-secondary" v-ripple.400="'rgba(186, 191, 199, 0.15)'" block>
      <template v-for="(option, index) in options" >
        <b-dropdown-text :key="index" class="app-mgmt-input-dropdown-item">
          <b-form-checkbox :value="option.value">
            <span class="ml-1">{{ option.text }}</span>
          </b-form-checkbox>
        </b-dropdown-text>

        <b-dropdown-divider :key="'divide_' + index"></b-dropdown-divider>
      </template>

      <b-dropdown-item @click="onClear" :disabled="selected.length == 0">
        {{ $t('Clear') }}
      </b-dropdown-item>
    </b-dropdown>
  </b-form-checkbox-group>
</template>

<script>
import { BDropdown, BDropdownItem, BDropdownText, BDropdownDivider, BFormCheckboxGroup, BFormCheckbox } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
  name: 'app-mgmt-input-dropdown',

  components: {
    BDropdown,
    BDropdownDivider,
    BDropdownItem,
    BDropdownText,
    BFormCheckboxGroup,
    BFormCheckbox
  },

  directives: {
    Ripple,
  },

  props: {
    selected: {
      type: Array,
      default: () => []
    },

    text: {
      type: String,
      default: 'Dropdown'
    },

    options: {
      type: Array,
      default: []
    },

    multiple: {
      type: Boolean,
      default: false
    }
  },

  model: {
    prop: 'selected',
    event: 'change'
  },

  methods: {
    onClear () {
      this.$emit('input', [])
      this.$emit('change')
    },

    handleChange (val) {
      this.$emit('input', val)
      this.$emit('change')
    }
  }
}
</script>

<style scoped>
.app-mgmt-input-dropdown-item {
  width: 200px;
}
</style>