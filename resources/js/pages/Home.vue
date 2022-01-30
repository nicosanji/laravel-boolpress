<template>
  <div>
    <div class="container">
      <h1 class="display-4 py-4 mb-0 text-center font-weight-bold text-dark">
        {{ myMessage.toUpperCase() }}
      </h1>
      <!-- progress bar -->
      <div class="row my-2 w-50 mx-auto">
        <div class="col">
          <div class="progress" v-if="loading">
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
      <!-- posts col & category col -->
      <div class="row">
        <!-- posts -->
        <div class="col-8">
          <div class="d-flex flex-column text-center">
            <div
              class="bg-dark text-light px-2 py-4 mb-5 rounded"
              v-for="post in postsList"
              :key="post.id"
            >
              <router-link
                :to="{ name: 'posts.show', params: { id: post.id } }"
              >
                <h3 class="py-2">{{ post.title }}</h3>
              </router-link>
              <p
                class="bg-light text-dark rounded mx-5 py-3"
                v-html="post.description"
              ></p>
              <div
                class="d-flex justify-content-between align-items-center px-5"
              >
                <p class="cat-pill mb-0 bg-primary rounded py-1 px-2 text-dark">
                  Category: {{ post.category.cat_name }}
                </p>
                <p class="mb-0">
                  {{ post.user.name.toUpperCase() }}
                </p>
              </div>
              <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="
                  badge
                  bg-primary
                  text-white
                  rounded-pill
                  text-small
                  p-2
                  m-1
                "
                >{{ tag.tag_name }}</span
              >
            </div>
          </div>
        </div>
        <!-- categorie sidebar -->
        <div class="col-4 text-center">
          <h3>Select a Category:</h3>
          <ul class="list-group">
            <li
              class="list-group-item bg-dark text-primary"
              tabindex="1"
              @click="setCategory()"
            >
              All
            </li>
            <li
              tabindex="1"
              class="list-group-item bg-dark text-primary"
              v-for="category of categoriesList"
              :key="category.id"
              @click="setCategory(category.id)"
            >
              {{ category.cat_name }}
            </li>
          </ul>
        </div>
      </div>
      <!-- pagination -->
      <nav>
        <ul class="pagination justify-content-center pb-3">
          <li>
            <button
              v-if="currentPage != 1"
              class="page-link"
              @click="getData(currentPage - 1)"
            >
              Back
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
              Next
            </button>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "App",
  data() {
    return {
      myMessage: "BoolPress",
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

<style lang="scss">
h1 {
  text-shadow: 1px 1px 2px #3490dc;
}

a:hover {
  color: #f8f9fa;
}
.col-4 ul li {
  cursor: pointer;
  &:hover {
    background-color: #3490dc !important;
    color: white !important;
  }
  &:focus {
    background-color: #3490dc !important;
    color: white !important;
  }
}
.cat-pill {
  cursor: pointer;
  &:hover {
    color: white !important;
  }
}
</style>