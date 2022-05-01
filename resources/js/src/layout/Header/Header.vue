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
        <a href=".">
          <img
            :src="Logo"
            alt="Expense Manager"
            class="navbar-brand-image"
            width="110"
            height="32"
          />
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="d-none d-md-flex">
          <a
            href="?theme=dark"
            class="nav-link px-0 hide-theme-dark"
            title=""
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            data-bs-original-title="Enable dark mode"
          >
            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
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
              <path
                d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"
              ></path>
            </svg>
          </a>
          <a
            href="?theme=light"
            class="nav-link px-0 hide-theme-light"
            title=""
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            data-bs-original-title="Enable light mode"
          >
            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
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
              <circle cx="12" cy="12" r="4"></circle>
              <path
                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"
              ></path>
            </svg>
          </a>
        </div>
        <!-- logout dropdown section -->
        <div class="nav-item dropdown">
          <a
            href="#"
            class="nav-link d-flex lh-1 text-reset p-0"
            data-bs-toggle="dropdown"
            aria-label="Open user menu"
          >
            <span
              class="avatar avatar-sm"
              style="background-image: url(./static/avatars/000m.jpg)"
            ></span>
            <div class="d-none d-xl-block ps-2">
              <div>Paweł Kuna</div>
              <div class="mt-1 small text-muted">UI Designer</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="#" class="dropdown-item">Set status</a>
            <a href="#" class="dropdown-item">Profile &amp; account</a>
            <a href="#" class="dropdown-item">Feedback</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">Settings</a>
            <a href="#" class="dropdown-item">Logout</a>
          </div>
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
                <span class="nav-link-title"> About Us </span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'expense' }">
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
                <span class="nav-link-title"> My-Expense </span>
              </router-link>
            </li>
            <template v-if="!authState">
              <li class="nav-item" >
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
              <li class="nav-item"  >
                <a class="nav-link" @click="handleLogout" >
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
import { inject } from '@vue/runtime-core';
import Logo from "../../assets/logo/logo.jpg";
import useAuth from '../../composables/useAuth';
import useNavigation from '../../composables/useNavigation';
export default {
  components: {},
  setup() {

    // inject reactive value
    const { authState} = inject("store");
    const { logout,removeAuthToken} = useAuth()
    const { router,route} = useNavigation()

    const handleLogout=()=>{

        logout().then(e=>{

            if(e.status==204)
            {
                removeAuthToken()
                window.location.href='/'
            }
        })
    }

    return { Logo,authState,handleLogout};
  },
};
</script>

<style lang="scss" scoped>
</style>
