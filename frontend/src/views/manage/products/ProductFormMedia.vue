<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Media</b-card-title>
      <!-- <feather-icon
        icon="MoreVerticalIcon"
        size="18"
        class="cursor-pointer"
      /> -->
    </b-card-header>
    <b-card-body>

      <uploadcare :publicKey="uploadCarePubKey" @success="onSuccess" @error="onError" class="d-inline-block" :data-do-not-store="true">
        <b-button variant="outline-primary">
          <feather-icon icon="ImageIcon" size="15" class="mr-50"></feather-icon>
          <strong>Add Media</strong>
        </b-button>
      </uploadcare>

      <ul class="list-unstyled">
        <b-media v-for="(item, index) in value" :key="index" no-body class="border-bottom py-1">
          <b-media-aside>
            <b-img :src="item.cdnUrl" thumbnail fluid width="150"></b-img>
          </b-media-aside>

          <b-media-body>
            <h5 class="mt-0 font-weight-bold">{{ item.name }} </h5>
            <p class="text-muted my-0">Modified: <a :href="item.cdnUrl" target="_blank">{{ item.cdnUrl }}</a></p>
            <p class="text-muted my-0">Original: <a :href="item.originalUrl" target="_blank">{{ item.originalUrl }}</a></p>
          </b-media-body>

          <b-media-aside>
            <b-button @click="value.splice(index, 1)" variant="flat-dark" class="btn-icon" size="sm">
              <feather-icon icon="XIcon"></feather-icon>
            </b-button>
          </b-media-aside>
        </b-media>
      </ul>

    </b-card-body>
  </b-card>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton, BMedia, BMediaAside, BMediaBody, BImg } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'
import { useInputImageRenderer } from '@core/comp-functions/forms/form-utils'
import { ref } from '@vue/composition-api'
import Uploadcare from 'uploadcare-vue'

export default {
  name: 'product-form-media',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BCardFooter,
    BButton,
    BMedia,
    BMediaAside,
    BMediaBody,
    BImg,

    BRow,
    BCol,

    Uploadcare,
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      required: true,
      type: Array
    }
  },

  data () {
    return {
      uploadCarePubKey: 'c6a85514a4856a3c5ec7'
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
    },

    onSuccess (val) {
      console.log(val)
      this.value.push(val)
    },

    onError (error) {
      console.log(error)
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