<template>
  <Head title="osu!Collector to NeriNyan" />
  <div
    class="p-4 w-96 xl:w-[64rem] absolute left-1/2 -translate-x-1/2 top-1/4 border font-sans bg-neutral cursor-default"
  >
    <h1>How to use</h1>
    <ol>
      <li>
        <span @mouseenter="togglePopUp1" @mouseleave="togglePopUp1"
          >Enter the ID of the collection you want to download.</span
        >
        <img
          :src="'images/1.webp'"
          class="absolute shadow-xl z-10 border"
          v-if="showPopUp1"
        />
      </li>
      <li>
        <span @mouseenter="togglePopUp2" @mouseleave="togglePopUp2"
          >Copy all URLs.</span
        >
        <img
          :src="'images/2.webp'"
          class="absolute shadow-xl z-10 border"
          v-if="showPopUp2"
        />
      </li>
      <li>
        <span @mouseenter="togglePopUp3" @mouseleave="togglePopUp3"
          >Paste it on your download manager.</span
        >
        <img
          :src="'images/3.webp'"
          class="absolute shadow-xl z-10 border"
          v-if="showPopUp3"
        />
      </li>
    </ol>

    <form @submit.prevent="submit" class="join w-[22rem] xl:w-[62rem]">
      <input
        type="text"
        placeholder="Collection ID"
        class="input input-bordered w-full text-white join-item"
        v-model="form.input"
      />
      <button
        class="btn btn-info join-item normal-case"
        :disabled="form.processing"
      >
        Enter
      </button>
    </form>
  </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
  input: "",
});

const submit = () => {
  form.post("/");
};

const showPopUp1 = ref(false);
const showPopUp2 = ref(false);
const showPopUp3 = ref(false);

const togglePopUp1 = () => {
  setTimeout(() => {
    showPopUp1.value = !showPopUp1.value;
  }, 200);
};
const togglePopUp2 = () => {
  setTimeout(() => {
    showPopUp2.value = !showPopUp2.value;
  }, 200);
};
const togglePopUp3 = () => {
  setTimeout(() => {
    showPopUp3.value = !showPopUp3.value;
  }, 200);
};
</script>
