<template>
  <img class="h-[800px] z-10" src="/src/assets/bike.png" alt="bike" />
  <img
    class="mt-16 ml-28 absolute transition-all duration-75 ease-in-out"
    v-motion
    :initial="{
      opacity: 0,
      x: -100,
      y: -100,
      width: 50,
      height: 50,
    }"
    :enter="{ opacity: 1, x: 0, y: 0, height: 229, width: 229 }"
    :leave="{ opacity: 0, x: 0, y: 0, height: 229, width: 229 }"
    src="/src/assets/red_heart.png"
    alt="rectangle"
  />
</template>

<script>
export default {};
</script>
