import { createRouter, createWebHistory } from "vue-router";
import landingPage from "@/views/landingPage.vue";
import personalInformation from "@/views/personalInformation.vue";
import covidQuestions from "@/views/covidQuestions.vue";
import vaccinationPage from "@/views/vaccinationPage.vue";
import advisePage from "@/views/advisePage.vue";
import thankYou from "@/views/thankYou.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "landingPage",
      component: landingPage,
    },
    {
      path: "/personal-information",
      name: "personalInformation",
      component: personalInformation,
      props: { id: "1" },
    },
    {
      path: "/covid-questions",
      name: "covidQuestions",
      component: covidQuestions,
      props: { id: "2" },
    },
    {
      path: "/vaccination",
      name: "vaccinationPage",
      component: vaccinationPage,
      props: { id: "3" },
    },
    {
      path: "/advise",
      name: "advisePage",
      component: advisePage,
      props: { id: "4" },
    },
    {
      path: "/thanks",
      name: "thanks",
      component: thankYou,
    },
  ],
  computed: {
    currentRouteName() {
      return this.router.name;
    },
  },
});

export default router;
