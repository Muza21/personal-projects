import { createStore } from "vuex";

import rootActions from "@/store/actions.js";
import rootMutations from "@/store/mutations.js";
import advisePage from "@/store/modules/advise-page/index.js";
import personalInformation from "@/store/modules/personal-information/index.js";
import vaccinationPage from "@/store/modules/vaccination-page/index.js";
import covidQuestions from "@/store/modules/covid-questions/index.js";

const store = createStore({
  modules: {
    personal: personalInformation,
    covid: covidQuestions,
    vaccine: vaccinationPage,
    advise: advisePage,
  },

  actions: rootActions,
  mutations: rootMutations,
});

export default store;
