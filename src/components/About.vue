<template>
  <div class="container">
    <div class="row" id="about">
    <div class="col-12">
      <div class="row justify-content-center">
        <p class="col-12 header-text text-center contacts-text-spacing"  v-if="$router.currentRoute.path != '/about/orders' && $router.currentRoute.path != '/about/money'"><h1 v-if="$router.currentRoute.path != '/about/orders' && $router.currentRoute.path != '/about/money'">ВОПРОСЫ И ОТВЕТЫ</h1></p>
        <p class="col-12 header-text text-center contacts-text-spacing" v-if="$router.currentRoute.path == '/about/orders'"><h1 v-if="$router.currentRoute.path == '/about/orders'">Как заказать товар</h1></p>
        <p class="col-12 header-text text-center contacts-text-spacing" v-if="$router.currentRoute.path == '/about/money'"><h1 v-if="$router.currentRoute.path == '/about/money'">Как передать деньги</h1></p>
      </div>
      <br>
    </div>
    <div class="col-sm-12 col-md-4 reset-padding-right">
      <div class="list-group sidebar-border">
        <router-link to="/about/description" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          О нас
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
        <router-link to="/about/agreement" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          Пользовательское соглашение
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
        <router-link to="/about/offer" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          Договор оферты
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
        <router-link to="/about/prohibited" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          Товары, запрещенные к перемещению
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
        <router-link to="/about/vacancies" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          Вакансии
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
        <router-link to="/about/orders" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          Как сделать заказ
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
        <router-link to="/about/money" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
          Как передать деньги
          <div class="arrows-right">
            <div class="hidden-md-down">
              <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
            </div>
          </div>
        </router-link>
      </div>
      <br>
    </div>
    <div class="col-sm-12 col-md-8">
      <div class="about-content-styles" align="justify">
        <router-view></router-view>
      </div>
      <br>
    </div>
    <br>
  </div>
  </div>
</template>

<script>
  import {mapGetters} from 'vuex';
  export default {
    data: function () {
      return {
        url: WPData.siteurl,
      }
    },
    methods: {
      anchor_top: function(event, elem_id) {
        event.preventDefault();
        var top1 = $(elem_id).offset().top;
        $('body,html').animate({scrollTop: top1 - (top1*13/100)}, 1500);
      }
    },
    mounted: function() {
      this.$nextTick(function () {
        this.anchor_top(event, '#about');
      });
    }
  }
</script>

