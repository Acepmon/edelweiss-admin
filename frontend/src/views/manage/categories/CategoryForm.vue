<template>
  <b-form @submit.prevent="onSubmit">
    <b-row>

      <!-- Name -->
      <b-col cols="12">
        <b-form-group
          :label="$t('category.name')"
          label-for="v-name"
        >
          <b-form-input
            id="v-name"
            v-model="item.name"
            :placeholder="$t('category.name')"
            required
            aria-describedby="v-help-name"
            :formatter="formatName"
          />

          <b-form-text class="text-muted" id="v-help-name">{{ item.name ? item.name.length : 0 }} of 100 characters used</b-form-text>
        </b-form-group>
      </b-col>

      <!-- Image -->
      <b-col cols="12">
        <b-form-group
          :label="$t('category.image')"
          label-for="v-image"
        >
          <b-form-input
            id="v-image"
            v-model="item.image"
          />

          <b-img v-if="item.image" :src="item.image" fluid thumbnail class="mt-1"></b-img>
        </b-form-group>
      </b-col>

      <!-- Parent ID -->
      <b-col cols="12">
        <b-form-group
          :label="$t('category.parent')"
          label-for="v-parent"
        >
          <v-select 
            id="v-parent" 
            label="name"
            v-model="item.parent_id" 
            :options="categories" 
            :reduce="category => category.id"
          />
        </b-form-group>
      </b-col>

      <!-- Submit or Delete -->
      <b-col cols="12">
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          type="submit"
          variant="success"
          class="mr-1"
        >
          <feather-icon icon="SaveIcon" class="mr-50"></feather-icon>
          {{ $t('Save') }}
        </b-button>

        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="outline-danger"
          class="float-right"
          @click="onDelete"
        >
          <feather-icon icon="Trash2Icon" class="mr-50"></feather-icon>
          {{ $t('Delete') }}
        </b-button>
      </b-col>

    </b-row>
  </b-form>
</template>

<script>
import {
  BRow, BCol, BFormGroup, BFormInput, BFormText, BFormCheckbox, BForm, BButton, BImg, 
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import vSelect from 'vue-select'

export default {
  name: 'category-form',

  components: {
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormText,
    BFormCheckbox,
    BForm,
    BButton,
    BImg,
    ToastificationContent,
    vSelect
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      item: {
        name: null,
        image: null,
        parent_id: null
      },
      categories: [],
      products: []
    }
  },

  props: {
    category: {
      required: true
    }
  },

  methods: {
    formatName (e) {
      return String(e).substring(0, 100)
    },

    onSubmit () {
      this.$http.put('/api/categories/' + this.category, this.item)
        .then((res) => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: this.$t('Success!'),
              icon: 'CheckCircleIcon',
              text: 'Saved category details!',
              variant: 'success',
            },
          })
        })
        .catch((err) => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: this.$t('Failed!'),
              icon: 'AlertTriangleIcon',
              text: err.response.data.message,
              variant: 'danger',
            },
          })
        })
    },

    onDelete () {
      // 
    }
  },

  created () {
    this.$http.get('/api/categories/' + this.category)
      .then((res) => {
        this.item = res.data.data
      })

    this.$http.get('/api/categories/' + this.category + '/products')
      .then((res) => {
        this.products = res.data.data
      })

    this.$http.get('/api/categories', {limit: -1})
      .then((res) => {
        this.categories = res.data.data.filter(item => item.id != this.category)
      })
  }
}
</script>

<style>

</style>