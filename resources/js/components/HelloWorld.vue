<template>
  <EmojiPicker @select="showEmoji" />
  <br />

  <h3>With Input</h3>
  <EmojiPicker picker-type="input" @select="onSelectEmoji" />
  <br />

  <h3>With Textarea</h3>
  <EmojiPicker picker-type="textarea" @select="onSelectEmoji" />
  <br />
  <br />
</template>

<script>
import EmojiPicker from "vue3-emoji-picker";
import "../node_modules/vue3-emoji-picker/dist/style.css";

import { ref } from "vue";
export default {
  name: "App",
  components: {
    EmojiPicker: EmojiPicker,
  },
  setup() {
    const input = ref("");

    function onSelectEmoji(emoji) {
      console.log(emoji);
      input.value += emoji.i;
    }

    function showEmoji(emoji) {
      alert(`emoji ${emoji.i} selected, check console for details`);
      console.log(emoji);
    }

    return {
      input,
      onSelectEmoji,
      showEmoji,
    };
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
