<template>
  <div class="container">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-12 text-center">
                <p><h3>Благодарим</h3></p>
                <p><h4>Ваш заказ №{{ num_order }} принят в обработку</h4></p>
                <p><h4>Наш менеджер свяжется с Вами по телефону</h4></p>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
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
    <br>
    <div class="col-md-8 offset-md-3">
      <div class="row justify-content-center"  id="order">
        <p class="col-12"><h4>ОФОРМЛЕНИЕ ЗАКАЗА</h4>
      </div>
      <br>
    </div>
    <form @submit.prevent="sendOrder()" action="" class="col-md-8 offset-md-3">
      <div>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control order-input-styles" placeholder="ФИО получателя" required v-model="fio">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <input type="tel" class="form-control order-input-styles" placeholder="Телефон" required v-model="fenix">
          </div>
          <div class="col">
            <input type="email" class="form-control order-input-styles" placeholder="E-mail" v-model="email">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <input type="tel" class="form-control order-input-styles" placeholder="Телефон мессенджер" v-model="phone">
          </div>
          <div class="col">
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="option1" v-model="viber">
                <img v-bind:src=" url + '/image/viber.png'" height="auto" width="22rem" />
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="option2" v-model="telegram">
                <img v-bind:src=" url + '/image/telegram.png'" height="auto" width="25rem" /></label>
            </div>
            <div class="form-check form-check-inline disabled">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="option3" v-model="whatsapp">
                <img v-bind:src=" url + '/image/whatsapp.png'" height="auto" width="25rem"/></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 input-bottom calc-margin">
            <div class="row">
              <div class="col-6">
                <select required v-model="From" class="form-control order-input-styles order-select-height">
                  <option disabled value="">Откуда</option>
                  <option v-for="item in city" :value="item.id">
                    {{ item.city }}
                  </option>
                </select>
              </div>
              <div class="col-6">
                <select required v-model="To" class="form-control order-input-styles order-select-height">
                  <option disabled value="">Куда</option>
                  <option v-for="item in city" :value="item.id">
                    {{ item.city }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="col">
            <input type="text" class="form-control order-input-styles" placeholder="Адрес доставки" required v-model="address">
          </div>
        </div>
        <div class="row justify-content-center">
          <p class="col-12"><h5>ИНФОРМАЦИЯ О ЗАКАЗЕ</h5></p>
        </div>
        <div class="row justify-content-center text-center">
          <p class="col-12 order-text-styles">Пожалуйста заполните пункты, которые относятся к Вашему заказу.</p>
        </div>
        <div class="row justify-content-center border-red">
          <div class="col offset-1 text-center to-border text-danger card-font">
            <p class="text-danger-styles">
              При заказе товаров с малой стоимостью или весом, стоимость доставки уточняйте у менеджера по телефону либо через онлайн чат.<br>
              Всего можно заполнить до 10 заявок в одном заказе.
            </p>
          </div>
        </div>
        <br>
        <div class="row" v-for="(order, index) in orders">
          <div class="col-12 order-border-styles">
            <div class="row form-group">
              <label class="col-3 col-form-label order-text-header-styles">ЗАКАЗ {{ index + 1 }}:</label>
            </div>
            <div class="row form-group">
              <div class="col-12 col-md-9" v-if="order['type'] == 'cargo' || order['type'] == 'tire'">
                <div class="input-group">
                  <div class="input-group">
                    <input type="url" class="form-control order-input-styles" placeholder="Ссылка" required v-model="order['order']">
                  </div>
                  <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите ссылку на страницу с требуемым заказом" href="javascript:void(0)">?</span>
                </div>
              </div>
              <div class="col-5 offset-1 col-md-3 offset-md-0 align-self-center" v-if="order['type'] == 'cargo'">
                <input class="form-check-input align-self-center" type="checkbox" value="" id="personalThings" @click="personalThing(order['order'])?order['order']=personalThing(order['order']):order['order']=''">
                <label class="form-check-label small order-text-styles-small" for="personalThings">
                  Личные вещи
                </label>
              </div>
            </div>
            <div class=" row justify-content-center">
              <div class="col-2 offset-0 offset-md-1 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="cargo" v-model="order['type']">
                <label class="form-check-label order-text-styles-small reset-order-padding-left" for="inlineRadio1">Товары</label>
              </div>
              <div class="col-2 offset-1 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="tire" v-model="order['type']">
                <label class="form-check-label order-text-styles-small reset-order-padding-left" for="inlineRadio2">Шины/Диски</label>
              </div>
              <div class="col-3 col-md-2 offset-1 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="document" v-model="order['type']">
                <label class="form-check-label order-text-styles-small reset-order-padding-left" for="inlineRadio3">Документы</label>
              </div>
              <div class="col-2 offset-1 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="money" v-model="order['type']">
                <label class="form-check-label order-text-styles-small reset-order-padding-left" for="inlineRadio4">Деньги</label>
              </div>
              <div class="col-12">
                <br v-if="(order['type'] == 'cargo')||(order['type'] == 'money')">
                <div class="text-danger text-center" v-if="(order['type'] == 'cargo') || (order['type'] == 'tire')">
                    <router-link to="/about/orders" class="text-danger text-center">Как сделать заказ ?</router-link>
                </div>
                <div class="text-center" v-if="order['type'] == 'cargo'">
                  Введите ориентировачные параметры груза за единицу
                </div>
                <div class="text-center" v-if="order['type'] == 'money'">
                  <p class="text-center">
                    <router-link to="/about/money" class="text-danger">Как передать деньги ?</router-link>
                  </p>
                </div>
                <br>
              </div>
            </div>
            <div v-if="order['type'] == 'cargo'">
              <div class="row form-group">
                <label class="col-md-1 col-form-label small order-text-styles-small">Количество </label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" required v-model="order['amount']">
                      <span class="input-group-addon order-input-styles order-input-width">шт.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите количество" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <label class="col-md-1 col-form-label small order-text-styles-small">Вес </label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" required class="form-control order-input-styles" v-model="order['weight']">
                      <span class="input-group-addon order-input-styles order-input-width">кг.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите фактический вес (кг)" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <label class="col-md-1 col-form-label small order-text-styles-small">Цена за ед. </label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" required v-model="order['sum']">
                      <span class="input-group-addon order-input-styles order-input-width">руб.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите фактическую стоимость заказа" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-md-1 col-form-label small order-text-styles-small">Длина</label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" required class="form-control order-input-styles" v-model="order['len']">
                      <span class="input-group-addon order-input-styles order-input-width">см.</span>
                    </div>
                    <span class="order-box-hidden input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="" data-trigger="hover" data-placement="top" data-content="Введите длину (см)" href="javascript:void(0)"></span>
                  </div>
                </div>
                <label class="col-md-1 col-form-label small order-text-styles-small">Ширина</label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" required class="form-control order-input-styles" v-model="order['width']">
                      <span class="input-group-addon order-input-styles order-input-width">см.</span>
                    </div>
                    <span class="order-box-hidden input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите ширину (см)" href="javascript:void(0)"></span>
                  </div>
                </div>
                <label class="col-md-1 col-form-label small order-text-styles-small">Высота</label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" required class="form-control order-input-styles" v-model="order['height']">
                      <span class="input-group-addon order-input-styles order-input-width">см.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Если груз объемный, введите габариты (см)" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <div class="row order-text-styles">
                <div class="col-2 col-md-1 align-self-center col-form-label small order-text-styles-small">
                  Подъем на
                </div>
                <div class="col-6 col-md-3 align-self-right">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" min="0" value="0" v-model="order['floor_user']">
                      <span class="input-group-addon order-input-styles">этаж</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите номер  этажа, на который необходимо доставить заказ. Услуга платная, если суммарный фактический или объемный вес Вашего заказа более 30 кг и отсутствует грузовой лифт. Первый этаж – бесплатно." href="javascript:void(0)">?</span>
                  </div>
                </div>
                <div class="col-1 align-self-center align-bottom form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="order['pLift']">
                  <label class="form-check-label small order-text-styles-small" for="defaultCheck1">
                    Лифт
                  </label>
                </div>
                <div class="col-10 col-sm-3 offset-2 offset-sm-1 align-self-center align-bottom form-check" v-show="order['pLift']">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="order['lift']">
                  <label class="form-check-label small order-text-styles-small" for="defaultCheck1">
                    Грузовой лифт
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="col-10 col-sm-4 offset-2 offset-sm-1 align-self-center">
                  <div class="form-check input-group">
                    <input type="checkbox" class="form-check-input" id="check2" value="brittle" v-model="order['fragile']">
                    <label class="form-check-label small order-text-styles-small" for="check2">Хрупкий груз</label>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="«Хрупкий груз» доставляется с особой осторожностью, исключающей порчу содержимого" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row form-group">
                <div class="col-md-12">
                  <textarea class="form-control order-input-styles" v-model="order['description']" placeholder="Укажите дополнительную информацию по данному заказу (цвет, размер и т.д.)"></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-11 col-md-9 offset-1 offset-md-3">
                  <div class="form-check">
                    <p class="order-text-styles"><h4>Итого по Заказу {{ index + 1 }} :  {{ round10( Number(order['amount']) * (Number(order['sum']) + total_delivery(Number(order['len']), Number(order['width']), Number(order['height']), Number(order['weight'])) + total_expedition(Number(order['len']), Number(order['width']), Number(order['height']), Number(order['weight']), Number(order['sum'])) + insurance(Number(order['sum'])) + transfer_comission(Number(order['sum'])) + total_fragile(Number(order['fragile']))) + total_floor(Number(order['len']), Number(order['width']), Number(order['height']), Number(order['weight']), Number(order['floor_user']), order['lift'], order['pLift']), 0) }} руб. </h4></p>
                  </div>
                </div>
                <div class="col-11 col-md-9 offset-1 offset-md-3 description-total order-text-styles">
                  <h7>Включая:</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Сумма заказа: {{ round10(Number(order['sum']) * (Number(order['amount'])), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Доставка: {{ round10(Number(order['amount']) * (total_delivery(Number(order['len']), Number(order['width']), Number(order['height']), Number(order['weight'])) + total_expedition(Number(order['len']), Number(order['width']), Number(order['height']), Number(order['weight']), Number(order['sum']))), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Страховой сбор: {{ round10(insurance(Number(order['sum'])) * Number(order['amount']), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Комиссия за перевод денег: {{ round10(transfer_comission(Number(order['sum'])) * Number(order['amount']), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Хрупкий груз: {{ total_fragile(Number(order['fragile'])) * (Number(order['amount'])) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Подъем на этаж: {{ round10(total_floor(Number(order['len']), Number(order['width']), Number(order['height']), Number(order['weight']), Number(order['floor_user']), order['lift'], order['pLift']), 0)  }} р.</h7>
                </div>
              </div>
            </div>
            <div v-if="order['type'] == 'tire'">
              <div class="row form-group">
                <label class="col-md-1 col-form-label small order-text-styles-small">Количество </label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" required v-model="order['amount']">
                      <span class="input-group-addon order-input-styles order-input-width">шт.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите количество" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <label class="col-md-1 col-form-label small order-text-styles-small">Диаметр </label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <select v-model="order['selectTires']" class="form-control border-color-green" required>
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
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Выберите ориентировочный диаметр шины или диска" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <label class="col-md-1 col-form-label small order-text-styles-small">Сумма </label>
                <div class="col-md-3">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" required v-model="order['sum']">
                      <span class="input-group-addon order-input-styles order-input-width">руб.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите фактическую стоимость заказа" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <div class="row order-text-styles">
                <div class="col-2 col-md-1 align-self-center col-form-label small order-text-styles-small">
                  Подъем на
                </div>
                <div class="col-5 col-md-3 align-self-right">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" min="0" value="0" v-model="order['floor_user']">
                      <span class="input-group-addon order-input-styles">этаж</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите номер  этажа, на который необходимо доставить заказ. Услуга платная, если суммарный фактический или объемный вес Вашего заказа более 30 кг и отсутствует грузовой лифт. Первый этаж – бесплатно." href="javascript:void(0)">?</span>
                  </div>
                </div>
                <div class="col-1 offset-1 offset-sm-0 align-self-center align-bottom form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="order['pLift']">
                  <label class="form-check-label small order-text-styles-small" for="defaultCheck1">
                    Лифт
                  </label>
                </div>
                <div class="col-10 col-sm-3 offset-2 offset-sm-1 align-self-center align-bottom form-check" v-show="order['pLift']">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="order['lift']">
                  <label class="form-check-label small order-text-styles-small" for="defaultCheck1">
                    Грузовой лифт
                  </label>
                </div>
              </div>
              <br>
              <div class="row form-group">
                <div class="col-md-12">
                  <textarea class="form-control order-input-styles" v-model="order['description']" placeholder="Укажите дополнительную информацию по данному заказу (цвет, размер и т.д.)"></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-11 col-md-9 offset-1 offset-md-3">
                  <div class="form-check">
                    <p class="order-text-styles"><h4>Итого по Заказу {{ index + 1 }}:  {{ round10(Number(order['amount']) * Number(order['sum']) + Number(order['amount']) * total_tires(Number(order['amount']), Number(order['selectTires'])) + Number(order['amount']) * insurance(Number(order['sum'])) + Number(order['amount']) * transfer_comission(Number(order['sum'])) + total_floor_tires(Number(order['amount']), Number(order['floor_user']), order['lift'], order['pLift']), 0) }} руб. </h4></p>
                  </div>
                </div>
                <div class="col-11 col-md-9 offset-1 offset-md-3 description-total order-text-styles">
                  <h7>Включая:</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Сумма заказа: {{ round10(Number(order['amount']) * Number(order['sum']), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles" v-show="total_fragile != 0">
                  <h7>Доставка: {{ round10(Number(order['amount']) * total_tires(Number(order['amount']), Number(order['selectTires'])), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Страховой сбор: {{ round10(Number(order['amount']) * insurance(Number(order['sum'])), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Комиссия за перевод денег: {{ round10(Number(order['amount']) * transfer_comission(Number(order['sum'])), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Подъем на этаж: {{ round10(total_floor_tires(Number(order['amount']), Number(order['floor_user']), order['lift'], order['pLift']), 0)  }} р.</h7>
                </div>
              </div>
            </div>
            <div v-if="order['type'] == 'document'">
              <div class="row form-group">
                <div class="col-12">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="text" class="form-control order-input-styles" placeholder="ФИО отправителя" required v-model="order['fio_recip']">
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите ФИО отправителя" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-md-2 col-form-label small order-text-styles-small">Телефон отправителя </label>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="phone" class="form-control order-input-styles" required v-model="order['phone_recip']">
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите номер телефона отправителя" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <label class="col-md-2 col-form-label small order-text-styles-small">Оценочная стоимость</label>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" required v-model="order['sum']">
                      <span class="input-group-addon order-input-styles order-input-width">руб.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите отправляемую сумму" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row form-group">
                <div class="col-3 offset-3">
                  <input type="radio" id="copy" value="copy" v-model="order['copy']">
                  <label for="copy">Копия</label>
                </div>
                <div class="col">
                  <input type="radio" id="no-copy" value="original" v-model="order['copy']">
                  <label for="no-copy">Оригинал</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <textarea class="form-control order-input-styles" v-model="order['description']" placeholder="Укажите дополнительную информацию"></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-11 col-md-9 offset-1 offset-md-3">
                  <div class="form-check">
                    <p class="order-text-styles"><h4>Итого по Заказу {{ index + 1 }}:  {{ round10(insurance_documents(Number(order['sum']), order['fio_recip'], order['phone_recip'], order['passport']) + total_documents(order['copy']), 0) }} руб. </h4></p>
                  </div>
                </div>
                <div class="col-11 col-md-9 offset-1 offset-md-3 description-total order-text-styles">
                  <h7>Включая:</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles" v-show="total_fragile != 0">
                  <h7>Доставка: {{ round10(total_documents(order['copy']), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Страховой сбор: {{ round10(insurance_documents(Number(order['sum']), order['fio_recip'], order['phone_recip'], order['passport'])) }} р.</h7>
                </div>
              </div>
            </div>
            <div v-if="order['type'] == 'money'">
              <div class="row form-group">
                <div class="col-12">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="text" class="form-control order-input-styles" placeholder="ФИО отправителя" required v-model="order['fio_recip']">
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите ФИО отправителя" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <div class="col-12">
                  <br>
                  <div class="input-group">
                    <div class="input-group">
                      <input type="text" class="form-control order-input-styles" placeholder="Чем отправлено (наименование Банка, электронного кошелька)" required v-model="order['bank']">
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Укажите наименование Банка, электронного кошелька" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <div class="col-12">
                  <br>
                  <div class="input-group">
                    <div class="input-group">
                      <input type="text" class="form-control order-input-styles" placeholder="Номер платежной квитанции" required v-model="order['passport']">
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите номер платежной квитанции" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-md-2 col-form-label small order-text-styles-small">Телефон отправителя </label>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="phone" class="form-control order-input-styles" required v-model="order['phone_recip']">
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-toggle="popover" data-animation="false" data-trigger="hover" data-placement="top" data-content="Введите номер телефона отправителя" href="javascript:void(0)">?</span>
                  </div>
                </div>
                <label class="col-md-2 col-form-label small order-text-styles-small">Отправляемая сумма </label>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group">
                      <input type="number" class="form-control order-input-styles" required v-model="order['sum']">
                      <span class="input-group-addon order-input-styles order-input-width">руб.</span>
                    </div>
                    <span class="order-box input-group-text justify-content-start align-self-center" data-animation="false" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Введите отправляемую сумму" href="javascript:void(0)">?</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row form-group">
                <div class="col-md-12">
                  <textarea class="form-control order-input-styles" v-model="order['description']" placeholder="Укажите дополнительную информацию"></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-11 col-md-9 offset-1 offset-md-3">
                  <div class="form-check">
                    <p class="order-text-styles"><h4>Итого по Заказу {{ index + 1 }}:  {{ round10(Number(order['sum']) + total_money(Number(order['sum'])), 0) }} руб. </h4></p>
                  </div>
                </div>
                <div class="col-11 col-md-9 offset-1 offset-md-3 description-total order-text-styles">
                  <h7>Включая:</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles">
                  <h7>Сумма заказа: {{ round10(Number(order['sum']), 0) }} р.</h7>
                </div>
                <div class="col-10 col-md-8 offset-2 offset-md-4 description-total order-text-styles" v-show="total_fragile != 0">
                  <h7>Доставка: {{ round10(total_money(Number(order['sum'])), 0) }} р.</h7>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-11 offset-1">
            <div class="form-check">
              <input type="checkbox" required class="form-check-input" id="check2" v-model="agreement">
              <label class="form-check-label text-danger" for="check2">Отправляя заказ Вы ознакомились и согласились с <router-link to="/about/agreement"  class="text-danger" ><ins>Пользовательским соглашением</ins></router-link> и <router-link to="/about/offer"  class="text-danger" ><ins>Договором оферты</ins></router-link></label>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-12 col-md-6">
            <button type="button" class="btn btn-md button-add-styles button-shadow" @click="addOrder()"><p id="dobavit-zakaz" class="button-text-styles">+Добавить заказ</p></button>
          </div>
          <div class="col-12 col-md-6 align-self-center">
            <button type="submit" class="btn btn-md button-order-styles button-shadow"><p id="oformit-zakaz" class="button-text-styles">Оформить заказ</p></button>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="form-check">
              <p class="order-text-styles"><h4 class="text-warning" id="notification"></h4></p>
            </div>
        </div>
      <!--</div>-->
        <div class="row">
          <div class="col-11 col-md-9 offset-1 offset-md-3">
            <div class="form-check">
              <p class="order-text-styles"><h4>Всего к оплате: {{ total }} руб. </h4></p>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  </div>
</template>

<script>
    var $ = jQuery.noConflict();
    export default {
      data: function () {
        return {
          city: WPData.city,
          money: WPData.money,
          weight: WPData.weight,
          expedition: WPData.expedition,
          floor: WPData.floor,
          documents: WPData.documents,
          tires: WPData.tires,
          category: WPData.category,
          products: WPData.products,
          app_url: WPData.siteurl,
          url: WPData.siteurl,
          countOrders: 1,
          From: "",
          To: "",
          address: "",
          fio: "",
          phone: "",
          fenix: "",
          email: "",
          viber: false,
          telegram: false,
          whatsapp: false,
          orders: [
            {
              "order": "",
              "amount": "",
              "weight": "",
              "len": "",
              "height": "",
              "width": "",
              "sum": "",
              "description": "",
              "fragile": 0,
              "lift": 0,
              "pLift": 0,
              "floor_user": "",
              "type": "cargo",
              "selectTires": "",
              "fio_recip": "",
              "passport": "",
              "phone_recip": "",
              "bank": "",
              "copy": "",
              "delivery": "",
              "insurance": "",
              "fragile_sum": "",
              "floor": "",
              "transfer_commission": ""
            }
          ],
          agreement: false,
          sum: 0,
          visibleCategory: false,
          cat_id: 0,
          num_order: 0
        }
      },
      methods: {
        personalThing:function (order) {
          if($("#personalThings").is(':checked')) {
            return 'http://vostok-exp.com';
          } else {
            return '';
          }
        },
        addOrder: function () {
          this.countOrders++;
          if(this.countOrders < 11){
            this.orders.push(
              {
                "order": "",
                "amount": "",
                "weight": "",
                "len": "",
                "height": "",
                "width": "",
                "sum": "",
                "description": "",
                "fragile": 0,
                "lift": 0,
                "pLift": 0,
                "floor_user": "",
                "type": "cargo",
                "selectTires": "",
                "fio_recip": "",
                "passport": "",
                "phone_recip": "",
                "bank": "",
                "copy": "",
                "delivery": "",
                "insurance": "",
                "fragile_sum": "",
                "floor": "",
                "transfer_commission": ""
              }
            );
          }
        },
        sendOrder: function () {
          if(this.agreement){
            var jsonOrder = this.orders;

            var infoClient = {
              "address": this.address,
              "fio": this.fio,
              "phone": this.phone,
              "fenix": this.fenix,
              "email": this.email,
              "viber": this.viber,
              "telegram": this.telegram,
              "whatsapp": this.whatsapp,
              "from": this.From,
              "to": this.To
            };
            var data = {
              "action": "send_order",
              "order": jsonOrder,
              "info_client": infoClient,
              "total": this.total
            };
            this.agreement = false;
            var my = this;
            $.post(myajax.url, data, function(response)
            {
              my.num_order = response;
              my.$nextTick(function () {
                document.getElementById("notification").textContent = "Заказ успешно отправлен";
                $('#myModal').modal();
              });
              dataLayer.push({'event': 'zakaz'});
            }).fail(function() {
              document.getElementById("notification").textContent = "Ошибка отправления заказа";
            });
            this.orders.length = 0;
            this.orders = [
              {
                "order": "",
                "amount": "",
                "weight": "",
                "len": "",
                "height": "",
                "width": "",
                "sum": "",
                "description": "",
                "fragile": 0,
                "lift": 0,
                "pLift": 0,
                "floor_user": "",
                "type": "cargo",
                "selectTires": "",
                "fio_recip": "",
                "passport": "",
                "phone_recip": "",
                "bank": "",
                "copy": "",
                "delivery": "",
                "insurance": "",
                "fragile_sum": "",
                "floor": "",
                "transfer_commission": ""
              }
            ];
          }
        },
        insurance: function (cost) {
          if(Number(cost) != 0){
            if(Number(cost) * 0.005 < 20)
              return 20;
            else {
              return this.round10(Number(cost) * 0.005, 0);
            }
          } else {
            return 0;
          }
        },
        transfer_comission: function (cost) {
            return cost * 0.03;
        },
        total_weight: function (len, width_cargo, height, weight_client) {
          var total_weight = (len * width_cargo * height)/4000;
          if(total_weight < weight_client)
            total_weight = weight_client;

          if(total_weight > 150)
            total_weight = 150;

          if(total_weight < 1)
            total_weight = 1;

          return total_weight;
        },
        total_delivery: function (len, width, height, weight) {
          /*
           * Определяем стоимость транспортировки
           */
          var my = this;
          var total = 0;
          this.weight.forEach(function(item, i) {
            if((Number(item['destination']) == Number(my.selectedFrom())) && (Number(item['receive']) == Number(my.selectedTo())) && (Number(item['w_min']) < Number(my.total_weight(len, width, height, weight))) && (Number(item['w_max']) >= Number(my.total_weight(len, width, height, weight)))) {
              total = Number(item['price']);
            }
          });

          return total;
        },
        total_expedition: function (len, width, height, weight, cost) {
          /*
          * Определяем стоимость экспедирования
          */
          var my = this;
          var total = 0;
          var salary = 0;
          if(cost > 18000)
            salary = 18000;
          else
            salary = cost;
          this.expedition.forEach(function(item, i) {
            if((Number(item['m_min']) < Number(salary)) && (Number(item['m_max']) >= Number(salary)) && (Number(item['w_min']) < Number(my.total_weight(len, width, height, weight))) && (Number(item['w_max']) >= Number(my.total_weight(len, width, height, weight)))) {
              total = Number(item['price']);
            }
          });

          return total;
        },
        total_floor: function (len, width, height, weight, floor_user, lift, pLift) {
          var floor = 0;
          var my = this;
          var itog_weight = 0;
          if(this.total_weight(len, width, height, weight) > 100)
            itog_weight = 100;
          else
            itog_weight = this.total_weight(len, width, height, weight);

          this.floor.forEach(function(item, i) {
            if((Number(item['w_min']) < itog_weight) && (Number(item['w_max']) >= itog_weight)) {
              floor = Number(item['coef']);
            }
          });

          if((!lift || !pLift) && (floor_user > 0))
            return floor * (floor_user - 1);
          else
            return 0;
        },
        total_floor_tires: function (amount, floor_user, lift, pLift) {
          var floor = 0;
          var weight = 15 * amount;
          this.floor.forEach(function(item, i) {
            if((Number(item['w_min']) < weight) && (Number(item['w_max']) >= weight)) {
              floor = Number(item['coef']);
            }
          });
          if((!lift || !pLift) && (floor_user > 0))
            return floor * (floor_user - 1);
          else
            return 0;
        },
        total_fragile: function (fragile) {
          if(fragile)
            return 100;
          else
            return 0;
        },
        total_tires: function (amount, selectTires) {
          var my = this;
          var total = 0;
          this.tires.forEach(function(item, i) {
            if((Number(item['destination']) == Number(my.selectedFrom())) && (Number(item['receive']) == Number(my.selectedTo())) && (Number(item['tires_size'] == selectTires))) {
              total = Number(item['price']);
            }
          });

          return total;
        },
        total_documents: function (copy) {
          var my = this;
          var total = 0;
          this.documents.forEach(function(item, i) {
            if((Number(item['destination']) == Number(my.selectedFrom())) && (Number(item['receive']) == Number(my.selectedTo()))) {
              if(copy == "copy"){
                total = Number(item['copy']);
              } else {
                total = Number(item['original']);
              }
            }
          });

          return this.round10(total, 0);
        },
        total_money: function (cost) {

          return this.round10(cost * 3/100, 0);
        },
        insurance_documents: function (cost, fio, phone, passport) {
          if((Number(cost) != 0) || (fio!="" && phone!="" && passport != "")){
            if(Number(cost) < 2000)
              return 10;
            else {
              return this.round10(Number(cost) * 0.005, 0);
            }
          } else {
            return 0;
          }
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
        resetCategory: function () {
          this.visibleCategory = false;
        },
        anchor_top: function(event, elem_id) {
          event.preventDefault();
          var top1 = $(elem_id).offset().top;
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
        go_to: function () {
          this.$router.push({ name: 'order' });
        },
      },
      computed: {
        total: function () {
          var sumTotal = 0;
          var isSum = 0;
          for(var order in this.orders){
            if(this.orders[order].type == 'cargo') {
              this.orders[order].delivery = this.orders[order].amount * (this.total_delivery(Number(this.orders[order].len), Number(this.orders[order].width), Number(this.orders[order].height), Number(this.orders[order].weight)) + this.total_expedition(Number(this.orders[order].len), Number(this.orders[order].width), Number(this.orders[order].height), Number(this.orders[order].weight), Number(this.orders[order].sum)));
              this.orders[order].insurance = this.orders[order].amount * this.insurance(Number(this.orders[order].sum));
              this.orders[order].fragile_sum = this.orders[order].amount *  this.total_fragile(Number(this.orders[order].fragile));
              this.orders[order].floor = this.total_floor(Number(this.orders[order].len), Number(this.orders[order].width), Number(this.orders[order].height), Number(this.orders[order].weight), Number(this.orders[order].floor_user), this.orders[order].lift, this.orders[order].pLift);
              this.orders[order].transfer_commission = this.orders[order].amount * this.transfer_comission(Number(this.orders[order].sum));
              sumTotal = sumTotal + Number(this.orders[order].amount) * Number(this.orders[order].sum) + this.orders[order].delivery + this.orders[order].insurance + this.orders[order].transfer_commission + this.orders[order].fragile_sum + this.orders[order].floor;
              isSum = isSum + Number(this.orders[order].amount) * Number(this.orders[order].sum);

            } else if (this.orders[order].type == 'tire'){
              this.orders[order].delivery = this.orders[order].amount * this.total_tires(Number(this.orders[order].amount), Number(this.orders[order].selectTires));
              this.orders[order].insurance = this.orders[order].amount * this.insurance(Number(this.orders[order].sum));
              this.orders[order].transfer_commission = this.orders[order].amount * this.transfer_comission(Number(this.orders[order].sum));
              this.orders[order].floor = this.total_floor_tires(Number(this.orders[order].amount), Number(this.orders[order].floor_user), this.orders[order].lift, this.orders[order].pLift);
              sumTotal = sumTotal + Number(this.orders[order].amount) * Number(this.orders[order].sum) + this.orders[order].delivery + this.orders[order].insurance + this.orders[order].transfer_commission + this.orders[order].floor;
              isSum = isSum + Number(this.orders[order].amount) * Number(this.orders[order].sum);
            } else if(this.orders[order].type == 'document'){
              this.orders[order].delivery = this.total_documents(this.orders[order].copy);
              this.orders[order].insurance = this.insurance_documents(Number(this.orders[order].sum), this.orders[order].fio_recip, this.orders[order].phone_recip, this.orders[order].passport);
              sumTotal = sumTotal + this.orders[order].delivery + this.orders[order].insurance;
            } else {
              this.orders[order].insurance = this.total_money(Number(this.orders[order].sum));
              sumTotal = sumTotal + Number(this.orders[order].sum) + this.orders[order].insurance;
              isSum = isSum + Number(this.orders[order].sum);
            }

          }

          this.sum = this.round10(isSum, 0);
          return this.round10(sumTotal, 0);
        },
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
        },
      },
      mounted: function() {
        $(function () {
          $('[data-toggle="popover"]').popover();
        });
        this.$nextTick(function () {
           this.anchor_top(event, '#order');
        });
      },
      updated: function() {
        $(function () {
          $('[data-toggle="popover"]').popover();
        })
      }
    }
</script>
