<template>
  <div>
    <conversion v-for="conversion in conversions" :key="conversion.id" :conversion="conversion">
    </conversion>
    <!-- <div v-for="conversion in conversions" :key="conversion.id">
      {{ conversion.currency }}<br>
      {{ conversion.amount }}
      <div v-for="quote in conversion.quotes" :key="quote.id">
        --{{ quote.currency }}<br>
        --{{ quote.rate }}
      </div>
    </div> -->
    <!-- </div> -->
  </div>
</template>

<script>
import network from "@/services/network";
import Conversion from "@/components/Conversion";

export default {
  name: "Home",
  components: {
    Conversion
  },
  data() {
    return {
      conversions: [],
    }
  },
  async mounted() {
    this.conversions = await network.get(
      `/api/conversion/user/${this.$store.state.userId}`
    );
  }
}
</script>
