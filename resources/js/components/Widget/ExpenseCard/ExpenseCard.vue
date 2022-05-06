<template>
  <div class="card mb-2">
    <div class="card-body">
      <h2>$-{{ amount }}</h2>
      <h5>
        <span
          class="badge me-1"
          v-bind:class="amount < 1500 ? 'bg-warning' : 'bg-danger'"
        ></span
        >{{ category }}
      </h5>
      <div class="row">
        <div class="col-md-9">{{ note }}</div>
        <div class="col-md-3">{{ created }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    amount: Number,
    note: String,
    category: String,
    created: String,
  },
  setup(props) {},
};
</script>

<style>
</style>
