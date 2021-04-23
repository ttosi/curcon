<template>
  <div>
    <v-card class="ma-6 mt-10">
      <v-card-title>
        Base Currency: {{ conversion.currency }}
      </v-card-title>
      <v-card-subtitle>
        {{ conversion.quotes.length }} quotes, created {{ conversion.created }}
      </v-card-subtitle>
      <v-card-text> </v-card-text>
      <v-card-actions> </v-card-actions>
    </v-card>

    <!-- conversion
    {{ conversion }}
    <quote v-for="quote in conversion.quotes" :key="quote.id" :quote="quote"></quote> -->
  </div>
</template>

<script>
import Quote from "@/components/Quote";

export default {
  name: "Conversion",
  props: ["conversion"],
  components: { Quote },
  data() {
    return {};
  },
};
</script>
