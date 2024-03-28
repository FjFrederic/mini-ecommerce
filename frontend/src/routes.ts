import { createRouter, createWebHistory } from 'vue-router'
import Home from './pages/Home.vue'
import Product from './pages/Product.vue'
import Cart from './pages/Cart.vue'
import Order from './pages/Order.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/product/:productId', component: Product },
  { path: '/cart', component: Cart },
  { path: '/order', component: Order },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
