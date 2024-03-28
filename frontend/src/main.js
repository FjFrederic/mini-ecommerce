import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './routes'
import App from './App.vue'
import { Api } from './api/Api'

import './assets/styles/tailwind.css'

const api = new Api()
const app = createApp(App)
app.config.globalProperties.$api = api
app.use(createPinia())
app.use(router)
app.mount('#app')
