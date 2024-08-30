<template>
  <div class="page w-full">
    <div class="-mt-40">
      <div class="h-screen flex flex-col justify-center items-center">
        <img
          class="absolute z-30"
          id="logo"
          src="/src/assets/redberryLogo.svg"
          alt="logo"
        />
        <div class="bg-gray-200 h-[400px] w-[500px] z-10"></div>
        <div class="text-5xl text-center text-gray-800 font-bold z-0">
          <router-link :to="{ name: 'personalInformation' }">
            <h1 id="begin">კითხვარის<br />დაწყება</h1>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
#logo {
  margin-left: auto;
  margin-right: auto;
  width: 100vw;
  height: 100vh;

  animation: logo-appear 1s ease alternate forwards;
}
#begin {
  margin-top: -200px;
  animation: text-appear 0.3s ease alternate forwards;
  animation-delay: 1s;
}

@keyframes text-appear {
  0% {
  }

  100% {
    margin-top: 0;
  }
}
@keyframes logo-appear {
  0% {
    width: 100vw;
    height: 100vw;
    border-radius: 50%;
  }

  100% {
    width: 100px;
    height: 100px;
    border-radius: 50%;
  }
}
</style>
