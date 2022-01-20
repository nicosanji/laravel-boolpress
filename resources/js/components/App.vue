<template>
  <div class="container text-center">
      <h1>{{ myMessage }}</h1>
    <div v-for="post in postsLists" :key="post.id">
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      myMessage: "Post List",
      postsList: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      this.postsList = resp.data;
    });
  },
};
</script>

<style>
</style>
