<template>
  <v-card class="pa-0 ma-2 grey--text text--darken-2" outlined>
    <v-progress-linear v-if="ismax" color="yellow darken-1" value="100"></v-progress-linear>
    <div class="pa-5">
    <div class="body-1 mb-2">
      <span
        class="flag-icon mr-1"
        :class="`flag-icon-${quote.country.toLowerCase()}`">
      </span>
      {{ quote.currency }}
      {{ calculated }}
      <span class="" v-currency-symbol="quote.currency"></span>
      <v-icon class="ml-2 mb-1 delete-icon" small>
        mdi-trash-can
      </v-icon>
    </div>
    <div class="mb-0">
      rate
      <span class="font-weight-medium">{{ quote.rate.toFixed(6) }}</span>
      as of
    </div>
    <div class="caption">{{ quote.quote_date | formatDatetime }}</div>
    </div>
  </v-card>
</template>

<script>
export default {
  name: "Quote",
  props: ["quote", "amount", "ismax"],
  components: {},
  data() {
    return {}
  },
  computed: {
    calculated() {
      return (this.amount * this.quote.rate).toFixed(2)
    }
  }
}
</script>

<style scoped>
.delete-icon {
  cursor: pointer;
  position: relative;
  top: -17px;
  left: 13px
}
</style>