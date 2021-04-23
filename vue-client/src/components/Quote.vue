<template>
  <div>
    quote
    {{ quote }}
    <!-- <div v-for="conversion in conversions" :key="conversion.id">
      {{ conversion.currency }}<br>
      {{ conversion.amount }}
      <div v-for="quote in conversion.quotes" :key="quote.id">
        --{{ quote.currency }}<br>
        --{{ quote.rate }}
      </div>
    </div> -->
  </div>
</template>

<script>
import Quote from "@/components/Quote"

export default {
  name: "Quote",
  props: [ 'quote' ],
  components: {},
  data() {
    return {
      // conversions: []
    };
  }
}
</script>
