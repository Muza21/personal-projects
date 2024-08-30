<template>
  <img
    class="h-[800px] z-10"
    src="/src/assets/scan2.png"
    alt="personal information"
  />

  <img
    class="mt-56 absolute transition-all duration-75 ease-in-out"
    v-motion
    :initial="{
      opacity: 0,
      x: -300,
      y: 100,
      width: 50,
      height: 50,
    }"
    :enter="{ opacity: 1, x: 0, y: 0, height: 75, width: 622 }"
    :leave="{ opacity: 0, x: 0, y: 0, height: 75, width: 622 }"
    src="/src/assets/yellow_rectangle.png"
    alt="rectangle"
  />
</template>

<script>
export default {};
</script>
