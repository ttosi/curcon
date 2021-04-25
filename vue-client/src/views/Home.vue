<template>
  <div>
    <div v-if="loading">
      <v-skeleton-loader
        v-for="n in 3" :key="n"
        class="mx-auto mb-3 mt-4"
        type="article"
        :loading="loading"
        transition="scale-transition" />
    </div>
    <div v-if="!loading">
      <div>
        <v-btn @click="showSelector = true" color="green darken-3" depressed dark>
          Add Conversion
        </v-btn>
        <v-btn @click="list" color="green darken-2" small outlined class="mt-3 float-right">
          Refresh All
        </v-btn>
      </div>
      <div>
        <conversion
          v-for="conversion in conversions"
          :key="conversion.id"
          :conversion="conversion" />
      </div>
    </div>
    <currency-selector 
      :showSelector="showSelector"
      @add="add" 
      @cancel="cancel" />
  </div>
</template>

<script>
import conversion from "@/entities/Conversion"
import Conversion from "@/components/Conversion"
import CurrencySelector from "@/components/CurrencySelector"

export default {
  name: "Home",
  components: {
    Conversion,
    CurrencySelector
  },
  data() {
    return {
      conversions: [],
      loading: true,
      search: null,
      showSelector: false
    }
  },
  methods: {
    async list() {
      this.loading = true;
      this.conversions = await conversion.list()
      this.conversions.sort(c => c.id).reverse()
      this.loading = false
    },
    async add(cur) {
      const conv = {
        amount: "1.00",
        country: cur.country_code,
        currency: cur.currency_code,
        quotes: []
      }
      conv.id = (await conversion.create(conv)).id
      this.conversions.push(conv)
      this.conversions.sort(c => c.id).reverse()
      this.showSelector = false
    },
    cancel() {
      this.showSelector = false
    }
  },
  async mounted() {
    this.list()
  }
}
</script>
