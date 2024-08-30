import router from "@/router";

export default {
  personalInformationPage() {
    router.push({ name: "personalInformation" });
  },
  covidQuestionsPage() {
    router.push({ name: "covidQuestions" });
  },
  vaccinationPage() {
    router.push({ name: "vaccinationPage" });
  },
  advisePage() {
    router.push({ name: "advisePage" });
  },
  thanksPage() {
    router.push({ name: "thanks" });
  },
};
