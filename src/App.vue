<template>
  <div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content row">
          <div>
            <div class="col-12 text-center">
              <br>
              <h4 class="header-calc-styles">КАЛЬКУЛЯТОР РАСЧЕТА ДОСТАВКИ</h4>
              <br>
            </div>
            <div class="col-12">
              <div class="row order-text-styles">
                <div class="btn-group btn-group-toggle col-12 reset-padding-left-right" data-toggle="buttons">
                  <label class="btn btn-secondary col-md-3 active calc-margin-bottom-reset" @click="picked = 'cargo'">
                    <input type="radio" id="cargo" name="options" autocomplete="off" value="cargo">
                    <img :src="app_url + '/image/box.png'" class="calc-image-size" />Товары
                  </label>
                  <label class="btn btn-secondary col-md-3 calc-margin-bottom-reset" @click="picked = 'tires'">
                    <input type="radio" id="tires" value="tires" autocomplete="off">
                    <img :src="app_url + '/image/box-1.png'" class="calc-image-size" />Шины/Диски
                  </label>
                  <label class="btn btn-secondary col-md-3 calc-margin-bottom-reset" @click="picked = 'document'">
                    <input type="radio" id="tires" value="document" autocomplete="off">
                    <img :src="app_url + '/image/box-2.png'" class="calc-image-size" />Документы
                  </label>
                  <label class="btn btn-secondary col-md-3 calc-margin-bottom-reset" @click="picked = 'money'">
                    <input type="radio" id="tires" value="money" autocomplete="off">
                    <img :src="app_url + '/image/box-3.png'" class="calc-image-size" />Деньги
                  </label>
                </div>
                <br>
              </div>
            </div>
            <div class="col-12 input-bottom background-top calc-margin">
              <div class="row">
                <div class="col-4 offset-1">
                  <select v-model="From" class="form-control border-green">
                    <option disabled value="">Откуда</option>
                    <option v-for="item in city" :value="item.id">
                      {{ item.city }}
                    </option>
                  </select>
                </div>
                <div class="col-4 offset-1">
                  <select v-model="To" class="form-control border-green">
                    <option disabled value="">Куда</option>
                    <option v-for="item in city" :value="item.id">
                      {{ item.city }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="col-12">
            <div class="row" v-if="picked == 'cargo'">
              <div class="col-12">
                <div class="row order-text-styles">
                  <div class="col-4 offset-1">
                    <label class="input-group-text" fot="amount">Количество:</label>
                    <div class="input-group border-green">
                      <input type="number" min="0" id="amount" class="form-control border-green" v-model="amount">
                      <span class="input-group-addon border-green">ед</span>
                    </div>
                  </div>
                  <div class="col-4 offset-1">
                    <label class="input-group-text" for="cost">Стоимость груза</label>
                    <div class="input-group border-green">
                      <input type="number" class="form-control border-green" id="cost" min="0"  v-model="cost">
                      <span class="input-group-addon border-green">рублей</span>
                    </div>
                  </div>
                </div>
                <br>
              </div>
              <div class="col-12">
                <div class="row order-text-styles align-self-center">
                  <div class="col-4 offset-1">
                    <label class="input-group-text" for="length">Длина:</label>
                    <div class="input-group border-green">
                      <input type="number" min="0.00" step="any" placeholder="Длина, см" id="length" class="form-control border-green" v-model="len">
                      <span class="input-group-addon border-green">см</span>
                    </div>
                  </div>
                  <div class="col-4 offset-1">
                    <label class="input-group-text" for="width">Ширина:</label>
                    <div class="input-group border-green">
                      <input type="number" min="0.00" step="any" placeholder="Ширина, см" id="width" class="form-control border-green" v-model="width_cargo">
                      <span class="input-group-addon border-green">см</span>
                    </div>
                  </div>
                </div>
                <div class="row order-text-styles">
                  <div class="col-4 offset-1">
                    <label class="input-group-text" for="height">Высота:</label>
                    <div class="input-group border-green">
                      <input type="number" min="0.00" step="any" placeholder="Высота, см" id="height" class="form-control border-green" v-model="height">
                      <span class="input-group-addon border-green">см</span>
                    </div>
                  </div>
                  <div class="col-4 offset-1">
                    <label class="input-group-text" for="weight">Вес:</label>
                    <div class="input-group border-green">
                      <input type="number" min="0.00" max="100.00" step="any" placeholder="Вес, кг" id="weight" class="form-control border-green" v-model="weight_client">
                      <span class="input-group-addon border-green">кг</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <br>
                <div class="row order-text-styles">
                  <div class="col-4 offset-3 align-self-center">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="check2" value="brittle" v-model="fragile">
                      <label class="form-check-label" for="check2">Хрупкий груз</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <br>
                <div class="row order-text-styles">
                  <div class="col-2 offset-1 align-self-center">
                    Подъем на
                  </div>
                  <div class="col-4  col-sm-2 align-self-center">
                    <input type="number"  class="form-control border-green" min="0" value="0" v-model="floor_user">
                  </div>
                  <div class="col-1 align-self-center text-left">
                    этаж
                  </div>
                  <div class="col-1 offset-1 offset-sm-0 align-self-center align-bottom form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="pLift">
                    <label class="form-check-label" for="defaultCheck1">
                      Лифт
                    </label>
                  </div>
                  <div class="col-8 col-sm-3 offset-3 offset-sm-1 align-self-center align-bottom form-check" v-show="pLift">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="lift">
                    <label class="form-check-label" for="defaultCheck1">
                      Грузовой лифт
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-12 justify-content-center text-center">
                    <br>
                    <button class="btn btn-primary button-calc-styles" @click="total">Рассчитать</button>
                    <hr>
                  </div>
                </div>
                <div class="row background-green" v-show="visible">
                  <div class="col-10 offset-2">
                    <div class="row">
                      <div class="col-12">
                        Всего: {{ amount * total_delivery + amount * total_expedition + amount * insurance + amount * total_fragile + total_floor  + amount * transfer_comission}} р.
                      </div>
                      <div class="col-12 description-total">
                        Включая:
                      </div>
                      <div class="col-11 offset-1 description-total">
                        Страховой сбор: {{ amount * insurance }} р.
                      </div>
                      <div class="col-11 offset-1 description-total">
                        Комиссия за перевод денег: {{ amount * transfer_comission }} р.
                      </div>
                      <div class="col-11 offset-1 description-total" v-show="total_fragile != 0">
                        Хрупкий груз: {{ amount * total_fragile }} р.
                      </div>
                      <div class="col-11 offset-1 description-total" v-show="total_floor != 0">
                        Подъем на этаж: {{ total_floor  }} р.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row order-text-styles" v-if="picked == 'tires'">
              <div class="col-12">
                <div class="row order-text-styles">
                  <div class="col-2 offset-1 align-self-center">
                    <label class="input-group-text" for="id-money">Стоимость груза</label>
                  </div>
                  <div class="col-6 content-margin-left">
                    <div class="input-group border-green">
                      <input type="number" class="form-control border-green" id="id-money" min="0.00" step="any" v-model="cost">
                      <span class="input-group-addon border-green">рублей</span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row order-text-styles">
                  <div class="col-3 offset-1 align-self-center">
                    <label class="input-group-text" for="id-money">Выберите диаметр:</label>
                  </div>
                  <div class="col-3 content-margin-left">
                    <select v-model="selectTires" class="form-control border-green" required>
                      <option value="14">
                        < R14
                      </option>
                      <option value="16">
                        < R16
                      </option>
                      <option value="18">
                        < R18
                      </option>
                      <option value="19">
                        > R18
                      </option>
                    </select>
                  </div>
                </div>
                <br>
              </div>
              <div class="col-3 offset-1">
                <label class="input-group-text" for="weight">Количество:</label>
              </div>
              <div class="col-3">
                <div class="input-group border-green">
                  <input type="number" min="0" id="amount" class="form-control border-green" v-model="amount">
                  <span class="input-group-addon border-green">ед</span>
                </div>
              </div>
              <div class="col-12">
                <br>
                <div class="row order-text-styles">
                  <div class="col-2 offset-1 align-self-center">
                    Подъем на
                  </div>
                  <div class="col-3">
                    <input type="number"  class="form-control border-green" min="0" value="0" v-model="floor_user">
                  </div>
                  <div class="col-1 align-self-center">
                    этаж
                  </div>
                  <div class="col-8 offset-4 col-sm-1 offset-sm-0 align-self-center align-bottom form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="pLift">
                    <label class="form-check-label" for="defaultCheck1">
                      Лифт
                    </label>
                  </div>
                  <div class="col-8 offset-4" v-show="pLift">
                    <div class="form-check">
                      <br>
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="lift">
                      <label class="form-check-label" for="defaultCheck1">
                        Грузовой лифт
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-12 justify-content-center text-center">
                    <br>
                    <button class="btn btn-primary button-calc-styles" @click="totalTires">Рассчитать</button>
                    <hr>
                  </div>
                </div>
                <div class="row background-green" v-show="visible">
                  <div class="col-10 offset-2">
                    <div class="row">
                      <div class="col-12">
                        Всего: {{ amount * total_tires + amount * insurance + total_floor_tires + amount * transfer_comission}} р.
                      </div>
                      <div class="col-12 description-total">
                        Включая:
                      </div>
                      <div class="col-11 offset-1 description-total">
                        Страховой сбор: {{ amount * insurance }} р.
                      </div>
                      <div class="col-11 offset-1 description-total">
                        Комиссия за перевод денег: {{ amount * transfer_comission }} р.
                      </div>
                      <div class="col-11 offset-1 description-total" v-show="total_floor_tires != 0">
                        Подъем на этаж: {{ total_floor_tires }} р.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row order-text-styles" v-if="picked == 'document'">
              <div class="col-12">
                <br>
                <div class="row">
                  <div class="col-3 offset-3">
                    <input type="radio" id="copy" value="copy" v-model="copy">
                    <label for="copy">Копия</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="no-copy" value="original" v-model="copy">
                    <label for="no-copy">Оригинал</label>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3 offset-1">
                    <label class="input-group-text" for="id_money">Оценочная стоимость</label>
                  </div>
                  <div class="col-5">
                    <div class="input-group border-green">
                      <input type="number" class="form-control border-green" id="id_money" min="0.00" step="any" v-model="cost">
                      <span class="input-group-addon border-green">рублей</span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-12 justify-content-center text-center">
                        <br>
                        <button class="btn btn-primary button-calc-styles" @click="totalDocuments">Рассчитать</button>
                        <hr>
                      </div>
                    </div>
                    <div class="row background-green" v-show="visible">
                      <div class="col-10 offset-2">
                        <div class="row">
                          <div class="col-12">
                            Всего: {{ insurance_documents + total_documents }} р.
                          </div>
                          <div class="col-12 description-total">
                            Включая:
                          </div>
                          <div class="col-11 offset-1 description-total">
                            Страховой сбор: {{ insurance_documents }} р.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row order-text-styles" v-if="picked == 'money'">
              <div class="col-12">
                <div class="row">
                  <div class="col-2 offset-2 align-self-center">
                    <label class="input-group-text" for="id_money">Сумма</label>
                  </div>
                  <div class="col-5">
                    <div class="input-group border-green">
                      <input type="number" class="form-control border-green" id="id_money" min="0.00" step="any" v-model="cost">
                      <span class="input-group-addon border-green">рублей</span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12 justify-content-center text-center">
                    <br>
                    <button class="btn btn-primary button-calc-styles" @click="totalDocuments">Рассчитать</button>
                    <hr>
                  </div>
                  <div class="col-12 background-green" v-show="visible">
                    <div class="row">
                      <div class="col-10 offset-2">
                        <div class="row">
                          <div class="col-12">
                            Всего: {{ total_money }} р.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <header>
      <div class="row hidden-lg-down header-color header-height header-fixed">
        <template v-for="(phone, index) in contacts['office']['phone']">
          <template v-if="index == 0">
            <div class="col-2 header-margin-top">
              <img :src="app_url + '/image/phone.png'" height="auto" width="15rem" class="img-fluid"/>
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
          <img :src="app_url + '/image/whatsapp-black.png'" height="auto" width="25rem" class="img-fluid"/>
          <img :src="app_url + '/image/telegram-black.png'" height="auto" width="25rem" class="img-fluid"/>
          <img :src="app_url + '/image/viber-black.png'" height="auto" width="22rem" class="img-fluid"/>
        </div>
        <div class="col-1 offset-1 header-margin-top">
          <a :href="contacts['vk']"><img :src="app_url + '/image/vk-black.png'" height="auto" width="25rem"/></a>
          <a :href="contacts['facebook']"><img :src="app_url + '/image/facebook-black.png'" height="auto" width="25rem"/></a>
        </div>
        <br>
      </div>
      <div class="row main-top-margin">
        <div class="col-md-5 col-12">
          <div class="row">
            <div class="col-7">
              <a href="/">
                <img :src="app_url + '/image/logo.png'" class="img-fluid  header-margin-top header-margin-top-logo" />
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
          ООО "Восток-Экспрес"
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
</template>

<script>
  export default {
    data: function () {
      return {
        view: 'slider',
        trigger: true,
        picked: 'cargo',
        From: '',
        To: '',
        cost: '',
        options: [],
        len: '',
        width_cargo: '',
        height: '',
        weight_client: '',
        copy: "copy",
        category: WPData.category,
        products: WPData.products,
        contacts: WPData.contacts,
        about: WPData.about,
        city: WPData.city,
        money: WPData.money,
        weight: WPData.weight,
        expedition: WPData.expedition,
        floor: WPData.floor,
        documents: WPData.documents,
        stores: WPData.stores,
        tires: WPData.tires,
        floor_user: '',
        cat_id: 0,
        searchString: '',
        searchVisible: false,
        COD: 0,
        fragile: 0,
        lift: 0,
        visible: false,
        selectTires: '',
        pLift: false,
        amount: '',
        page: 'description',
        app_url: WPData.siteurl
      }
    },
    methods: {
      anchor_top: function(event, elem_id) {
        event.preventDefault();
        top1 = $(elem_id).offset().top;
        $('body,html').animate({scrollTop: top1 - (top1*13/100)}, 1500);
      },
      toggle: function (message) {
        this.view = message;
        $('.slider').slick('slickNext');
        $('.navbar-nav>li>a').on('click', function(){
          $('.navbar-collapse').collapse('hide');
        });
        this.$nextTick(function () {
          if (message == "order") {
            this.anchor_top(event, '#order');
          }
          if (message == "catalog") {
            this.anchor_top(event, '#catalog');
          }
          if (message == "contact") {
            this.anchor_top(event, '#contact');
          }
          if (message == "about") {
            this.anchor_top(event, '#about');
          }
        });

      },
      setCategory: function(catId) {
        this.visibleCategory = true;
        this.cat_id = catId;
      },
      resetCategory: function () {
        this.visibleCategory = false;
      },
      total: function () {

        if(!this.weight_client) {
          alert("Укажите вес груза");
          return false;
        }
        if(this.weight_client > 100) {
          alert("Вес груза не может быть более 100 кг.");
          return false;
        }
        if(!this.selectedFrom) {
          alert("Укажите город отправления");
          return false;
        }
        if(!this.selectedTo) {
          alert("Укажите город назначения");
          return false;
        }
        if(!this.cost) {
          alert("Укажите оценочную стоимость");
          return false;
        }

        this.visible = true;
      },
      totalDocuments: function () {
        if(!this.selectedFrom) {
          alert("Укажите город отправления");
          return false;
        }
        if(!this.selectedTo) {
          alert("Укажите город назначения");
          return false;
        }
        if(!this.cost) {
          alert("Укажите оценочную стоимость");
          return false;
        }

        this.visible = true;
      },
      totalMoney: function () {
        if(!this.selectedFrom) {
          alert("Укажите город отправления");
          return false;
        }
        if(!this.selectedTo) {
          alert("Укажите город назначения");
          return false;
        }
        if(!this.cost) {
          alert("Укажите оценочную стоимость");
          return false;
        }

        this.visible = true;
      },
      totalTires: function () {
        if(!this.selectedFrom) {
          alert("Укажите город отправления");
          return false;
        }
        if(!this.selectedTo) {
          alert("Укажите город назначения");
          return false;
        }
        if(!this.cost) {
          alert("Укажите оценочную стоимость");
          return false;
        }
        if(!this.selectTires) {
          alert("Укажите диаметр");
          return false;
        }

        this.visible = true;
      },
      decimalAdjust: function (type, value, exp) {
        // Если степень не определена, либо равна нулю...
        if (typeof exp === 'undefined' || +exp === 0) {
          return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Если значение не является числом, либо степень не является целым числом...

        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
          return NaN;
        }

        // Сдвиг разрядов
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));

        // Обратный сдвиг
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
      },
      round10: function (value, exp) {
        return this.decimalAdjust('round', value, exp);
      }
    },
    computed: {
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
      },
      total_floor: function () {
        var floor = 0;
        var my = this;
        var itog_weight = 0;
        itog_weight = this.total_weight;
        if(this.total_weight > 100)
          itog_weight = 100;
        else
          itog_weight = this.total_weight;

        this.floor.forEach(function(item, i) {
          if((Number(item['w_min']) < itog_weight) && (Number(item['w_max']) >= itog_weight)) {
            floor = Number(item['coef']);
          }
        });
        if((!this.lift || !this.pLift) && (this.floor_user > 0))
          return floor * (this.floor_user - 1);
        else
          return 0;
      },
      total_floor_tires: function () {
        var floor = 0;
        var weight = 15 * this.amount;
        this.floor.forEach(function(item, i) {
          if((Number(item['w_min']) < weight) && (Number(item['w_max']) >= weight)) {
            floor = Number(item['coef']);
          }
        });
        if((!this.lift || !this.pLift) && (this.floor_user > 0))
          return floor * (this.floor_user - 1);
        else
          return 0;
      },
      insurance: function () {
        if(this.cost * 0.005 < 20)
          return 20;
        else {
          return this.round10(this.cost * 0.005, 0);
        }
      },
      insurance_documents: function () {
        if(this.cost < 2000)
          return 10;
        else {
          return this.round10(this.cost * 0.005, 0);
        }
      },
      total_fragile: function () {
        if(this.fragile)
          return 100;
        else
          return 0;
      },
      total_weight: function () {
        var total_weight = (this.len * this.width_cargo * this.height)/4000;
        if(total_weight < this.weight_client)
          total_weight = this.weight_client;

        if(total_weight > 150)
          total_weight = 150;

        return total_weight;
      },
      total_delivery: function () {
        /*
         * Определяем стоимость транспортировки
         */
        var my = this;
        var total = 0;
        this.weight.forEach(function(item, i) {
          if((Number(item['destination']) == Number(my.selectedFrom)) && (Number(item['receive']) == Number(my.selectedTo)) && (Number(item['w_min']) < Number(my.total_weight)) && (Number(item['w_max']) >= Number(my.total_weight))) {
            total = Number(item['price']);
          }
        });

        return total;
      },
      total_expedition: function () {
        /*
        * Определяем стоимость экспедирования
        */
        var my = this;
        var total = 0;
        var salary = 0;
        if(this.cost > 18000)
          salary = 18000;
        else
          salary = this.cost;
        this.expedition.forEach(function(item, i) {
          if((Number(item['m_min']) < Number(salary)) && (Number(item['m_max']) >= Number(salary)) && (Number(item['w_min']) < Number(my.total_weight)) && (Number(item['w_max']) >= Number(my.total_weight))) {
            total = Number(item['price']);
          }
        });

        return total;
      },
      total_documents: function () {
        var my = this;
        var total = 0;
        this.documents.forEach(function(item, i) {
          if((Number(item['destination']) == Number(my.selectedFrom)) && (Number(item['receive']) == Number(my.selectedTo))) {
            if(my.copy == "copy"){
              total = Number(item['copy']);
            } else {
              total = Number(item['original']);
            }
          }
        });

        return this.round10(total, 0);
      },
      total_money: function () {

        return this.round10(this.cost * 3/100, 0);
      },
      total_tires: function () {
        var my = this;
        var total = 0;
        this.tires.forEach(function(item, i) {
          if((Number(item['destination']) == Number(my.selectedFrom)) && (Number(item['receive']) == Number(my.selectedTo)) && (Number(item['tires_size'] == my.selectTires))) {
            total = Number(item['price']);
          }
        });

        return this.round10(total, 0);
      },
      selectedFrom: function () {
        var zona = 0;
        var my = this;
        if(this.From != '') {
          this.city.forEach(function(item, i) {
            if(Number(item['id']) == Number(my.From))
              zona = Number(item['city_zona']);
          });
        }

        return zona;
      },
      selectedTo: function () {
        var zona = 0;
        var my = this;
        if(this.To != '') {
          this.city.forEach(function(item, i) {
            if(Number(item['id']) == Number(my.To))
              zona = Number(item['city_zona']);
          });
        }

        return zona;
      },
      transfer_comission: function () {
        return this.cost * 0.03;
      }
    },
    mounted: function () {
        document.getElementById("date").innerHTML = '&copy' + new Date().getFullYear();
    }
  }
</script>
