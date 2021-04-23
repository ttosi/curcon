<template>
  <div>
    <div>
      <v-btn color="green darken-3" depressed dark>Add Conversion</v-btn>
      <v-btn
        @click="list" 
        class="float-right"
        title="Refresh All"
        color="grey lighten-3 mr-3"
        fab small depressed to>
        <v-icon color="green darken-2">mdi-refresh</v-icon>
      </v-btn>
    </div>
    <div>
      <conversion
        v-for="conversion in conversions"
        :key="conversion.id"
        :conversion="conversion" />
    </div>
  </div>
</template>

<script>
import Conversion from "@/components/Conversion";
import conversion from "@/entities/Conversion";

export default {
  name: "Home",
  components: {
    Conversion
  },
  data() {
    return {
      conversions: []
    }
  },
  methods: {
    async list() {
      console.log("LIST!!!!!!!!")
      this.conversions = await conversion.list()
    },
  },
  async mounted() {
    this.list()
  }
}
</script>
