<template>
  <div class="product-container">
    
    <div class="sort-section">
      <label for="sort">Sort by:</label>
      <select v-model="sortBy" @change="fetchProducts">
        <option value="price_asc">Price ascending</option>
        <option value="price_desc">Price descending</option>
      </select>
    </div>
    
    
    <div class="filter-section">
      <label for="category">Filter by category:</label>
      <select v-model="selectedCategory" @change="fetchProducts">
        <option value="">All categories</option>
        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
      </select>
    </div>

    
    <div v-for="product in filteredProducts" :key="product.id" class="product-card">
      <h2>{{ product.name }}</h2>
      <p class="description">{{ product.description }}</p>
      <p class="price">{{ product.price }} €</p>
     
      <img v-if="product.imageUrl" :src="product.imageUrl" :alt="product.name">
    </div>
  </div>
</template>


<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: [],
      categories: [],
      sortBy: 'price_asc',
      selectedCategory: '',
    };
  },
  mounted() {
    this.fetchProducts();
    this.fetchCategories();
  },
  methods: {
    fetchProducts() {
      let url = 'http://127.0.0.1:8000/api/products';
      
      if (this.selectedCategory !== '') {
        url += '?category=' + this.selectedCategory;
      }
      axios.get(url)
        .then(response => {
         
          if (this.sortBy === 'price_asc') {
            this.products = response.data.sort((a, b) => a.price - b.price);
          } else if (this.sortBy === 'price_desc') {
            this.products = response.data.sort((a, b) => b.price - a.price);
          } else {
            this.products = response.data;
          }
        
          this.products.forEach(product => {
            product.imageUrl = this.getProductImageUrl(product.image);
          });
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des produits :', error);
        });
    },
    fetchCategories() {
      
      axios.get('http://127.0.0.1:8000/api/categories')
        .then(response => {
          this.categories = response.data;
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des catégories :', error);
        });
    },
    getProductImageUrl(imagePath) {
      
      return 'http://127.0.0.1:8000/api/products/' + imagePath;
    }
  },
  computed: {
    filteredProducts() {
    
      if (this.selectedCategory === '') {
        return this.products;
      } else {
        return this.products.filter(product => product.category_id === this.selectedCategory);
      }
    }
  }
};
</script>

<style scoped>

.product-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.sort-section,
.filter-section {
  margin-bottom: 20px;
}

.product-card {
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  width: 80%;
  max-width: 600px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.product-card h2 {
  margin-top: 0;
  margin-bottom: 10px;
  font-size: 1.5rem;
}

.description {
  margin-bottom: 15px;
}

.price {
  font-weight: bold;
  font-size: 1.2rem;
}

.product-card img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
}
</style>
