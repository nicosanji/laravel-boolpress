<template>
  <div>
    <div class="container text-center">
      <h1 class="pb-5">{{ myMessage }}</h1>
      <div
        class="border-bottom border-dark"
        v-for="post in postsList"
        :key="post.id"
      >
        <h3>{{ post.title }}</h3>
        <p v-html="post.description"></p>
        <p>{{ post.user.name }}</p>
        <p>{{ post.category.cat_name }}</p>
        <span
          v-for="tag in post.tags"
          :key="tag.id"
          class="badge bg-primary text-white ms-2 rounded-pill text-small"
          >{{ tag.tag_name }}</span
        >
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
      //console.log(this.postsList);
    });
  },
};
</script>

<style>
</style>
