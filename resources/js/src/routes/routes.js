import { createRouter, createWebHistory } from "vue-router";

import Home from "../Page/Home/Home.vue";
import Register from "../Page/Register/Register.vue";
import Login from "../Page/Login/Login.vue";
import About from "../Page/About/About.vue";
import NotFound from "../Page/404/404.vue";



const Expense = import('../Page/Expense/Expense.vue');


const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
        meta:{requiresAuth: false}
    },
    {
        path: "/register-user",
        name: "register",
        component: Register,
    },
    {
        path: "/login-user",
        name: "login",
        component: Login,
    },
    {
        path: "/my-expense",
        name: "expense",
        component: Expense,
        meta:{requiresAuth: true}
    },
    {
        path: "/about-us",
        name: "about-us",
        component: About,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "404",
        component: NotFound,
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

router.beforeEach(async (to, from) => {

    if (to.meta.requiresAuth && !window.localStorage.getItem('auth_token')) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        return {
          name: 'register',
          // save the location we were at to come back later
          query: { redirect: to.fullPath },
        }
      }

    // if (!isAuthenticated && to.name !== 'register') {
    //   return { name: 'register' }
    // }
  })



export default router;
