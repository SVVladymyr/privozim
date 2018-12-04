<?php
/*
Template Name: Шаблон страницы manager
*/

get_header(); ?>
	    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3DD9Z4" height="0" width="0" style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

  <div>
    <header>
      <div class="row hidden-lg-down header-color header-height header-fixed">
        <template v-for="(phone, index) in contacts['office']['phone']">
          <template v-if="index == 0">
            <div class="col-2 header-margin-top">
              <img src="app_url + '/image/phone.png'" height="auto" width="15rem" class="img-fluid"/>
              <small class="text-white text-header-size">{{ phone }}</small>
            </div>
          </template>
          <template v-else>
            <div class="col-2 header-margin-top">
              <small class="text-white text-header-size">{{ phone }}</small>
            </div>
          </template>
        </template>
        <div class="col-2 header-margin-top">
          <img src="app_url + '/image/whatsapp-black.png'" height="auto" width="25rem" class="img-fluid"/>
          <img src="app_url + '/image/telegram-black.png'" height="auto" width="25rem" class="img-fluid"/>
          <img src="app_url + '/image/viber-black.png'" height="auto" width="22rem" class="img-fluid"/>
        </div>
        <div class="col-1 offset-1 header-margin-top">
          <a :href="contacts['vk']"><img :src="app_url + '/image/vk-black.png'" height="auto" width="25rem"/></a>
          <a :href="contacts['facebook']"><img :src="app_url + '/image/facebook-black.png'" height="auto" width="25rem"/></a>
        </div>
        <br>
      </div>
      <div class="row main-top-margin">
        <div class="col-md-4 col-12 offset-1">
          <div class="row">
            <div class="col-6">
              <a href="/">
                <img :src="app_url + '/image/logo.png'" class="img-fluid  header-margin-top" />
              </a>
            </div>
            <div class="col-5">
              <img :src="app_url + '/image/delivery.png'" class="img-fluid" />
            </div>
          </div>
        </div>
        <div class="col-md-6 col-12 search-margin-top"  @mouseleave="searchVisible=false">
          <div class="row">
            <div class="col-12 col-md-8 input-group reset-padding-left reset-padding-right" v-cloak>
              <input type="search" class="form-control border-green border-right-clear" placeholder="Введите категорию или название магазина" id="search" v-model="searchString">
              <span class="input-group-btn">
                  <button class="btn btn-secondary border-green border-left-clear" id="search-button" type="button" @click="searchString!=''?searchVisible=true:searchVisible=false">
                      <img :src="app_url + '/image/search.png'" height="auto" width="60%"/>
                  </button>
              </span>
            </div>
            <div class="col-12 col-md-3 text-center">
              <a href="/track" class="btn button-catalog btn-md">
                Отследить заказ
              </a>
            </div>
          </div>
          <div class="row" v-show="searchVisible" v-cloak>
            <div class="col-8 search-block">
              <div  v-if="filteredArticles.length > 0">
                <ul>
                  <li v-for="article in filteredArticles">
                    <a :href="article['url']">
                      <img :src="article['img-url']" />
                      <p>{{article.name}}</p>
                    </a>

                  </li>
                </ul>
              </div>
              <div v-else-if="searchString != ''">
                <p>Ничего не найдено</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 reset-margin reset-padding-left reset-padding-right">
          <nav class="navbar navbar-toggleable-lg navbar-light nav-color-green header-margin-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand hidden-button-menu nav-text text-white" href="javascript:void(0)">Меню</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-color-red nav-width">
                <li class="nav-item nav-color-green set-nav-left-padding">
                  <a class="nav-link nav-link-contacts text-white nav-text" href="/">Главная</a>
                </li>
                <li class="nav-item nav-color-green">
                  <router-link class="nav-link nav-link-contacts text-white nav-text" :to="{ name: 'catalog' }">Магазины</router-link>
                </li>
                <li class="nav-item nav-color-green">
                  <router-link class="nav-link nav-link-contacts text-white nav-text" :to="{ name: 'about/description' }">Вопросы и ответы</router-link>
                </li>
                <li class="nav-item nav-color-green">
                  <router-link class="nav-link text-white nav-text" :to="{ name: 'contact' }">Контакты</router-link>
                </li>
                <li class="nav-item header-color">
                  <a class="nav-link text-white nav-text nav-padding-left" href="javascript:void(0)" onclick="$('#modal').modal()">Калькулятор</a>
                </li>
                <li class="nav-item">
                  <router-link class="nav-link nav-link-contacts text-white nav-text" :to="{ name: 'order' }">Оформить заказ</router-link>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <br>
    </header>
    <main>
      <div>
        <router-view></router-view>
      </div>
    </main>
    <footer>
      <div class="row footer-color">
        <div class="col-sm-3 offset-1">
          <div class="row text-white justify-content-center">
            <p class="header-font">Контакты</p>
          </div>
          <div class="row footer-font justify-content-center">
            <p> {{ contacts['office']['address'] }} </p>
            <template v-for="phone in contacts['office']['phone']">
              <div class="w-100"></div>
              <p>{{ phone }}</p>
            </template>
          </div>
        </div>
        <div class="col-sm-3 offset-1">
          <div class="row text-white justify-content-center">
            <p class="header-font">Мессенджеры</p>
          </div>
          <div class="row">
            <div class="col text-center">
              <img :src="app_url + '/image/whatsapp-black.png'" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
              <img :src="app_url + '/image/telegram-black.png'" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
              <img :src="app_url + '/image/viber-black.png'" class="img-fluid" height="auto" width="35rem"/>
            </div>
          </div>
        </div>
        <div class="col-sm-3 offset-1">
          <div class="row text-white justify-content-center">
            <p class="header-font">Социальные сети</p>
          </div>
          <div class="row">
            <div class="col text-center">
              <a :href="contacts['facebook']">
                <img :src="app_url + '/image/facebook-black.png'" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
              </a>
              <a :href="contacts['vk']">
                <img :src="app_url + '/image/vk-black.png'" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
              </a>
            </div>
          </div>
        </div>
        <br>
      </div>
      <div class="row footer-color-bottom footer-font footer-top justify-content-center">
        <div id="date" class="col-sm-3 offset-1 text-center">
          &copy
          <!--
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script>
          -->
          Privozim.com
        </div>
        <div class="col-sm-3 offset-1 text-center">
          Все права защищены
        </div>
        <div class="col-sm-3 offset-1 text-center">
          Разработка сайта <a href="http://itgeen.com?utm_source=nash_sait&utm_medium=referral&utm_campaign=privozim" target="_blank" rel="nofollow">ITДжинн</a>
        </div>
      </div>
    </footer>
  </div>

<?php get_footer(); ?>