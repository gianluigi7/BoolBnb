<script>

import { store } from '../store';
import axios from "axios";
import CardsComponent from '../components/CardsComponent.vue';


export default {
   nome: 'Home',
   props: {

   },
   data() {
      return {
         store,
         current_page: 1,
         last_page: 1,
         page: [],
      }
   },
   components: {
      CardsComponent,
   },
   methods: {
      getLastPage(){
         let totalApartments = this.store.data.results.total;
         let totalPage = totalApartments / 12;

         if (!totalPage % 0) {
            return totalPage + 1;
         }

      },

      getApartments() {
         this.store.search = "";

         const url = this.store.api.baseUrl + this.store.api.endpoints.apartmentsList;

         axios.get(url, {
            params: {
               page: this.current_page,
            }
         })
            .then(response => {
               console.log(response);
               
               this.store.api.apartments = response.data.results.data;
               this.store.api.apartmentsSponsored = response.data.results.ads_active;
               this.page = response.data.results;
               this.last_page = Math.ceil(this.page.total / this.page.per_page); 
               console.log(response.data);
               console.log(response.data.results.ads_active);
               console.log(this.page.results);


            })
      },

      //? Navigazione pagina:
      prevPage() {
         this.current_page--;
         this.getApartments();
         window.scrollTo(0, 0);
      },
      nextPage() {
         this.current_page++;
         this.getApartments();
         window.scrollTo(0, 0);
      }
   },
   created() {
      this.getApartments()
   }
}

</script>

<template>
   <div class="container mt-4">
      <div class="row">
         <div class="d-flex flex-wrap">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12" v-for="(apartment, index) in store.api.apartments" :key="apartment.id">

               <CardsComponent :apartment="apartment" :apartmentsSponsored="sponsored" v-show="apartment.active === 1"/>
            </div>
         </div>
         <!--? bottoni per la navigazione -->
         <div class="pagination">
            <button @click="prevPage" class="mr-25" :class="{'d-none': current_page == 1 }">
               <font-awesome-icon :icon="['fas', 'arrow-left']" />
            </button>
            <button @click="nextPage" v-if="current_page < last_page">
               <font-awesome-icon :icon="['fas', 'arrow-right']" />
            </button>
         </div>
      </div>
   </div>
</template>



<style lang="scss" scoped>
@use '../assets/scss/partials/extende' as *;

img {
   height: 100%;
}

.img-container {
   height: 180px;

   &:hover {
      transform: scale(1.01);
      transition: .3s;
      cursor: pointer;
   }
}

.pagination {
   justify-content: center;
   margin: 35px 0 50px;

   button {
      text-align: center;
      padding: 10px 35px;
      background: $gradient;
      color: $secondary;
      border-radius: 10px;
      border: none;
      @extend %shadow;

      &:hover {
         opacity: .85;
         @extend %shadow2;
      }
   }
}

@media (max-width: 576px) {
   .col-12 {
      width: 80%;
      margin: 0 auto;
   }
}
</style>