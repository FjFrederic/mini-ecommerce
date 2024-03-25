<template>
  <div class="card bordered ">
    <div class="card-body">
      <label class="input input-bordered flex items-center gap-2 input-warning">
        Nom
        <input v-model="lastname" type="text" class="grow" />
      </label>
      <label class="input input-bordered flex items-center gap-2 input-warning">
        Prenom
        <input v-model="firstname" type="text" class="grow" />
      </label>
      <label class="input input-bordered flex items-center gap-2 input-warning">
        Adresse
        <input v-model="address" type="texte" class="grow"/>
      </label>
      <label class="input input-bordered flex items-center gap-2 input-warning">
        Email
        <input v-model="email" type="email" class="grow"/>
      </label>
      <label class="input input-bordered flex items-center gap-2 input-warning">
        Produit
        <input v-model="cart" type="text" class="grow"/>
      </label>
      <label class="font-bold">
        Methode de payement:
      </label>
      <div class="flex flex-col space-y-4">
        <div class="p-6 bg-white shadow-md rounded-md">
          <img src="../assets/visa.jpeg" alt="Payment Method Logo" class="w-16 h-16 mx-auto mb-4">
          <div class="max-w-md mx-auto">
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="card-number">
                  Numéro de carte Visa
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="card-number"
                       type="text"
                       placeholder="XXXX-XXXX-XXXX-1234">
              </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="card-number">
                Exp: 12/25
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     id="card-number"
                     type="text"
                     placeholder="12/25">
            </div>

              <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                  Payer
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                  Autre payement methode
                </button>
              </div>
          </div>
        </div>
      </div>
      <div class="justify-end card-actions">
        <button class="btn btn-primary" @click="saveOrder(order)">
          Envoyer
        </button>
      </div>
    </div>
  </div>
</template>

<script>

import {defineComponent} from "vue";
import CartCard from "@/components/CartCard.vue";
import {mapActions, mapState} from "pinia";
import {useProductStore} from "@/store/products";

export default defineComponent({
  components: {
    CartCard
  },
  data: function () {
    return {
        lastname: '',
        firstname: '',
        email: '',
        address: '',
        cart: '',
    }
  },
  computed: {
    ...mapState(useProductStore, ['loaded']),
  },
  methods: {
    ...mapActions(useProductStore, ['setProduct']),
    saveOrder (order) {
      const params = {
        lastname: this.lastname,
        firstname: this.firstname,
        email: this.email,
        address: this.address,
        cart: this.cart,
      }
      console.log("order", params);
      this.$api.orderApi.saveOrder(params)
          .then((data) => {
            console.log("Add state", data.data);
          }).catch((error) => {
        throw error;
      });
    },
  },
})
</script>

