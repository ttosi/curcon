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
            <span class="mr-2" v-html="symbol(conversion.currency)"></span>
            <input 
              type="number" step="0.01" min="0.01"
              v-model="conversion.amount"
              onfocus="this.select();" 
              class="amount" />
          </div>
          <div>
            <v-btn 
              @click="dialog = true"
              title="Add Quote"
              class="mr-3" 
              fab small depressed>
              <v-icon color="green darken-2">mdi-plus</v-icon>
            </v-btn>
            <v-btn
              title="Refresh Quotes"
              class="mr-3"
              fab small depressed>
              <v-icon color="green darken-2">mdi-refresh</v-icon>
            </v-btn>
            <v-btn
              title="Delete Conversion"
              fab small depressed>
              <v-icon color="green darken-2">mdi-trash-can-outline</v-icon>
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
              :quote="quote" />
        </v-card>
        <div class="caption ml-3 mt-2">
          {{ Date.create(conversion.created).format() }}
        </div>
      </v-card-subtitle>
    </v-card>
    <v-dialog v-model="dialog" max-width="800" persistent>
      <v-card>
        <v-card-subtitle class="pa-3 pl-5 font-weight-regular text-h6 green darken-3 white--text">
          New Currency Conversion
        </v-card-subtitle>
        <v-card-text class="pb-0">
          <v-autocomplete
            v-model="selected"
            :items="currencies"
            :filter="filter"
            label="Search by Currency or Country"
            placeholder="Start typing to Search"
            prepend-icon="mdi-map-search-outline"
            hide-no-data
            return-object>
            <template v-slot:item="data">
              <span 
                class="flag-icon mr-1"
                :class="`flag-icon-${(data.item.country_code).toLowerCase()}`">
              </span>
              {{ data.item.currency_code }} ({{ data.item.country }})
            </template>
            <template v-slot:selection="data">
              <span 
                class="flag-icon mr-1"
                :class="`flag-icon-${(data.item.country_code).toLowerCase()}`">
              </span>
              {{ data.item.currency_code }} ({{ data.item.country }})
            </template>
          </v-autocomplete>
        </v-card-text>
        <v-card-actions class="pb-4 pr-4">
          <v-spacer></v-spacer>
          <v-btn @click="add" color="green darken-2" dark small>
            Add
          </v-btn>
          <v-btn @click="dialog = false" class="ml-4" color="green darken-2" small outlined>
            Cancel
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import Quote from "@/components/Quote"
import symbols from "@/data/symbols.json"

export default {
  name: "Conversion",
  props: ["conversion"],
  components: { Quote },
  data() {
    return {
      dialog: false,
      selected: null,
      currencies: [],
      search: null
    }
  },
  methods: {
    ismax(quotes, rate) {
      return Math.max(...quotes.map(r => r.rate), 0) === rate
    },
    filter(item, query) {
      return (
        item.currency_code.toLowerCase().indexOf(query.toLowerCase()) > -1 ||
        item.country.toLowerCase().indexOf(query.toLowerCase()) > -1
      )
    },
    symbol(sym) {
      const symbol = symbols.find(s => s.code === sym)
      return symbol ? symbol.symbol : ""
    },
    async add() {
      console.log("ading")
    }
  },
  mounted() {
    this.currencies = JSON.parse(localStorage.getItem("currencies"))
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
