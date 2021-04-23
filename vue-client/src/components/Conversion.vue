<template>
  <div>
    <v-card class="mt-5">
      <v-progress-linear
        :active="loadingAll"
        :indeterminate="true"
        absolute
        top></v-progress-linear>
      <v-card-subtitle>
        <div class="float-left text-h5">
          <span 
            class="flag-icon mr-1"
            :class="`flag-icon-${(conversion.country).toLowerCase()}`">
          </span>
          {{ conversion.currency }}
          <input 
            type="number"
            step="0.01"
            min="0.01"
            v-model="conversion.amount"
            onfocus="this.select();" 
            class="grey--text text--darken-2 amount" />
        </div>
        <div class="float-right">
          <v-btn title="Add Quote" color="grey lighten-3 mr-3" fab small depressed>
            <v-icon color="green darken-2">mdi-plus</v-icon>
          </v-btn>
          <v-btn title="Delete Conversion" color="grey lighten-3 mr-3" fab small depressed>
            <v-icon color="green darken-2">mdi-trash-can-outline</v-icon>
          </v-btn>
          <v-btn title="Refresh Quotes" color="grey lighten-3" fab small depressed to>
            <v-icon color="green darken-2">mdi-refresh</v-icon>
          </v-btn>
        </div>
      </v-card-subtitle>
      <v-card-subtitle>
        <div class="float-left">
          {{ conversion.quotes.length }} quote{{ conversion.quotes.length !== 1 ? 's' : '' }}
        </div>
      </v-card-subtitle>
      <v-card-subtitle>
        <v-card 
          v-if="conversion.quotes.length === 0"
          class="pa-4 ma-1" outlined>
            To add a quote, click the
            <v-icon class="mb-1 ml-1" small>mdi-plus-circle</v-icon>
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
import Quote from "@/components/Quote";

export default {
  name: "Conversion",
  props: ["conversion", "loadingAll"],
  components: { Quote },
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
  width: 125px;
  cursor: pointer;
}
</style>
