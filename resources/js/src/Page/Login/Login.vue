<template>
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"></a>
      </div>
      <form class="card card-md" action="." method="get" autocomplete="off">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input
              v-model="email"
              type="email"
              class="form-control"
              placeholder="Enter email"
              autocomplete="off"
            />
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <!-- <span class="form-label-description">
                <a href="./forgot-password.html">I forgot password</a>
              </span> -->
            </label>
            <div class="input-group input-group-flat">
              <input
                v-bind:type="isVisible ? 'text' : 'password'"
                v-model="password"
                class="form-control"
                placeholder="Password"
                autocomplete="off"
              />
              <span class="input-group-text">
                <a
                  @click="isVisible = !isVisible"
                  href="#"
                  class="link-secondary"
                  title=""
                  data-bs-toggle="tooltip"
                  data-bs-original-title="Show password"
                  ><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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
                    <circle cx="12" cy="12" r="2"></circle>
                    <path
                      d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"
                    ></path>
                  </svg>
                </a>
              </span>
            </div>
          </div>
          <div class="form-footer">
            <button
              type="button"
              @click="handleLogin"
              class="btn btn-primary w-100"
            >
              Log in
            </button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
        Don't have account yet?
        <router-link :to="{ name: 'register' }" tabindex="-1"
          >Sign up</router-link
        >
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, toRefs } from "@vue/reactivity";
import useAuth from "../../composables/useAuth";
import { inject } from "@vue/runtime-core";
import useNavigation from "../../composables/useNavigation";
export default {
  setup() {
    // inject reactive value
    const { updateAuthState } = inject("store");

    const state = reactive({ email: "", password: "", isVisible: false });

    const { login, setAuthToken } = useAuth();
    const { router, route } = useNavigation();

    const handleLogin = () => {
      let data = {
        email: state.email,
        password: state.password,
      };

      login(data)
        .then((e) => {
          if (e.status == 200) {
            setAuthToken(e.data.token, e.data.user);
            updateAuthState(true);
            window.location.href = route.query.redirect
              ? route.query.redirect
              : "/";
          }
        })
        .catch((e) => {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: `${e.message}`,
            toast:true,
            showConfirmButton: false,
            timer: 1500,
          });
        });
    };

    return { ...toRefs(state), handleLogin };
  },
};
</script>

<style>
</style>
