  <script>
  export default {
    name: 'NotFoundPage'
  };
  </script>


<template>
    <div>
        <div class="not-found">
            <div class="container">
                <div class="image">
                    <img src="/public/img/404.svg" alt="404 page">
                    <div class="text">
                        <h3>Torna indietro:</h3>
                        <router-link :to="{name: 'home' }" class="link-404">Indietro</router-link>
    
                    </div>
                </div>
            </div>

        </div>
    </div>
  </template>
  
  
  <style lang="scss" scoped>
  
  @use '../assets/scss/partials/extende' as *;
 


  .not-found {
    overflow: auto;
    width: 100vw;
    height: calc(100vh - 120px);
    
    .container {
        .image {
            margin: 30px auto 20px;
            width: 80%;
        }
    }
    .text {
        margin-left: 30px;
        margin-top: 60px;
        .link-404 {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 70px;
            background: $gradient;
            color: $text2;
            font-size: 20px;
            border-radius: 10px;
            @extend %shadow;
            &:hover {
                opacity: .85;
                @extend %shadow2;
            }
        }
    }
  }

  </style>