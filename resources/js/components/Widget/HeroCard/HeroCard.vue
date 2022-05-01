<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          <div class="col-md-8">
            <div class="m-5 p-5">
              <h1>Expense Tracker App</h1>
              <h3>Easy & Free & Open Source</h3>
              <h5>
                Its highly customizable & simple to use. Create account to start
                Tracking your expense.
              </h5>
              <div class="empty-action float-end">
                <router-link :to="{name:'new-expense'}" class="btn btn-dark">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-run"
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
                    <circle cx="13" cy="4" r="1"></circle>
                    <path d="M4 17l5 1l.75 -1.5"></path>
                    <path d="M15 21l0 -4l-4 -3l1 -6"></path>
                    <path d="M7 12l0 -3l5 -1l3 3l3 1"></path>
                  </svg>
                  Start Tracking
                </router-link>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="empty">
              <div class="empty-img">
                <img class="w-100 h-100" :src="HeroImage" alt="" height="100%" width="100%"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HeroImage from "../../../src/assets/heroimage/hero.jpg"
export default {

    setup()
    {

        return {HeroImage}
    }
};
</script>

<style>
</style>
