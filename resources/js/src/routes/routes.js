import { createRouter, createWebHistory } from "vue-router";

import Home from "../Page/Home/Home.vue";
import Register from "../Page/Register/Register.vue";
import Login from "../Page/Login/Login.vue";
import About from "../Page/About/About.vue";
import NotFound from "../Page/404/404.vue";
import Test from "../../components/Test/Test.vue";

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
export default router;
