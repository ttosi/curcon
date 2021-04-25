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
        <v-btn @click="add" color="green darken-3" depressed dark>
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
    <v-dialog v-model="dialog" max-width="800">
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
          <v-btn @click="save" color="green darken-2" dark small>
            Save
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
import Conversion from "@/components/Conversion"
import conversion from "@/entities/Conversion"
import currency from "@/entities/Currency"

export default {
  name: "Home",
  components: {
    Conversion
  },
  data() {
    return {
      conversions: [],
      loading: true,
      dialog: false,
      selected: null,
      currencies: [],
      search: null
    }
  },
  methods: {
    add() {
      this.dialog = true
    },
    filter(item, query) {
      return (
        item.currency_code.toLowerCase().indexOf(query.toLowerCase()) > -1 ||
        item.country.toLowerCase().indexOf(query.toLowerCase()) > -1
      )
    },
    async list() {
      this.loading = true;
      this.conversions = await conversion.list()
      this.conversions.sort(c => c.id).reverse()
      this.loading = false
    },
    async save() {
      const conv = {
        amount: "1.00",
        country: this.selected.country_code,
        currency: this.selected.currency_code,
        quotes: []
      }
      conv.id = (await conversion.create(conv)).id
      this.conversions.push(conv)
      this.conversions.sort(c => c.id).reverse()
      this.dialog = false
    }
  },
  async mounted() {
    this.list()
    
    // i think i'm going to move this locally
    if (!localStorage.getItem("currencies")) {
      this.currencies = await currency.list()
      localStorage.setItem("currencies", JSON.stringify(this.currencies))
    } else {
      this.currencies = JSON.parse(localStorage.getItem("currencies"))
    }
  }
}
</script>
