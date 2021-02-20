<template>
  <b-form-group label="Description" label-for="v-desc">
    <quill-editor
      id="v-desc"
      :value="value"
      @input="handleInput"
      placeholder="Product description here ..."
      :options="{theme: 'snow' }"
    />
  </b-form-group>
</template>

<script>
import { BFormGroup } from 'bootstrap-vue'
import { quillEditor } from 'vue-quill-editor'

export default {
  name: 'product-input-desc',

  components: {
    BFormGroup,
    quillEditor
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

<style lang="scss">
@import '@core/scss/vue/libs/quill.scss';
</style>