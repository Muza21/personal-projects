import adviseMutations from "@/store/modules/advise-page/mutations.js";

export default {
  namespaced: true,
  state() {
    return {
      meetingNumber: "",
      officeWork: "",
      meetingOpinion: "",
      adviseOpinion: "",
    };
  },
  mutations: adviseMutations,
};
