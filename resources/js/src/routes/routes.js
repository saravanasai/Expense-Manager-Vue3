import { createRouter, createWebHistory } from "vue-router";

import Home from "../Page/Home/Home.vue";
import About from "../Page/About/About.vue";
import Test from "../../components/Test/Test.vue"

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/test",
        name: "test",
        component: Test,
    },
    {
        path: "/about-us",
        name: "about-us",
        component: About,
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});
export default router;
