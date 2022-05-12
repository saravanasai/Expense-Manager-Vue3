<template>
  <div class="card card-sm m-2">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto">
          <span v-bind:class="`bg-${color} text-white avatar`"
            ><!-- Download SVG icon from http://tabler-icons.io/i/message -->
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
              <desc>
                Download more icon variants from
                https://tabler-icons.io/i/message
              </desc>
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path
                d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"
              ></path>
              <line x1="8" y1="9" x2="16" y2="9"></line>
              <line x1="8" y1="13" x2="14" y2="13"></line>
            </svg>
          </span>
        </div>
        <div class="col">
          <div class="font-weight-medium">Book Name : {{bookName}}</div>
          <div class="text-muted">Onwer:{{bookOwner}}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

    props:{
     color:String,
     bookName:String,
     bookOwner:String

    },
    setup()
    {

    }
};
</script>

<style>
</style>
