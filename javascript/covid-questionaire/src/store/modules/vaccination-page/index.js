import vaccineMutations from "@/store/modules/vaccination-page/mutations.js";

export default {
  namespaced: true,
  state() {
    return {
      hadVaccine: "",
      stageLevel: "",
      planAhead: "",
    };
  },
  mutations: vaccineMutations,
};
