import covidMutations from "@/store/modules/covid-questions/mutations.js";

export default {
  namespaced: true,
  state() {
    return {
      hadCovid: "",
      testDone: "",
      testDate: "",
      covidAntigen: "",
      covidDate: "",
    };
  },
  mutations: covidMutations,
};
