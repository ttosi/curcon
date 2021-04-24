<template>
  <div>
    <v-card class="mt-5">
      <v-progress-linear
        :active="false"
        :indeterminate="true"
        absolute
        top />
      <v-card-subtitle class="pb-1">
        <div class="d-flex flex-row justify-space-between flex-wrap">
          <div class="text-h5">
            <span 
              class="flag-icon mr-1"
              :class="`flag-icon-${(conversion.country).toLowerCase()}`">
            </span>
            {{ conversion.currency }}
            <input 
              type="number" step="0.01" min="0.01"
              v-model="conversion.amount"
              onfocus="this.select();" 
              class="amount" />
          </div>
          <conversion-menu />
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
              :quote="quote" />
        </v-card>
        <div class="caption ml-3 mt-2">
          {{ Date.create(conversion.created).format() }}
        </div>
      </v-card-subtitle>
    </v-card>
  </div>
</template>

<script>
import Quote from "@/components/Quote"
import ConversionMenu from "@/components/ConversionMenu"

export default {
  name: "Conversion",
  props: ["conversion"],
  components: { Quote, ConversionMenu },
  data() {
    return {
    }
  },
  methods: {
    ismax(quotes, rate) {
      return Math.max(...quotes.map(r => r.rate), 0) === rate
    }
  }
}
</script>

<style scoped>
.amount {
  width: 100px;
  cursor: pointer;
  color: gray;
  border: 1px dotted lightgray;
  border-radius: 6px;
}
</style>
