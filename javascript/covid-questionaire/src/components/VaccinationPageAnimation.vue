<template>
  <img class="h-[800px] z-10" src="/src/assets/doctor2.png" alt="doctor" />
  <img
    class="-mt-4 ml-12 absolute transition-all duration-75 ease-in-out"
    v-motion
    :initial="{
      opacity: 0,
      x: -100,
      y: 200,
      width: 50,
      height: 50,
    }"
    :enter="{ opacity: 1, x: 0, y: 0, height: 288, width: 313 }"
    :leave="{ opacity: 0, x: 0, y: 0, height: 288, width: 313 }"
    src="/src/assets/yellow_star.png"
    alt="rectangle"
  />
</template>

<script>
export default {};
</script>
