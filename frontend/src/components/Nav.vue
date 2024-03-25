<script setup lang="ts">
import { computed } from 'vue'
import Search from './Search.vue'
import { useCartStore } from '@/store/cart'

const cartStore = useCartStore()

const count = computed(() => cartStore.count)
</script>

<template>
  <div class="navbar mb-2 shadow-lg bg-yellow-500">
    <div class="flex-none lg:hidden">
      <label for="drawer-input" class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </label>
    </div>
    <div class="flex-none px-2 mx-2">
      <span class="text-lg font-bold">
        Mini e-commerce</span>
    </div>
    <div class="flex-1 px-2 mx-2"/>
    <div class="flex-1 lg:flex-none">
      <Search />
      <router-link class="btn btn-ghost btn-sm rounded-btn" to="/">
          Nos produits
        </router-link>
        <router-link class="btn btn-ghost btn-sm rounded-btn" to="/cart">
          Mon panier
          <div class="badge ml-2 badge-outline" v-text="count" />
        </router-link>
    </div>
  </div>
</template>
