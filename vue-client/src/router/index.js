import Vue from "vue";
import VueRouter from "vue-router";
import store from "@/store";

Vue.use(VueRouter);

const routes = [
  {
    path: "/login",
    name: "login",
    component: () => import("@/views/Login"),
    meta: { requireAuth: false },
  },
  {
    path: "/",
    name: "home",
    component: () => import("@/views/Home"),
    meta: { requireAuth: true },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

// user must be authenticated to view pages auth = true
router.beforeEach((to, from, next) => {
  // user's aauthenticated, don't go to login
  if (store.state.token && to.path === "/login") {
    next("/");
    return;
  }

  if (to.matched.some((r) => r.meta.requireAuth)) {
    if (!store.state.token) {
      next({ path: "/login" });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
