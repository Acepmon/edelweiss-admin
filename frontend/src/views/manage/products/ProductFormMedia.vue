<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Media</b-card-title>
      <feather-icon
        icon="MoreVerticalIcon"
        size="18"
        class="cursor-pointer"
      />
    </b-card-header>
    <b-card-body>
      
      <b-row cols="2" cols-md="4" cols-lg="6">
        <b-col v-for="(item, index) in value" :key="index">
          <b-card no-body :img-src="item.image" img-top>
            <b-card-body class="p-1 text-nowrap text-truncate">
              <b-button variant="flat-dark" class="btn-icon float-right" size="sm">
                <feather-icon icon="XIcon"></feather-icon>
              </b-button>

              <span class="text-muted" style="line-height: 2;">{{ item.name }}</span>
            </b-card-body>
          </b-card>
        </b-col>

        <b-col>
          <b-card class="border border-2 text-center cursor-pointer" style="border-style: dashed !important" @click="onAddMedia">
            <strong>Add Media</strong><br>
            <span>or drop files to upload</span>
          </b-card>
        </b-col>
      </b-row>

    </b-card-body>
  </b-card>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'
import { useInputImageRenderer } from '@core/comp-functions/forms/form-utils'
import { ref } from '@vue/composition-api'

export default {
  name: 'product-form-media',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BCardFooter,
    BButton,

    BRow,
    BCol,
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      type: Array,
      default: () => []
    }
  },

  methods: {
    onAddMedia () {
      this.value.push({
        image: 'https://via.placeholder.com/640x480.png/006600?text=voluptatem',
        name: '640x480.jpg'
      })
    },

    handleChange (changedValue) {
      this.$emit('input', changedValue)
    }
  },

  setup() {
    const refInputEl = ref(null)
    const refPreviewEl = ref(null)

    const { inputImageRenderer } = useInputImageRenderer(refInputEl, base64 => { refPreviewEl.value.src = base64 })

    return {
      refInputEl,
      refPreviewEl,
      inputImageRenderer,
    }
  },
}
</script>

<style>

</style>