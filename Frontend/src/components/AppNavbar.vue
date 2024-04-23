<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <router-link to="/" class="navbar-brand">Product Management</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
     </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <router-link to="/products" class="nav-link">Product List</router-link>
    </li>
    <li class="nav-item"> 
      <router-link to="/add-product" class="nav-link">Add Product</router-link>
    </li>
    <li class="nav-item">
      <router-link to="/add-category" class="nav-link">Add Category</router-link>
    </li>

        </ul>
      </div>
    </div>
  </nav>
</template>

<script>

export default {
  name: 'AppNavbar',
};
</script>

<style scoped>

.navbar-brand {
  font-size: 1.5rem;
  font-weight: bold;
}

.navbar-nav .nav-item .nav-link {
  font-size: 1.2rem;
}

.navbar-toggler-icon {
  background-color: #fff;
}

.navbar-dark .navbar-toggler {
  border-color: transparent;
}

.navbar-dark .navbar-toggler:focus,
.navbar-dark .navbar-toggler:active {
  outline: none;
  box-shadow: none;
}

</style>
