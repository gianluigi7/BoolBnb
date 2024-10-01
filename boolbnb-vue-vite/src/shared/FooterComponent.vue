<script>
// import:
import { store } from '../store.js';

export default {
    nome: 'Footer',
    data() {
        return {
            store,

        }
    },
}

</script>



<template>
    <footer class="bg-footer">
        <div class="container">
            <div class="row">
                <div class="col col-xl-4 col-md-4 col-12">
                    <div class="logo-byhyons">
                        <a class="navbar-brand" href="#">
                            <div class="logo_boolbnb mt-5">


                                <!DOCTYPE svg
                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg width="40%" height="30%" viewBox="0 0 4000 1459" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                    style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                                    <g>
                                        <path
                                            d="M1066.52,396.369l0,665.167c0,134.087 -108.861,242.949 -242.949,242.949l-485.897,-0c-134.087,-0 -242.949,-108.862 -242.949,-242.949l-0,-665.167c-0,-134.087 108.862,-242.949 242.949,-242.949l485.897,0c134.088,0 242.949,108.862 242.949,242.949Z"
                                            style="fill:none;stroke:#00d9a6;stroke-width:37.5px;" />
                                        <path
                                            d="M401.636,809.954l0.592,-158.897l250.701,-0c55.849,-0 103.01,-46.348 103.01,-102.627l0,-14.346c0,-55.175 -47.161,-102.626 -103.01,-102.626l-249.963,-0l0.611,-171.045l282.861,0c150.172,0 251.942,92.695 251.942,229.531l-0,76.142c-0,59.59 -28.546,121.387 -74.466,163.32l1.241,0c60.814,39.727 86.877,101.524 86.877,163.32l-0,58.487c-0,156.699 -104.252,248.29 -251.942,248.29l-299.868,0l2.006,-173.251l263.112,-0c57.09,-0 104.251,-46.348 104.251,-103.731l0,-9.931c0,-56.28 -47.161,-102.627 -104.251,-102.627"
                                            style="fill:#00d9a6;" />
                                        <path
                                            d="M386.418,260.413l-5.362,939.09c-34.665,0 -95.452,-23.792 -124.22,-52.787c-28.769,-28.994 -48.389,-85.022 -48.389,-121.18l-0,-598.829c-0,-37.459 24.238,-88.805 53.9,-116.521c29.662,-27.716 85.59,-49.773 124.071,-49.773Z"
                                            style="fill:#00d9a6;" />
                                        <g transform="matrix(0.868493,0,0,1,-64.7444,0)">
                                            <g transform="matrix(823.376,0,0,823.376,4619.49,1073.99)">
                                            </g>
                                            <text x="1397.62px" y="1073.99px"
                                                style="font-family:'BMDoHyeon-OTF', 'BM Dohyeon', sans-serif;font-size:823.376px;fill:#00d9a6;">boolbnb</text>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>

                        <div class="credits">
                            <p class="mt-3"> <span class="headline">Boolbnb</span> <br>
                                Team 3 <br>
                                <small>ITALY</small>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-md-6 col-12 align">
                    <p class="mt-5"> <span class="headline">Menu di Navigazione:</span> </p>
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>

                </div> -->
                <div class="col-xl-4 col-md-4 col-12 align mt-7">
                    <!-- <p class="mt-5"> <span class="headline">Autenticazione:</span> </p> -->
                    <ul class="mt-5 pt-5">
                        <li><a target="_blank" href="http://localhost:8000/register"><p class="registrati m-0">Registrati</p></a>  </li>
                        <li><a target="_blank" href="http://localhost:8000/login"><p class="accedi m-0">Accedi</p></a> </li>
                        
                    </ul>

                </div>
                <div class="col-xl-4 col-md-4 col-12 align">
                    <p class="mt-5"> <span class="headline">Saguimi Su:</span> </p>
                    <ul class="d-flex seguimi-su">
                        <li class="contenitore-bianco"><div class="icona-social"><font-awesome-icon :icon="['fab', 'github']" /></div></li>
                        <li class="contenitore-bianco"><div class="icona-social"><font-awesome-icon :icon="['fab', 'instagram']" /></div></li>
                        <li class="contenitore-bianco"><div class="icona-social"><font-awesome-icon :icon="['fab', 'twitter']" /></div></li>
                        <li class="contenitore-bianco"><div class="icona-social"><font-awesome-icon :icon="['fab', 'facebook']" /></div></li>
                        
                    </ul>
                    <div class="instagram logo-social">
                        <a href="#" target="_blank">

                        </a>
                    </div>
                    <div class="github logo-social">
                        <a href="#" target="_blank">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>



<style lang="scss" scoped>
// import
@use '../assets/scss/partials/variables' as *;

footer {
    min-height: 300px;
    text-align: center;
    

    ul {
        padding: 0;
        color:white;
        
        
        
    }

    a {
        text-decoration: none;
    }

    li {
        list-style-type: none;
        margin: 0 6px;
    }
    .logo-byhyons {

        svg {
            width: 180px;
            margin-left: -10px;
            filter: drop-shadow(5px 5px 5px rgba(86, 83, 83, 0.2));
            transition: .3s;
    
            &:hover {
                transform: scale(1.05);
            }
        }
    }

    .headline {
        font-weight: 600;
        font-size: 18PX;
    }
    

    .footer-link,
    a {
        padding: 0;
        font-size: 18px;
        color: $text2;

        &:hover {
            font-weight: 600;
        }
    }

    .align {
        margin-top: 30px;
    }

    p {
        font-size: 15px;
        color: $text2;
    }

    .logo-social {
        transition: .3s;

        img {
            filter: invert(100);
        }

        &:hover {
            transform: scale(1.05);
        }
    }

    .seguimi-su{
        max-width: 220px;
        margin: 0 auto;
    }
    .contenitore-bianco {
        width: 40px;
        height: 40px;
        display:flex;
        background-color: white;
        
    }
    .icona-social {
        display: block;
        background-color: $footer;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: none;
        margin:auto;
        line-height: 36px;
        font-size: 18px;
    }
}

@media (max-width: 1200px) {

    footer {
        .container {
            .row {
                padding: 30px;

                .col-12 {
                    text-align: center;
                    margin-bottom: 50px;

                    .logo-social {
                        width: 30%;
                        margin: 0 auto;
                    }
                }
            }

        }
    }

}

@media (max-width: 767px) {

    footer {
        .container {
            .row {
                .col-12 {
                    margin-top: 50px;
                    text-align: center;
                    margin-bottom: 80px;

                    .logo-social {
                        width: 30%;
                        margin: 0 auto;
                    }
                }
            }

        }
    }

}
</style>