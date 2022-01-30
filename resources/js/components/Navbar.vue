<template>
  <nav class="navbar navbar-expand-lg bg-dark text-primary" id="mainNav">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav h5">
          <li class="nav-item">
            <router-link class="nav-link py-4 router-link-active" to="/"
              >Home</router-link
            >
          </li>
          <li class="nav-item">
            <router-link
              class="nav-link py-4 router-link-active"
              :to="{ name: 'contact' }"
              >Contact</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link py-4 router-link-active" to="/about"
              >About Us</router-link
            >
          </li>
          <li class="nav-item">
            <!-- data bug -->
            <a class="nav-link py-4" href="/login">{{
              user.name ? user.name : "Admin Area"
            }}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      user: {
        type: Object,
        default: () => ({}),
      },
    };
  },
  mounted() {
    window.axios.get("/api/user").then((resp) => {
      this.user = resp.data;
    });
  },
};
</script>

<style lang="scss">
nav .router-link-exact-active {
  color: white !important;
}
</style>