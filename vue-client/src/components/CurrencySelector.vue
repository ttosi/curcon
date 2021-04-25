<template>
  <v-dialog v-model="showSelector" max-width="800" persistent>
    <v-card>
      <v-card-subtitle class="pa-3 pl-5 font-weight-regular text-h6 green darken-3 white--text">
        Add New Currency
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
        <v-btn @click="cancel" class="ml-4" color="green darken-2" small outlined>
          Cancel
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import currencyCodes from "@/data/currency-country-codes.json"

export default {
  name: "CurrencySelector",
  props: ["showSelector"],
  data() {
    return {
      selected: null,
      currencies: currencyCodes,
      search: null,
    }
  },
  methods: {
    filter(item, query) {
      return (
        item.currency_code.toLowerCase().indexOf(query.toLowerCase()) > -1 ||
        item.country.toLowerCase().indexOf(query.toLowerCase()) > -1
      )
    },
    add() {
      this.$emit('add', this.selected)
    },
    cancel() {
      this.$emit('cancel')
    }
  }
}
</script>
