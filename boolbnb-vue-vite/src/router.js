//? importiamo il router:
import { createRouter, createWebHistory } from "vue-router";

//? importiamo le pagine del progetto:
import HomePage from './pages/HomePage.vue';
import ResultsPage from './pages/ResultsPage.vue';
import DetailPage from "./pages/DetailPage.vue";
import NotFoundPage from "./pages/NotFoundPage.vue";

//? creiamo rotte:
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomePage,
    },
    {
      path: "/results",
      name: "results",
      component: ResultsPage,
    },
    {
      path: "/details/:slug",
      name: "details",
      component: DetailPage,
    },
    {
      path: "/not-found",
      name: "not-found",
      component: NotFoundPage,
    },
    
  ],
});
export { router };