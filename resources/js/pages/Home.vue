<template>
  <div>
    <div class="container">
      <h1 class="display-4 py-4 mb-0 text-center font-weight-bold">
        {{ myMessage.toUpperCase() }}
      </h1>
      <div class="row">
        <div class="col">
          <div class="progress my-2" v-if="loading">
            <div
              class="progress-bar progress-bar-striped progress-bar-animated"
              role="progressbar"
              aria-valuenow="75"
              aria-valuemin="0"
              aria-valuemax="100"
              style="width: 75%"
            ></div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- posts -->
        <div class="col-8">
          <div class="d-flex flex-column text-center">
            <div
              class="bg-dark text-light p-2 mb-4 rounded"
              v-for="post in postsList"
              :key="post.id"
            >
              <router-link
                :to="{ name: 'posts.show', params: { id: post.id } }"
              >
                <h3>{{ post.title }}</h3>
              </router-link>
              <p
                class="bg-light text-dark rounded mx-5"
                v-html="post.description"
              ></p>
              <p>Created by: {{ post.user.name.toUpperCase() }}</p>
              <p>Category: {{ post.category.cat_name }}</p>
              <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="badge bg-primary text-white ms-2 rounded-pill text-small"
                >{{ tag.tag_name }}</span
              >
            </div>
          </div>
        </div>
        <!-- categorie sidebar -->
        <div class="col-4">
          <h3>Select a Category:</h3>
          <ul>
            <li
              v-for="category of categoriesList"
              :key="category.id"
              @click="setCategory(category.id)"
            >
              {{ category.cat_name }}
            </li>
          </ul>
        </div>
      </div>
      <!-- paginazione -->
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
      selectedCategory: null,
      categoriesList: [],
      currentPage: 1,
      lastPage: null,
      loading: true,
    };
  },
  methods: {
    setCategory(id) {
      this.selectedCategory = id;

      this.getData();
    },
    getData(page = 1) {
      this.loading = true;

      axios
        .get("/api/posts", {
          params: {
            page,
            category: this.selectedCategory,
          },
        })
        .then((resp) => {
          this.postsList = resp.data.data;
          this.currentPage = resp.data.current_page;
          this.lastPage = resp.data.last_page;
          this.loading = false;
        });
    },
    getCategories() {
      axios.get("/api/categories").then((resp) => {
        this.categoriesList = resp.data;
      });
    },
  },
  mounted() {
    this.getData();
    this.getCategories();
  },
};
</script>

<style>
a:hover {
  color: #f8f9fa;
}
</style>