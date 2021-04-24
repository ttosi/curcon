<template>
  <div>
    <v-btn 
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
</template>

<script>
export default {
  name: "ConversionMenu",
  props: [],
  components: {},
  data() {
    return {};
  },
};
</script>
