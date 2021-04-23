<template>
  <v-app>
    <site-header v-if="isAuthenticated" />
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import Header from "@/components/Header";

export default {
  name: "App",
  components: {
    "site-header": Header,
  },
  computed: {
    isAuthenticated() {
      return this.$store.state.token
    }
  }
};
</script>
