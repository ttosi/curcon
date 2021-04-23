<template>
  <v-card class="pa-3 ma-1 grey--text text--darken-2" outlined>
    <div class="font-weight-medium body-1">
     <span 
        class="flag-icon mr-1"
        :class="`flag-icon-${(quote.country).toLowerCase()}`">
      </span>
      {{ calculated }}
      {{ quote.currency }}
      <v-icon class="ml-2 mb-1" style="cursor: pointer;" small>mdi-trash-can</v-icon>
    </div>
    <div class="mb-1">at {{ quote.rate }}</div>
    <div class="caption">{{ Date.create(quote.quote_date).format() }}</div>
  </v-card>
</template>

<script>
export default {
  name: "Quote",
  props: ["quote", "amount"],
  components: {},
  data() {
    return {
    }
  },
  computed: {
    calculated() {
      return (this.amount * this.quote.rate).toFixed(2)
    }
  }
}
</script>
