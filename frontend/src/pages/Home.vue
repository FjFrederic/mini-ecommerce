<template>
  <div class="p-4 max-w-7xl mx-auto">
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <ProductCardSkeleton
        v-for="n in skeletonNumber"
        v-show="!loaded"
        :key="n"
      />
      <ProductCard
        v-for="product in products"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue';
import ProductCard from '@/components/ProductCard.vue'
import ProductCardSkeleton from '@/components/ProductCardSkeleton.vue'
import { useProductStore } from '@/store/products'
import { mapState ,mapActions } from 'pinia';
const PER_PAGE = 15;

export default defineComponent({
  name: 'ProductForm',
  components: {
    ProductCard,
    ProductCardSkeleton,
  },
  data: function () {
    return {
      products:[],
      skeletonNumber: 15,
    };
  },
  computed: {
    ...mapState(useProductStore, ['loaded']),
  },
  methods: {
    ...mapActions(useProductStore, ['setProduct']),
    fetchFromApi () {
      this.$api.productApi.fetchFromApi()
        .then((data) => {
          this.products = data.data;
          this.setProduct(this.products);
        }).catch((error) => {
            throw error;
        });
    },
  },
  mounted () {
    this.fetchFromApi();
  }
});
</script>