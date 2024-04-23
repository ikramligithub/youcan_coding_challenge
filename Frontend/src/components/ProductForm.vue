<template>
  <form @submit.prevent="submitForm">
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input id="name" type="text" class="form-control" v-model="product.name" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea id="description" class="form-control" v-model="product.description"></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input id="price" type="number" class="form-control" v-model.number="product.price" required>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input id="image" type="file" class="form-control-file" accept="image/*" @change="handleFileUpload">
    </div>
    <div class="form-group">
      <label for="categories">Category:</label>
      <select id="categories" class="form-control" v-model="product.category_id" required>
        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</template>


<script>
import axios from 'axios';
import mitt from 'mitt';

export default {
  data() {
    return {
      product: {
        name: '',
        description: '',
        price: null,
        image: '',
        category_id: null
      },
      categories: []
    };
  },
  methods: {
    submitForm() {
      let formData = new FormData();
      formData.append('name', this.product.name);
      formData.append('description', this.product.description);
      formData.append('price', this.product.price);
      formData.append('image', this.product.image);
      formData.append('category_id', this.product.category_id);

      axios.post("http://127.0.0.1:8000/api/products", formData) 
        .then(response => {
          console.log(response.data);
          alert("Produit ajouté avec succès");
        })
        .catch(error => {
          console.error("Erreur lors de l'ajout du produit :", error);
          alert("Échec de l'ajout du produit");
        });
    },
    handleFileUpload(e) {
      this.product.image = e.target.files[0];
    },
    updateCategories() {
      axios.get("http://127.0.0.1:8000/api/categories")
        .then(({ data }) => {
          this.categories = data;
        })
        .catch(error => {
          console.error("Erreur lors de la récupération des catégories :", error);
        });
    }
  },
  mounted() {
    this.updateCategories(); 
    this.$emitter = mitt(); 
    this.$emitter.on('category-added', this.updateCategories);
  },
  beforeUnmount() {
    this.$emitter.off('category-added', this.updateCategories); 
  }
}
</script>

<style>
form {
  max-width: 450px;
  margin: 30px auto;
  background: rgb(223, 236, 236);
  text-align: left;
  padding: 70px;
  border-radius: 14px;
}
label {
  color: rgb(11, 12, 12);
  display: block;
  margin: 25px 0 15px;
  font-size: 1em;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: bold;
}
input, textarea, select {
  display: block;
  padding: 10px 6px;
  width: 100%;
  border: none;
  border-bottom: 2px solid gainsboro;
  color: #555;
}
button[type="submit"] {
  margin-top: 30px;
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
