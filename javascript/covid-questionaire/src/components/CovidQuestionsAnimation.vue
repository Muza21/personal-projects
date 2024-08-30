<template>
  <img
    class="h-[800px] z-10"
    src="/src/assets/vaccinate2.png"
    alt="vaccinate"
  />
  <img
    class="mt-52 ml-14 absolute transition-all duration-75 ease-in-out"
    v-motion
    :initial="{
      opacity: 0,
      x: 200,
      y: -200,
      width: 50,
      height: 50,
    }"
    :enter="{ opacity: 1, x: 0, y: 0, height: 229, width: 229 }"
    :leave="{ opacity: 0, x: 0, y: 0, height: 229, width: 229 }"
    src="/src/assets/red_circle.png"
    alt="rectangle"
  />
</template>

<script>
export default {};
</script>
