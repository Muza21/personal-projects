import { defineRule } from "vee-validate";
import { required, min, email } from "@vee-validate/rules";

defineRule("required", required);
defineRule("min", min);
defineRule("email", email);

defineRule("redberry_email", (value) => {
  if (!value.match(/@redberry.ge$/)) {
    return false;
  }
  return true;
});
defineRule("antigen_number", (value) => {
  if (!value.match(/^[0-9]+$/)) {
    return false;
  }
  return true;
});
defineRule("date_format", (value) => {
  if (
    !value.match(/^$/) &&
    !value.match(
      /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:20(?:19|2[0-2]))$|^(?:29(\/|-|\.)(?:0?2)\3(?:2020))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:20(?:19|2[0-2]))$/
    )
  ) {
    return false;
  }
  return true;
});
defineRule("georgian_text", (value) => {
  if (!value.match(/^[\u10D0-\u10F0]+$/)) {
    return false;
  }
  return true;
});
