<template>
  <div id="contact" class="container">
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col-12 text-center">
            <p><h1 class="header-content-text header-font-size">КОНТАКТЫ</h1></p>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-sm-12 col-md-4 contacts-text-gray contacts-border-right contacts-text-family">
            ОФИС
          </div>
          <div class="col-sm-12 col-md-4 contacts-border-right contacts-text-family contacts-text-middle">
            <p>{{ this.contacts['office']['address'] }}</p>
            <template v-for="phone in contacts['office']['phone']">
              <p>{{ phone }}</p>
            </template>
            {{ this.contacts['office']['email'] }}
          </div>
          <div class="col-sm-12 col-md-4 contacts-text-family contacts-text-middle">
            <p>Режим работы:</p>
            <p class="contacts-text-large">{{ this.contacts['office']['mode'] }}</p>
            <p class="contacts-text-lightgray">{{ this.contacts['office']['day'] }}</p>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-12">
        <div class="col-12">
          <iframe src="https://yandex.ua/map-widget/v1/?um=constructor%3A183bfd8b7197dfcd3766f05a851a069af75269c3858bb42b2ae7bc4427e2953c&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
        </div>
      </div>
    </div>
    <hr>
    <div>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <p class="col-12 text-center contacts-text-spacing">ГРУППЫ В СОЦИАЛЬНЫХ СЕТЯХ</p>
          </div>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a :href="this.contacts['facebook']">
            <img v-bind:src=" url + '/image/facebook.png'" class="img-fluid content-img-padding" height="auto" width="80rem"/>
          </a>
          <a :href="this.contacts['vk']">
            <img v-bind:src=" url + '/image/vk.png'" class="img-fluid content-img-padding" height="auto" width="80rem"/>
          </a>
        </div>
      </div>
      <br><hr>
      <div>
        <div class="row">
          <div class="col-12">
            <p class="text-center contacts-text-spacing">НАШИ ПАРТНЕРЫ</p>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-10 offset-1">
            <div class="slider slick-margin-bottom">
              <div><img :src="url + '/image/slider/contacts-slider-1.png'" class="img-fluid" height="auto" width="200rem"/></div>
              <div><img :src="url + '/image/slider/contacts-slider-2.png'" class="img-fluid" height="auto" width="200rem"/></div>
              <div><img :src="url + '/image/slider/contacts-slider-3.png'" class="img-fluid" height="auto" width="200rem"/></div>
              <div><img :src="url + '/image/slider/contacts-slider-4.png'" class="img-fluid" height="auto" width="200rem"/></div>
              <div><img :src="url + '/image/slider/contacts-slider-5.png'" class="img-fluid" height="auto" width="200rem"/></div>
              <div><img :src="url + '/image/slider/contacts-slider-6.png'" class="img-fluid" height="auto" width="200rem"/></div>
              <div><img :src="url + '/image/slider/contacts-slider-7.png'" class="img-fluid" height="auto" width="200rem"/></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data: function () {
        return {
          url: WPData.siteurl,
          contacts: WPData.contacts
        }
      },
      mounted: function () {
        $('.slider').slick({
          dots: false,
          infinite: true,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
      }
    }
</script>
