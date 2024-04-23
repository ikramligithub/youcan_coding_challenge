// router.js
import { createRouter, createWebHistory } from 'vue-router';
import CategoryForm from './components/CategoryForm.vue';
import ProductForm from './components/ProductForm.vue';
import ProductList from './components/ProductList.vue';

const routes = [
  {
    path: '/',
    redirect: '/products' 
  },
  {
    path: '/products',
    component: ProductList
  },
  {
    path: '/add-product',
    component: ProductForm
  },
  {
    path: '/add-category',
    component: CategoryForm
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
