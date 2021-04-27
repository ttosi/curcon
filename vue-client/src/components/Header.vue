<template>
  <div>
    <v-app-bar color="green darken-3" fixed dense dark>
      <v-toolbar-title>
        <v-icon class="mb-1 ml-1">mdi-currency-eur</v-icon>urcon
        <span class="ml-3 caption">
          Fulfilling all of your currency conversion needs
        </span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-menu offset-y>
        <template v-slot:activator="{ on, attrs }">
          <v-app-bar-nav-icon v-bind="attrs" v-on="on"></v-app-bar-nav-icon>
        </template>
        <v-list>
          <v-list-item>
            <v-list-item-title>
              <a href="https://swop.cx/documentation/common" class="text-menu-link" target="_new">
                SWOP API<v-icon class="ml-2" small>mdi-open-in-new</v-icon>
              </a>
            </v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title>
              <a href="https://vuejs.org/" class="text-menu-link" target="_new">
                Vue.js<v-icon class="ml-2" small>mdi-open-in-new</v-icon>
              </a>
            </v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title>
              <a href="https://v2.vuetifyjs.com/en/" class="text-menu-link" target="_new">
                Vuetify<v-icon class="ml-2" small>mdi-open-in-new</v-icon>
              </a>
            </v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title>
              <a href="https://laravel.com/" class="text-menu-link" target="_new">
                Laravel<v-icon class="ml-2" small>mdi-open-in-new</v-icon>
              </a>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <!-- <v-btn @click="logout" icon>
        <v-icon>mdi-logout</v-icon>
      </v-btn> -->
    </v-app-bar>
  </div>
</template>

<script>
export default {
  name: "Header",
  methods: {
    logout() {
      console.log("not implemented");
    },
  },
};
</script>
<style scoped>
.text-menu-link {
  color: gray;
  text-decoration: none;
}
</style>
