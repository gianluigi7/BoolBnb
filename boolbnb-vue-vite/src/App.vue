<script>
// import:
import HeaderComponent from './shared/HeaderComponent.vue';
import FooterComponent from './shared/FooterComponent.vue';



export default {
   nome: 'App',
   components: {
      HeaderComponent,
      FooterComponent,
   }
}

</script>



<template>
  
   <!--? HEADER -->
   <HeaderComponent />
   
   <main>
      <!--? CONTENT -->
      <router-view></router-view>
   </main>
   
   <!--? footer -->
   <FooterComponent />


</template>


<style lang="scss" scoped>

main {
   min-height: calc(100vh - 120px);
}

</style>
