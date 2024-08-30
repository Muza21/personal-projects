<template>
  <div
    class="flex justify-between text-red-500 font-extrabold w-full text-3xl border-b-2 border-gray-800"
  >
    <div class="flex my-4">
      <h1 class="text-3xl">REDBERRY</h1>
      <img class="-mt-3" src="/src/assets/logoR.svg" alt="logo" />
    </div>

    <div class="text-gray-800 my-4">{{ id }}/4</div>
  </div>
</template>

<script>
export default {
  props: ["id"],
};
</script>
