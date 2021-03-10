import Vue from 'vue'

// axios
import axios from 'axios'

const axiosIns = axios.create({
  // You can add your headers here
  // ================================
  baseURL: '/',
  // timeout: 1000,
  headers: {'Accept': 'application/json', 'Content-Type': 'application/json'}
})

Vue.prototype.$http = axiosIns

export default axiosIns
