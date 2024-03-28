<template>
  <div class="card bordered ">
    <figure class="px-8 pt-10">
      <router-link class="link link-hover" :to="`/product/${product.id}`">
        <img
            :src="product.image"
            alt="Card Image"
            class="object-contain w-full h-64"
        >
      </router-link>
    </figure>
    <div class="card-body">
      <h2 class="card-title">
        <router-link class="link link-hover" :to="`/product/${product.id}`">
          {{ product.title }}
        </router-link>
      </h2>
      <p>{{ toCurrency(product.price) }}</p>
      <div class="justify-end card-actions">
        <button class="btn btn-primary" @click="cartStore.add(product.id)">
          Mettre au panier
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useCartStore } from '@/store/cart'
import type { Product } from '@/store/products'
import { toCurrency } from '@/shared/utils'

defineProps<{
  product: Product
}>()

const cartStore = useCartStore()
</script>

