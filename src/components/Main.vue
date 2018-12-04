<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-12 text-center">
              <p><h1 class="header-content-text header-font-size">ДОСТАВКА ИЗ ИНТЕРНЕТ МАГАЗИНОВ РОССИИ</h1></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="row"  @mouseleave="resetCategory">
          <!-- Sidebar -->
          <div class="col-12 col-md-4 dropdown">
            <a class="btn btn-secondary button-catalog text-white dropdown-toggle visible-button hidden-sm-up" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Список категорий
            </a>
            <h5 class="dropdown-header hidden-md-down text-header-dropdown text-center text-white header-sidebar-color header-sidebar">Категории товара</h5>
            <div class="col-12 sidebar-border dropdown-menu content-block-top reset-margin" id="list-category" aria-labelledby="dropdownMenuLink" v-cloak>
              <a href="javascript:void(0)" class="content-sidebar-font content-sidebar-height content-sidebar-border dropdown-item app-inline" v-for="item in this.category" @mouseover="setCategory(item.cat_ID)">
                <div class="row reset-margin">
                  <div class="col-6">
                    {{ item.cat_name }}
                  </div>
                  <div class="col-5 arrows-right inline">
                    <img class="img-fluid arrows-right" :src="app_url + '/image/arrows.png'" height="auto" width="10rem"/>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Main sidebar -->
          <!-- Carousel -->
          <div class="col-12 col-md-8" v-show="!visibleCategory">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-size" :src="app_url + '/image/slider/font1.jpg'" >
                  <div class="carousel-caption">
                    <button class="slide-button-style slide1-button-posit" @click="go_to()">
                      <img class="img-style img-slide1-button-style" :src="app_url + '/image/slider/button.png'">
                    </button>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-size" :src="app_url + '/image/slider/font2.jpg'">
                  <div class="carousel-caption">
                    <button class="slide-button-style slide2-button-posit" @click="go_to()">
                      <img class="img-style img-slide2-button-style" :src="app_url + '/image/slider/button.png'">
                    </button>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-size" :src="app_url + '/image/slider/font3.jpg'">
                  <div class="carousel-caption">
                    <button class="slide-button-style slide3-button-posit" @click="go_to()">
                      <img class="img-style img-slide3-button-style" :src="app_url + '/image/slider/button.png'">
                    </button>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-size" :src="app_url + '/image/slider/font4.jpg'" >
                  <div class="carousel-caption">
                    <button class="slide-button-style slide4-button-posit" @click="go_to()">
                      <img class="img-style img-slide4-button-style" :src="app_url + '/image/slider/button.png'">
                    </button>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-size" :src="app_url + '/image/slider/font5.jpg'" >
                  <div class="carousel-caption">
                    <button class="slide-button-style slide5-button-posit" @click="go_to()">
                      <img class="img-style img-slide5-button-style" :src="app_url + '/image/slider/button.png'">
                    </button>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <br>
              <div class="row">
                <div class="col-12"><h4 class="text-center header-calc-styles">Привозим</h4></div>
              </div>
              <div class="row">
                <div class="col-3">
                  <div class="row ">
                    <div class="col-12 text-center">
                      <img :src="app_url + '/image/cargo.png'" height="100%" width="40%">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 text-center order-text-styles">
                      Товары
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12 text-center">
                      <img :src="app_url + '/image/tires.png'" height="100%" width="40%">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 text-center order-text-styles">
                      Шины/Диски
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12 text-center">
                      <img :src="app_url + '/image/money.png'" height="100%" width="40%">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 text-center order-text-styles">
                      Деньги
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12 text-center">
                      <img :src="app_url + '/image/document.png'" height="100%" width="40%">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 text-center order-text-styles">
                      Документы
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Main sidebar content -->
          <div class="col-12 col-md-8 sidebar-border reset-padding-left" :style="background" v-show="visibleCategory">
            <div class="row set-padding-left">
              <div class="col-md-8 col-12">
                <br>
                <div class="row">
                  <template v-for="(item, index) in this.product">
                    <div class="col-6 col-md-3 search-margin-top" >
                      <a :href="item['url']" class="not-link-a" target="_blank">
                        <img :src="item['img-url']" height="auto" width="75rem" class="img-fluid"/>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 reset-padding-right search-margin-top">
                      <a :href="item['url']" class="not-link-a" target="_blank">
                        <p class="open-font top-offset-text">{{ item.name }}</p>
                      </a>
                    </div>
                  </template>
                </div>
              </div>
              <div class="col-4 hidden-md-down ">
              </div>
            </div>
          </div>
        </div>
        <hr>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="row justify-content-center">
              <p class="col-12 header-text text-center header-font-size">КАК ОФОРМИТЬ И ПОЛУЧИТЬ ЗАКАЗ</p>
            </div>
            <br class="hidden-sm-down">
            <br class="hidden-sm-down">
          </div>
          <div class="col-12">
            <div class="card-deck row">
              <div class="col-12 col-md-6 col-lg-3 card card-border card-margin-botton">
                <img class="card-img-top img-center img-top img-botton" :src="app_url + '/image/1.png'"  height="auto" width="75rem" alt="Шаг 1">
                <div class="card-body">
                  <div class="card-set-padding">
                    <h5 class="card-title text-right card-header-font">НАХОДИТЕ ТОВАР</h5>
                    <hr class="card-hr">
                  </div>
                  <ol class="card-font">
                    <li>Находите интересующий товар в интернет-магазине (Россия или Aliexpress)</li>
                    <li>Из адресной строки браузера, копируете ссылку на страницу (Ctrl+C) выбранного Вами товара (например, https://www.citilink.ru/<wbr>catalog/<wbr>mobile/<wbr>cell_phones/<wbr>1025725/)</li>
                  </ol>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 card card-border card-margin-botton">
                <img class="card-img-top img-center img-top img-botton" :src="app_url + '/image/2.png'"  height="auto" width="75rem" alt="Шаг 1">
                <div class="card-body">
                  <div class="card-set-padding">
                    <h5 class="card-title text-right card-header-font">ОФОРМЛЯЕТЕ ЗАКАЗ</h5>
                    <hr class="card-hr">
                  </div>
                  <ol class="card-font">
                    <li>Оформляете заказ на сайте vostok-exp.com, вставив в соответствующее поле ссылку на страницу с выбранным Вами товаром (Ctrl+V)</li>
                    <li>При необходимости, дополнительно указываете цвет, требуемый размер и прочие интересующие Вас параметры</li>
                    <li>Получаете сумму товара с доставкой и отправляете заказ</li>
                  </ol>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 card card-border card-margin-botton">
                <img class="card-img-top img-center img-top img-botton" :src="app_url + '/image/3.png'"  height="auto" width="75rem" alt="Шаг 1">
                <div class="card-body">
                  <div class="card-set-padding">
                    <h5 class="card-title text-right card-header-font">ОПЛАЧИВАЕТЕ ЗАКАЗ</h5>
                    <hr class="card-hr">
                  </div>
                  <ol class="card-font">
                    <li>Наш менеджер свяжется с Вами для уточнения заказа и получения оплаты</li>
                    <li>Оплачиваете заказ в нашем офисе</li>
                  </ol>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 card card-border card-margin-botton">
                <img class="card-img-top img-center img-top img-botton" :src="app_url + '/image/4.png'"  height="auto" width="75rem" alt="Шаг 1">
                <div class="card-body">
                  <div class="card-set-padding">
                    <h5 class="card-title text-right card-header-font">ПОЛУЧАЕТЕ ТОВАР</h5>
                    <hr class="card-hr">
                  </div>
                  <ol class="card-font">
                    <li>Менеджер уточняет удобное время доставки и мы доставляем заказ по Вашему адресу</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="row justify-content-center" v-if="view != 'contact' && view != 'about' && view != 'catalog' && view != 'order'">
              <div class="col-12  text-center">
                <router-link class="btn button-catalog btn-lg" :to="{ name: 'about/orders' }">КАК СДЕЛАТЬ ЗАКАЗ</router-link>
              </div>
            </div>
          </div>
        </div>
          <hr>
          <div class="row justify-content-center border-red">
            <div class="col text-center to-border text-danger card-font">
              <p><h1>Уважаемые клиенты!</h1></p>
              <p>
                Обращаем Ваше внимание на то, что если Вы выбрали интернет-магазин не из рекомендуемого списка на нашем сайте, то компания не несет ответственности за:
              <ul class="list-unstyled">
                <li>1. Отсутствие доставки заказанного Вами товара</li>
                <li>2. Поставку бракованного товара</li>
                <li>3. Несоответствие цвета, наличие полной комплектации и т.д.</li>
                <li>4. Другие возможные мошеннические действия интернет-магазинов.</li>
              </ul>
              </p>
            </div>
          </div>
          <hr>
        </div>
      <div class="row justify-content-center">
        <div class="col-12  text-center">
          <router-link class="btn button-catalog btn-lg" :to="{ name: 'order' }">ОФОРМИТЬ ЗАКАЗ</router-link>
        </div>
      </div>
      <br>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center set-background-statistics hidden-md-down">
        <div class="col-12  text-center">
          <br>
          <p class="text-center header-text header-font-size ellipse-header-color">ВЫПОЛНЕНО ЗАКАЗОВ ЗА НЕДЕЛЮ</p>
        </div>
        <div class="col-sm-3 text-center">
          <img :src="app_url + '/image/ellipse.png'" height="auto" width="250rem"/>
          <p class="ellipse-number" id="random-elect">0</p>
          <p class="ellipse-header">Электроника</p>
        </div>
        <div class="col-sm-3  text-center">
          <img :src="app_url + '/image/ellipse.png'" height="auto" width="250rem"/>
          <p class="ellipse-number" id="random-cloth">0</p>
          <p class="ellipse-header">Одежда</p>
        </div>
        <div class="col-sm-3  text-center">
          <img :src="app_url + '/image/ellipse.png'" height="auto" width="250rem"/>
          <p class="ellipse-number" id="random-furniture">0</p>
          <p class="ellipse-header">Мебель</p>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
    export default {
      props: ['url'],
      data: function () {
        return {
          visibleCategory: false,
          cat_id: 0,
          category: WPData.category,
          products: WPData.products,
          contacts: WPData.contacts,
          app_url: WPData.siteurl

        }
      },
      methods: {
        go_to: function () {
          this.$router.push({ name: 'order' });
        },
        resetCategory: function () {
          this.visibleCategory = false;
        },
        anchor_top: function(event, elem_id) {
          event.preventDefault();
          top1 = $(elem_id).offset().top;
          $('body,html').animate({scrollTop: top1 - (top1*13/100)}, 1500);
        },
        setCategory: function(catId) {
          this.visibleCategory = true;
          this.cat_id = catId;
        }
      },
      computed: {
        background: function () {
          var ratio = window.devicePixelRatio || 1;
          var w = screen.width * ratio;
          var h = screen.height * ratio;

          if(screen.width > 1025) {
            if(this.cat_id < 3)
              return "background: url(" + this.app_url  + "/image/store/img-full-3.png) right center no-repeat";
            return "background: url(" + this.app_url  + "/image/store/img-full-" + this.cat_id + ".png) right center no-repeat";
          } else {
            return "background: none";
          }
        },
        product: function() {
          if(this.cat_id == 0)
            return  this.products;
          else {
            var filterArr = this.products.filter(function(item, i) {
              if(item.category_id == this.cat_id)
                return true;
              else
                return false;
            }, this);
            return filterArr;
          }
        },
        filteredArticles: function () {
          var articles_array = this.products,
            searchString = this.searchString;

          if(!searchString){
            this.searchVisible = false;
            return '';
          }
          this.searchVisible = true;
          searchString = searchString.trim().toLowerCase();

          articles_array = articles_array.filter(function(item){
            if(item.name.toLowerCase().indexOf(searchString) !== -1){
              return true;
            } else {
              if(item.category_name.toLowerCase().indexOf(searchString) !== -1){
                return true;
              }
            }
          });

          // Возвращает массив с отфильтрованными данными.

          return articles_array;
        }
      }
    }
</script>
