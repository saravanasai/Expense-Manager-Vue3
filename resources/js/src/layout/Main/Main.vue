<template>
      <div class="page-wrapper">
    <div class="container-xl">
      <slot name="top-section">Top section</slot>
    </div>
    <div class="page-body">
      <div class="container-xl">
          <slot name="content"></slot>
      </div>
    </div>
  </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

</style>
