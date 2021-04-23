<template>
  <v-card class="ma-6 mt-10">
    <v-card-title>
      Welcome to Curcon
    </v-card-title>
    <v-card-subtitle>
      For all your currency conversion needs
    </v-card-subtitle>
    <v-card-text>
      <v-text-field v-model="email" label="Email Address" placeholder="Email" outlined />
      <v-text-field v-model="password" type="password" label="Password" placeholder="Password" outlined />
      <v-alert v-if="error.length > 0" type="error">{{ error }}</v-alert>
      <v-btn @click="login" color="green darken-3" depressed dark>Login</v-btn>
    </v-card-text>
    <v-card-actions>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "Login",
  components: {},
  data() {
    return {
      email: "",
      password: "",
      error: ""
    }
  },
  methods: {
    async login() {
      this.error = ""
      const user = await network.post("/api/login", {
        email: this.email,
        password: this.password
      })

      if(!user) {
        this.error = "Email address or password is not valid"
        return
      }

      // user authentication successful
      this.$store.dispatch("setUser", user)
      this.$router.push("/")
    }
  }
}
</script>
