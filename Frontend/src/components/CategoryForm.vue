<template>
  <div>
    
    <form @submit.prevent="saveData">
      <div class="form-group">
        <label for="categoryName">Category Name:</label>
        <input type="text" class="form-control" v-model="categorie.name" name="categoryName" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      categorie: {
        name: '',
        parent_id: null 
      }
    }
  },
  methods: {
    saveData() {
      axios.post("http://127.0.0.1:8000/api/categories", this.categorie)
        .then(({ data }) => {
          console.log(data);
          alert("Sauvegardé avec succès");
          this.$emit('category-added'); 
        })
        .catch(error => {
          console.error("Erreur lors de la sauvegarde :", error);
          alert("Échec de la sauvegarde");
        });
    }
  }
}
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
  