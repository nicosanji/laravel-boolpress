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
      <div class="row">
        <div class="col justify-content-center d-flex">
          <nav>
            <ul class="pagination">
              <li>
                <button
                  v-if="currentPage != 1"
                  class="page-link"
                  @click="getData(currentPage - 1)"
                >
                  Indietro
                </button>
              </li>

              <li
                v-for="page of lastPage"
                :key="page"
                class="page-item"
                :class="{ active: currentPage === page }"
              >
                <button class="page-link" @click="getData(page)">
                  {{ page }}
                </button>
              </li>

              <li>
                <button
                  v-if="currentPage != lastPage"
                  class="page-link"
                  @click="getData(currentPage + 1)"
                >
                  Avanti
                </button>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "App",
  data() {
    return {
      myMessage: "Post List",
      postsList: [],
      currentPage: 1,
      lastPage: null,
    };
  },
  methods: {
    getData(page = 1) {
      axios.get("/api/posts?page=" + page).then((resp) => {
        this.postsList = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
      });
    },
  },
  mounted() {
    this.getData();
  },
};
</script>

<style>
</style>