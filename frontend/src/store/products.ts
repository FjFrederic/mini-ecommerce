import { defineStore } from 'pinia'

export interface Product {
  id: number
  title: string
  price: number
  description: string
  category: string
  image: string
}

interface ProductState {
  items: Record<string, Product>
  ids: number[]
}

export const useProductStore = defineStore({
  id: 'products',

  state: (): ProductState => ({
    items: {},
    ids: [],
  }),

  getters: {
    list(): Product[] {
      return this.ids.map(i => this.items[i])
    },

    loaded(): boolean {
      return this.ids.length > 0
    },
  },

  actions: {
    setProduct(product: any) {
      const data: Product[] = product
      this.ids = data.map((product) => {
        this.items[product.id] = product
        return product.id
      })
    },
  },
})
