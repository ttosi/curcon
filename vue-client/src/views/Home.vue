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
      <div v-if="conversions.length > 0">
        <conversion
          v-for="conversion in conversions"
          :key="conversion.id"
          :conversion="conversion"
          @removeConversion="removeConversion" />
      </div>
      <div v-else class="ma-5 mt-10">
        <p>Welcome to <v-icon class="mb-1 ml-1">mdi-currency-eur</v-icon>urcon! To create your first conversion:</p>
        <ul>
          <li>Click the Add Conversion button</li>
          <li>Select the currency you wish to see exchange rates for (this is the base currency) then click add.</li>
          <li>The amount to convert from defaults to 1.00; this can be changed by clicking on it.</li>
          <li>Add one or more currencies you wish to see the rates for by clicking the plus icon in the upper right.</li>
          <li>The exchange rates are the current market rates provided by swop.cx</li>
          <li>Click the refresh button to fetch the latest rates.</li>
          <li>Enjoy!</li>
        </ul>
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
      showSelector: false
    }
  },
  methods: {
    async list() {
      this.loading = true;
      this.conversions = await conversion.list()
      this.loading = false
    },
    async add(currency) {
      const conv = {
        amount: "1.00",
        country: currency.country_code,
        currency: currency.currency_code,
        quotes: []
      }
      const id = await conversion.create(conv)
      conv.id = id
      console.log(conv);
      this.conversions.unshift(conv)
      this.showSelector = false
    },
    removeConversion(id) {
      this.conversions.splice(
        this.conversions.findIndex(c => c.id === id), 1
      )
      conversion.remove(id)
    },
    cancel() {
      this.showSelector = false
    }
  },
  async created() {
    this.list()
  }
}
</script>
