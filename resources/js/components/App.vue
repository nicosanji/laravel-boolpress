<template>
  <div>
    <div class="container text-center">
      <h1>{{ myMessage }}</h1>
      <div v-for="post in postsList" :key="post.id">
        {{ post.title }}
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "app",
  data() {
    return {
      myMessage: "Post List",
      postsList: [],
    };
  },
  mounted() {
    axios.get("/api/posts").then((resp) => {
      this.postsList = resp.data;
      console.log(this.postsList);
    });
  },
};
</script>

<style>
</style>
