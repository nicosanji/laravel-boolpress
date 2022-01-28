<template>
  <div>
    <h2>Categories Details</h2>
    <h3>{{ category.cat_name }}</h3>
    <div class="d-flex flex-column text-center">
      <div
        class="bg-dark text-light p-2 mb-4 rounded"
        v-for="post in category.posts"
        :key="post.id"
      >
        <h3>{{ post.title }}</h3>
        <p v-html="post ? post.description : ''"></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      category: {
        type: Object,
        default: () => ({}),
      },
    };
  },
  methods: {
    fetchPost() {
      window.axios
        .get("/api/categories/" + this.$route.params.category)
        .then((resp) => {
          this.category = resp.data;
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