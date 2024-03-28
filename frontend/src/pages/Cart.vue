<template>
  <div class="p-4 max-w-4xl mx-auto">
    <div v-if="!productStore.loaded" class="space-y-4">
      <CartCardSkeleton v-for="n in 15" :key="n" />
    </div>
    <div v-else-if="!formattedCart.length">
      <h1 class="text-xl">
        Le panier est vide.
      </h1>
    </div>
    <div v-else class="space-y-4">
      MON PANIER
      <CartCard
        v-for="(cartProduct, index) in formattedCart"
        :key="index"
        :cart-product="cartProduct"
      />
      <div class="text-right text-2xl md:text-4xl">
        <router-link class="inset-0 btn btn-primary mr-25" to="/order">
          Passer commande
        </router-link>
        Total: {{ toCurrency(cartStore.total) }}
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import CartCard from '../components/CartCard.vue'
import CartCardSkeleton from '../components/CartCardSkeleton.vue'
import { toCurrency } from '../shared/utils'
import { useCartStore } from '../store/cart'
import { useProductStore } from '../store/products'

const cartStore = useCartStore()
const productStore = useProductStore()

const formattedCart = computed(() => cartStore.formattedCart)
</script>
<style>
.mr-25 {
  margin-right: 25rem;
}
</style>
