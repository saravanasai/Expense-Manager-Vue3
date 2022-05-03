<template>
  <div class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
    <div class="container-xl">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar-menu"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1
        class="
          navbar-brand navbar-brand-autodark
          d-none-navbar-horizontal
          pe-0 pe-md-3
        "
      >
        <router-link :to="{name:'home'}">
          <img
            :src="Logo"
            alt="Expense Manager"
            class="navbar-brand-image"
            width="110"
            height="32"
          />
        </router-link>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="d-none d-md-flex">


        </div>
        <!-- logout dropdown section -->
        <div class="nav-item dropdown">
          <a
            href="#"
            class="nav-link d-flex lh-1 text-reset p-0"
            data-bs-toggle="dropdown"
            aria-label="Open user menu"
          >
            <div class="d-none d-xl-block ps-2">
              <div>{{userInfo.name}}</div>
              <div class="mt-1 small text-muted">{{userInfo.email}}</div>
            </div>
          </a>
        </div>
        <!--end logout dropdown section -->
      </div>
      <!-- mobile view top menu section  -->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div
          class="
            d-flex
            flex-column flex-md-row flex-fill
            align-items-stretch align-items-md-center
          "
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'home' }">
                <span class="nav-link-icon d-md-none d-lg-inline-block"
                  ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                  </svg>
                </span>
                <span class="nav-link-title"> Home </span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'about-us' }">
                <span class="nav-link-icon d-md-none d-lg-inline-block"
                  ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-vocabulary"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <desc>
                      Download more icon variants from
                      https://tabler-icons.io/i/vocabulary
                    </desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                      d="M10 19h-6a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h6a2 2 0 0 1 2 2a2 2 0 0 1 2 -2h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2z"
                    ></path>
                    <path d="M12 5v16"></path>
                    <path d="M7 7h1"></path>
                    <path d="M7 11h1"></path>
                    <path d="M16 7h1"></path>
                    <path d="M16 11h1"></path>
                    <path d="M16 15h1"></path>
                  </svg>
                </span>
                <span class="nav-link-title"> About Us </span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'expense' }">
                <span class="nav-link-icon d-md-none d-lg-inline-block"
                  ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-businessplan"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <desc>
                      Download more icon variants from
                      https://tabler-icons.io/i/businessplan
                    </desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <ellipse cx="16" cy="6" rx="5" ry="3"></ellipse>
                    <path
                      d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"
                    ></path>
                    <path
                      d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"
                    ></path>
                    <path
                      d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"
                    ></path>
                    <path
                      d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"
                    ></path>
                    <path d="M5 15v1m0 -8v1"></path>
                  </svg>
                </span>
                <span class="nav-link-title"> My-Expense </span>
              </router-link>
            </li>
            <template v-if="!authState">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'register' }">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                      <path
                        d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"
                      ></path>
                      <path
                        d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"
                      ></path>
                    </svg>
                  </span>
                  <span class="nav-link-title"> Register </span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'login' }">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                      <path
                        d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"
                      ></path>
                      <path
                        d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"
                      ></path>
                    </svg>
                  </span>
                  <span class="nav-link-title"> Login </span>
                </router-link>
              </li>
            </template>
            <template v-if="authState">
              <li class="nav-item">
                <a class="nav-link" @click="handleLogout">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                      <path
                        d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"
                      ></path>
                      <path
                        d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"
                      ></path>
                    </svg>
                  </span>
                  <span class="nav-link-title"> Logout </span>
                </a>
              </li>
            </template>
          </ul>
        </div>
      </div>
      <!--end mobile view top menu section  -->
    </div>
  </div>
</template>

<script>
import { inject, onMounted, reactive, ref, toRefs } from "@vue/runtime-core";
import Logo from "../../assets/logo/logo.jpg";
import useAuth from "../../composables/useAuth";
export default {
  components: {},
  setup() {
    // inject reactive value
    const { authState} = inject("store");
    const { logout, removeAuthToken,getUserInfo } = useAuth();

    const user=reactive({
        userInfo:{}
    })

    onMounted(()=>{

       user.userInfo=JSON.parse(getUserInfo())


    })

    const handleLogout = () => {
      logout().then((e) => {
        if (e.status == 204) {
          removeAuthToken();
          window.location.href = "/";
        }
      });
    };

    return { Logo, authState, handleLogout,...toRefs(user) };
  },
};
</script>

<style lang="scss" scoped>
</style>
