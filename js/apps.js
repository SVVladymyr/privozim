var $ = jQuery.noConflict();

// Определение используемых компонентов
const About = {
    props: ['url', 'about'],
    data: function () {
        return {
            aboutLabel: 'agreement'
        }
    },
    methods:{
        setAbout: function (label) {
            this.aboutLabel = label;
        }
    },
    template: `
        <div class="row">
               <div class="col-12">
                   <div class="row justify-content-center">
                       <p class="col-12 header-text text-center contacts-text-spacing">О НАС</p>
                   </div>
                   <br>
               </div>
               <div class="col-sm-12 col-md-3 reset-padding-right">
                   <div class="list-group sidebar-border" id="list-category">
                       <a href="#" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border">
                           О нас
                           <div class="arrows-right">
                               <div>
                                   <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
                               </div>
                           </div>
                       </a>
                       <a href="#" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border" @click="setAbout('agreement')">
                           Пользовательское соглашение
                           <div class="arrows-right">
                               <div>
                                   <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
                               </div>
                           </div>
                       </a>
                       <a href="#" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border" @click="setAbout('vacancies')">
                           Вакансии
                           <div class="arrows-right">
                               <div>
                                   <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
                               </div>
                           </div>
                       </a>
                       <a href="#" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border" @click="setAbout('delivery')">
                           Доставка
                           <div class="arrows-right">
                               <div>
                                   <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
                               </div>
                           </div>
                       </a>
                       <a href="#" class="list-group-item content-sidebar-font content-sidebar-height content-sidebar-border" @click="setAbout('salary')">
                           Оплата
                           <div class="arrows-right">
                               <div>
                                   <img class="img-fluid" v-bind:src=" url + '/image/arrows.png'" height="auto" width="10rem"/>
                               </div>
                           </div>
                       </a>
                   </div>
               </div>
               <div class="col-sm-12 col-md-9">
                   <div class="about-content-styles">
                        <template v-if="this.aboutLabel == 'agreement'">
                            {{ this.about['agreement'] }}
                        </template>
                        <template v-if="this.aboutLabel== 'vacancies'">
                            {{ this.about['vacancies'] }}
                        </template>
                        <template v-if="this.aboutLabel == 'delivery'">
                            {{ this.about['delivery'] }}
                        </template>
                        <template v-if="this.aboutLabel == 'salary'">
                            {{ this.about['salary'] }}
                        </template>
                   </div>
               </div>
           </div>
    `
}

const Contact = {
    props: ['url', 'contacts'],
    template: `
        <div>
               <div class="row">
                   <div class="col-12">
                       <div class="row">
                           <div class="col-4 contacts-text-gray contacts-border-right contacts-text-family">
                               ОФИС
                           </div>
                           <div class="col-4 contacts-border-right contacts-text-family contacts-text-middle">
                               <p>{{ this.contacts['office']['address'] }}</p>
                               <template v-for="phone in contacts['office']['phone']">
                                    <p>{{ phone }}</p>
                               </template>
                               {{ this.contacts['office']['email'] }}
                           </div>
                           <div class="col-4 contacts-text-family contacts-text-middle">
                               <p>Режим работы:</p>
                               <p class="contacts-text-large">{{ this.contacts['office']['mode'] }}</p>
                               <p class="contacts-text-lightgray">{{ this.contacts['office']['day'] }}</p>
                           </div>
                       </div>
                   </div>
               </div>
               <br>
               <div class="row">
                   <div class="col-12">
                       <div class="row">
                           <div class="col-4 contacts-text-gray contacts-border-right contacts-text-family">
                               ОТДЕЛЕНИЕ / СКЛАД
                           </div>
                           <div class="col-4 contacts-border-right contacts-text-family contacts-text-middle">
                               <p>{{ this.contacts['stock']['address'] }}</p>
                               <template v-for="phone in contacts['stock']['phone']">
                                    <p>{{ phone }}</p>
                               </template>
                               {{ this.contacts['stock']['email'] }}
                           </div>
                           <div class="col-4 contacts-text-family contacts-text-middle">
                               <p>Режим работы:</p>
                               <p class="contacts-text-large">{{ this.contacts['stock']['mode'] }}</p>
                               <p class="contacts-text-lightgray">{{ this.contacts['stock']['day'] }}</p>
                           </div>
                       </div>
                   </div>
               </div>
               <hr>
               <div class="row">
                   <div class="col-12">
                       <div class="col-12">
                           <iframe src="https://yandex.ua/map-widget/v1/?um=constructor%3A0e13f7897b88b21f2df1d70b31b3f8df58fe2c7669e965eab846501be2b7119b&amp;source=constructor" width="100%" height="334" frameborder="0"></iframe>
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
               </div>
           </div>
    `
}

const Catalog = {
    template: `
        <!-- Catalog stores -->
        <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <p class="col-12 header-text text-center text-header-catalog">КАТАЛОГ ИНТЕРНЕТ-МАГАЗИНОВ РОССИИ</p>
                    </div>
                    <br>
                </div>
                <div class="col-12 justify-content-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-catalog-font">
                            <tbody>
                                <template v-for="(item, index) in product">
                                    <template v-if="index%2 == 0">
                                        <tr>
                                    </template>
                                    <td>
                                        <a :href="item['url']" class="not-link-a">
                                            <img :src="item['img-url']" height="auto" width="75rem"/><br>
                                            <p>{{ item.name }}</p>
                                        </a>
                                    </td>
                                        <td>
                                            <p class="text-catalog-padding">{{ item.category_name }}</p>
                                        </td>                             
                                    <template v-if="(index != 0) && (index%2 == 0)">
                                        </tr>
                                    </template>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="col-12 text-center">
                        <button class="btn button-catalog btn-lg" @click="toggle">Оформить заказ</button>
                    </div>
                </div>
            </div>
    `,
    props: ['product'],
	methods: {
        toggle: function () {
            this.$emit('ordervisible');
        }
    }
}

const Order = {
    template: `
        <div class="row">
                <div class="col-md-8 offset-md-3">
                    <div class="row justify-content-center">
                        <p class="col-12"><h4>ОФОРМЛЕНИЕ ЗАКАЗА</h4>
                    </div>
                    <br>
                </div>
                <div class="col-md-8 offset-md-3">
                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control order-input-styles" placeholder="ФИО" required v-model="fio">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="tel" class="form-control order-input-styles" placeholder="Телефон (феникс)" v-model="fenix">
                        </div>
                        <div class="col">
                            <input type="email" class="form-control order-input-styles" placeholder="E-mail" v-model="email">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="tel" class="form-control order-input-styles" placeholder="Телефон" v-model="phone">
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
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control order-input-styles" placeholder="Адрес" v-model="address">
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
                                Всего можно заполнить до 10 заявок в одном заказе.
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="row" v-for="(order, index) in orders">
                        <div class="col-12 order-border-styles">
                            <div class="row form-group">
                                <label class="col-md-2 col-form-label order-text-header-styles">ЗАКАЗ {{ index + 1 }}:</label>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="url" class="form-control order-input-styles" placeholder="Ссылка" required v-model="order['order']">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-1 col-form-label small order-text-styles-small">Количество </label>
                                <div class="col-md-2">
                                    <input type="number" class="form-control order-input-styles" required v-model="order['amount']">
                                </div>
                                <label class="col-md-1 col-form-label small order-text-styles-small">Цвет </label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control order-input-styles" v-model="order['color']">
                                </div>
                                <label class="col-md-1 col-form-label small order-text-styles-small">Размер </label>
                                <div class="col-md-2">
                                    <input type="number" class="form-control order-input-styles" v-model="order['size']">
                                </div>
                                <label class="col-md-1 col-form-label small order-text-styles-small">Сумма </label>
                                <div class="col-md-2">
                                    <input type="number" class="form-control order-input-styles" v-model="order['sum']">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control order-input-styles" v-model="order['description']" placeholder="Дополнительная информация о заказе"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12 col-md-6">
                            <button type="button" class="btn btn-lg button-add-styles" @click="addOrder()"><p class="button-text-styles">+Добавить позиции</p></button>
                        </div>
                        <div class="col-12 col-md-6 align-self-center">
                            <button type="button" class="btn btn-lg button-order-styles" @click="sendOrder()"><p class="button-text-styles">Оформить заказ</p></button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-11 offset-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check2" v-model="agreement">
                                <label class="form-check-label text-danger" for="check2">Отправляя заказ Вы ознакомились и согласились с Пользовательскими соглашениями </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-11 offset-1">
                            <div class="form-check">
                                <p class="order-text-styles"><h4 class="text-warning" id="notification"></h4></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 offset-1">
                            <div class="form-check">
                                <p class="order-text-styles"><h4>Общая сумма заказа: {{ total }} руб. </h4></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    `,
    props: ['url'],
	data: function () {
		return {
			countOrders: 1,
            address:'',
            fio: '',
            phone: '',
            fenix: '',
            email: '',
            viber: false,
            telegram: false,
            whatsapp: false,
			orders: [
				{
                    'order': '',
                    'amount': 0,
                    'color': '',
                    'size': '',
                    'sum': 0,
                    'description': ''
				}	 
			],
			agreement: false
		}
	},
	methods: {
		addOrder: function () {
            this.countOrders++;

            if(this.countOrders < 11){
                this.orders.push(
                    {
                        'order': '',
                        'amount': 0,
                        'color': '',
                        'size': '',
                        'sum': 0,
                        'description': ''
                    }
                );
            }
        },
        sendOrder: function () {
            if(this.agreement){
                jsonOrder = JSON.stringify(this.orders);
                infoClient = JSON.stringify({
                    'address': this.address,
                    'fio': this.fio,
                    'phone': this.phone,
                    'fenix': this.fenix,
                    'email': this.email,
                    'viber': this.viber,
                    'telegram': this.telegram,
                    'whatsapp': this.whatsapp
                });
                var data = {
                    'action': 'send_order',
                    'order': jsonOrder,
                    'info_client': infoClient
                };

                this.orders.length = 0;
                this.orders = [
                    {
                        'order': '',
                        'amount': 0,
                        'color': '',
                        'size': '',
                        'sum': 0,
                        'description': ''
                    }
                ];
                this.agreement = false;
                $.post(myajax.url, data, function(response)
                {
                    document.getElementById("notification").textContent = "Заказ успешно отправлен";
                }).fail(function() {
                    document.getElementById("notification").textContent = "Ошибка отправления заказа";
                });
            }
        }
	},
	computed: {
      total: function () {
          var sumTotal = 0;
          for(order in this.orders){
              sumTotal = sumTotal + Number(this.orders[order].sum);
          }

          return sumTotal;
      }
    }
}

// Наш корневой элемент
app = new Vue({
    el: '#app',
    data: {
        view: 'slider',
        trigger: true,
        picked: 'cargo',
        selectedFrom: '',
        selectedTo: '',
        cost: 0,
        options: [],
        length: 0,
        width: 0,
        height: 0,
        weight: 0,
        copy: true,
        visibleCategory: false,
        app_url: WPData.siteurl,
        category: WPData.category,
        products: WPData.products,
        contacts: WPData.contacts,
        about: WPData.about,
        cat_id: 0,
        searchString: '',
        searchVisible: false
    },
    methods: {
        toggle: function (message) {
            this.view = message;
            $('.slider').slick('slickNext');
            $('.navbar-nav>li>a').on('click', function(){
                $('.navbar-collapse').collapse('hide');
            });
        },
        setCategory: function(catId) {
            this.visibleCategory = true;
            this.cat_id = catId;
        },
        resetCategory: function () {
            this.visibleCategory = false;
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
        }
    },
    components: {
        // будет доступен только в шаблоне родителя
        'app-about': About,
        'app-contact': Contact,
        'app-catalog': Catalog,
        'app-order': Order
    },
    mounted: function () {
        console.log(this.contacts);
        console.log(this.about);
    }
});