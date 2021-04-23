<template>
  <div>
    <v-card class="ma-6 mt-10">
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
          <v-btn color="grey lighten-3 mr-3" fab small depressed>
            <v-icon>mdi-plus-circle</v-icon>
          </v-btn>
          <v-btn color="grey lighten-3" fab small depressed>
            <v-icon>mdi-trash-can</v-icon>
          </v-btn>
        </div>
      </v-card-subtitle>
      <v-card-subtitle>
        <div class="float-left">{{ conversion.quotes.length }} quotes</div>
      </v-card-subtitle>
      <v-card-subtitle>
          <v-card class="d-flex flex-row flex-wrap" flat>
            <quote 
              v-for="quote in conversion.quotes"
              :key="quote.id"
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
  props: ["conversion"],
  components: { Quote },
  data() {
    return {
      email: ""
    };
  },
};
</script>

<style scoped>
.amount {
  width: 125px;
  cursor: pointer;
}
</style>
