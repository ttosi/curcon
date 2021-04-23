<template>
  <div>
    <div>
      <v-btn color="green darken-3" depressed dark>Add Conversion</v-btn>
      <v-btn 
        @click="list"
        color="green darken-2"
        small outlined
        class="mt-3 float-right">
          Refresh All
      </v-btn>
    </div>
    <div>
      <conversion
        :loadingAll="loadingAll"
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
      conversions: [],
      loadingAll: false
    }
  },
  methods: {
    async list() {
      this.loadingAll = true;
      this.conversions = await conversion.list()
      this.loadingAll = false;
    },
  },
  async mounted() {
    this.list()
  }
}
</script>
