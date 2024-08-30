import personalMutations from "@/store/modules/personal-information/mutations.js";

export default {
  namespaced: true,
  state() {
    return {
      name: "",
      lastname: "",
      email: "",
    };
  },
  mutations: personalMutations,
};
