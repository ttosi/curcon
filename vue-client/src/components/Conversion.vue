<template>
  <div>
    <v-card class="mt-5">
      <v-card-subtitle class="pb-1">
        <div class="d-flex flex-row justify-space-between flex-wrap">
          <div class="text-h5">
            <span v-flag="conversion.country"></span>
            {{ conversion.currency }}
            <span class="mr-1" v-currency-symbol="conversion.currency"></span>
            <input 
              type="number" step="0.01" min="0.01"
              v-model="conversion.amount"
              onfocus="this.select();" 
              class="amount" />
          </div>
          <div>
            <v-btn 
              @click="showSelector = true"
              title="Add Quote"
              class="mr-3" 
              fab small depressed>
              <v-icon color="green darken-2">mdi-plus</v-icon>
            </v-btn>
            <v-btn
              title="Delete Conversion"
              fab small depressed>
              <v-icon @click="remove" color="green darken-2">mdi-trash-can-outline</v-icon>
            </v-btn>
          </div>
        </div>
      </v-card-subtitle>
      <v-card-subtitle class="py-0">
          {{ conversion.quotes.length }} quote{{ conversion.quotes.length !== 1 ? 's' : '' }}
      </v-card-subtitle>
      <v-card-subtitle>
        <v-card 
          v-if="conversion.quotes.length === 0"
          class="pa-4 ma-1" outlined>
            To add a quote, click the
            <v-icon class="mb-1" small>mdi-plus-circle</v-icon>
            icon
        </v-card>
        <v-card v-else class="d-flex flex-row flex-wrap" flat>
            <quote 
              v-for="quote in conversion.quotes"
              :key="quote.id"
              :ismax="ismax(conversion.quotes, quote.rate)"
              :amount="conversion.amount"
              :quote="quote"
              @removeQuote="removeQuote" />
        </v-card>
        <div class="caption ml-3 mt-2">
          {{ conversion.created | formatDatetime }}
        </div>
      </v-card-subtitle>
    </v-card>
    <currency-selector 
      :showSelector="showSelector"
      @add="add" 
      @cancel="cancel" />
  </div>
</template>

<script>
import quote from "@/entities/Quote"
import Quote from "@/components/Quote"
import CurrencySelector from "@/components/CurrencySelector"

export default {
  name: "Conversion",
  props: ["conversion"],
  components: {
    Quote,
    CurrencySelector
  },
  data() {
    return {
      showSelector: false
    }
  },
  methods: {
    ismax(quotes, rate) {
      return Math.max(...quotes.map(r => r.rate), 0) === rate
    },
    async add(cur) {
      const q = {
        conversionId: this.conversion.id,
        country: cur.country_code,
        currency: cur.currency_code,
        baseCurrency: this.conversion.currency,
        rate: 0.00
      }
      this.conversion.quotes.push(await quote.add(q))
      this.showSelector = false
    },
    cancel() {
      this.showSelector = false
    },
    remove() {
      this.$emit("removeConversion", this.conversion.id)
    },
    removeQuote(id, v) {
      this.conversion.quotes.splice(
        this.conversion.quotes.findIndex(q => q.id === id), 1
      )
      quote.remove(id)
    }
  }
}
</script>

<style scoped>
.amount {
  width: 100px;
  cursor: pointer;
  color: gray;
  padding-left: 6px;
  border: 1px dotted lightgray;
  border-radius: 6px;
}
</style>
