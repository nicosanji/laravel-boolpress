<template>
  <div>
    <h3>{{ post.title }}</h3>
    <p v-html="post.description"></p>
    <p>{{ post.category.cat_name }}</p>
    <p>{{ post.user.name }}</p>
    <span
      v-for="tag in post.tags"
      :key="tag.id"
      class="badge bg-primary text-white ms-2 rounded-pill text-small"
      >{{ tag.tag_name }}</span
    >
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: Object,
    };
  },
  methods: {
    fetchPost() {
      window.axios.get("/api/posts/" + this.$route.params.id).then((resp) => {
        this.post = resp.data;
      });
    },
  },
  mounted() {
    this.fetchPost();
  },
};
</script>

<style>
</style>