<template>
  <div class="page w-full">
    <div class="bg-[#232323] h-screen">
      <img
        class="absolute transition-all delay-300 duration-75 ease-in-out left-1/2 top-1/2 -translate-x-[180px] -translate-y-[120px]"
        v-motion
        :initial="{
          opacity: 0,
          x: 0,
          y: 0,
          width: 40,
          height: 40,
        }"
        :enter="{ opacity: 1, x: -180, y: -120, height: 53, width: 53 }"
        src="/src/assets/big_white_star.png"
        alt="star"
      />
      <img
        class="absolute transition-all delay-300 duration-75 ease-in-out left-1/2 top-1/2 translate-x-[160px] translate-y-[50px]"
        v-motion
        :initial="{
          opacity: 0,
          x: 0,
          y: 0,
          width: 30,
          height: 30,
        }"
        :enter="{ opacity: 1, x: 160, y: 50, height: 33, width: 33 }"
        src="/src/assets/small_white_star.png"
        alt="star"
      />
      <div
        v-motion
        :initial="{
          opacity: 0,
          x: -220,
          y: -25,
        }"
        :enter="{ opacity: 1, x: -220, y: -25 }"
        class="absolute transition-all delay-150 duration-150 ease-in-out left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
      >
        <img src="/src/assets/thanks.png" alt="thanks" />
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>
