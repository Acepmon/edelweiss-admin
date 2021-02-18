import Vue from 'vue'

// axios
import axios from 'axios'

const axiosIns = axios.create({
  // You can add your headers here
  // ================================
  baseURL: 'http://127.0.0.1:8000/',
  // timeout: 1000,
  headers: {'Accept': 'application/json', 'Content-Type': 'application/json'}
})

Vue.prototype.$http = axiosIns

export default axiosIns
