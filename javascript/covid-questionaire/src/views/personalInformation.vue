<template>
  <div class="page w-full">
    <div class="bg-gray-200 px-[200px] pt-[100px] h-screen">
      <ValidationForm @submit="onSubmit">
        <navigation-bar :id="pageNum"></navigation-bar>
        <div class="flex justify-between">
          <div class="mt-8">
            <div>
              <label class="font-bold" for="name">სახელი*</label>
              <div class="mt-2">
                <Field
                  name="name"
                  type="name"
                  :value="name"
                  class="border-2 border-gray-800 py-3 px-4 w-[500px] bg-gray-200"
                  rules="required|min:2|georgian_text"
                  @input="updateName"
                />
                <div>
                  <ErrorMessage class="ml-4 text-orange-600" name="name" />
                </div>
              </div>
            </div>
            <div class="mt-12">
              <label class="font-bold" for="lastname">გვარი*</label>
              <div class="mt-2">
                <Field
                  name="lastname"
                  type="text"
                  :value="lastname"
                  class="border-2 border-gray-800 py-3 px-4 w-[500px] bg-gray-200"
                  rules="required|min:2|georgian_text"
                  @input="updateLastName"
                />
                <div>
                  <ErrorMessage class="ml-4 text-orange-600" name="lastname" />
                </div>
              </div>
            </div>
            <div class="mt-12">
              <label class="font-bold" for="email">მეილი*</label>
              <div class="mt-2">
                <Field
                  name="email"
                  type="email"
                  :value="email"
                  class="border-2 border-gray-800 py-3 px-4 w-[500px] bg-gray-200"
                  rules="required|email|redberry_email"
                  @input="updateEmail"
                />
                <div>
                  <ErrorMessage class="ml-4 text-orange-600" name="email" />
                </div>
              </div>
            </div>

            <div
              class="mt-32 w-[237px] border-t-2 border-gray-600 text-gray-600"
            ></div>
            <div class="mt-4 w-[260px]">
              <p>*-ით მონიშნული ველების შევსება სავალდებულოა</p>
            </div>
          </div>
          <div class="flex justify-center mt-8">
            <RectangleAnimation></RectangleAnimation>
          </div>
        </div>
        <div class="flex justify-between w-[130px] m-auto">
          <div></div>
          <button>
            <NextArrow />
          </button>
        </div>
      </ValidationForm>
    </div>
  </div>
</template>

<script>
import { mapActions, mapMutations, mapState } from "vuex";
import { Form as ValidationForm, Field, ErrorMessage } from "vee-validate";
import RectangleAnimation from "@/components/RectangleAnimation.vue";
import NextArrow from "@/icons/NextArrow.vue";

export default {
  data() {
    return {
      pageNum: this.id,
    };
  },

  props: {
    id: {
      type: String,
      default: null,
    },
  },
  components: {
    Field,
    ValidationForm,
    ErrorMessage,
    RectangleAnimation,
    NextArrow,
  },
  computed: {
    ...mapState("personal", ["name", "lastname", "email"]),
  },

  methods: {
    onSubmit() {
      this.covidQuestionsPage();
    },
    ...mapActions(["covidQuestionsPage"]),
    ...mapMutations("personal", ["setName", "setLastName", "setEmail"]),
    updateName(e) {
      this.setName(e.target.value);
    },

    updateLastName(e) {
      this.setLastName(e.target.value);
    },
    updateEmail(e) {
      this.setEmail(e.target.value);
    },
  },
};
</script>
