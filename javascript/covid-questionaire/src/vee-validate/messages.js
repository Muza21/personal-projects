import { configure } from "vee-validate";
import { localize, setLocale } from "@vee-validate/i18n";
import ka from "@/vee-validate/ka.js";

configure({
  generateMessage: localize({
    ka: ka,
  }),
});

setLocale("ka");
