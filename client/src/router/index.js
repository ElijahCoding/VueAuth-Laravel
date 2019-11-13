import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import SignIn from '../views/SignIn.vue'
import Dashboard from '../views/Dashboard.vue'
import Settings from '../views/Settings.vue'
import OtpDisable from '../views/otp/OtpDisable.vue'
import OtpEnable from '../views/otp/OtpEnable.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/signin',
    name: 'signin',
    component: SignIn
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard
  },

  {
    path: '/settings',
    name: 'settings',
    component: Settings,
  },

  {
    path: '/otp/enable',
    name: 'otp-enable',
    component: OtpEnable
  },

  {
    path: '/otp/disable',
    name: 'otp-disable',
    component: OtpDisable
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
