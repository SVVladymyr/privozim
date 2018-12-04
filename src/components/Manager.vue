<template>
  <div class="container">
    <!-- Catalog stores -->
    <div class="row" id="catalog">
      <div class="col-12">
        <div class="row justify-content-center">
          <p class="col-12 header-text text-center text-header-catalog"><h3 class="text-center">СТРАНИЦА УПРАВЛЕНИЯ СТАТУСОМ</h3></p>
        </div>
        <br>
      </div>
      <div class="col-11 offset-lg-1 offset-xl-1">
        <div class="row">
            <div class="col-12 col-sm-5 input-group">
              <input type="search" class="form-control border-green" placeholder="Введите номер заказа" id="search" v-model="searchString">
            </div>
            <div class="col-2">
              <button class="btn button-catalog btn-md" type="button" @click="getStatusOrder()">
                Найти заказ
              </button>
            </div>
        </div>
        <br>
      </div>
      <div class="col-11 offset-lg-1 offset-xl-1">
        <div class="row">
          <div class="col-5">
              <p><h4>Текущий статус заказа:</h4></p>
            </div>
            <div class="col-7" v-if="status">
              <p class="order-text-styles">
                      <h4 class="text-warning">
                        {{ statusName }}
                      </h4>  
                </select>
              </p>
            </div>
            <br>
        </div>
        <div class="row" v-if="status">
            <div class="col-12 col-lg-3 col-xl-3 align-self-center">
              <p><h4>Изменить статус заказа:</h4></p>
            </div>
            <div class="col-12 col-lg-3 col-xl-3 align-self-center">
              <select v-model="status" class="form-control border-green">
                <option v-for="item in status_order" :value="item.id">
                  {{ item.status_name }}
                </option>
              </select>
            </div>
            <div class="col-12 col-lg-2 col-xl-2 align-self-center" v-show="(status == 5) || (status == 6)">
              <input type="search" class="form-control border-green" placeholder="Введите город" id="search" v-model="city_order">
            </div>
            <div class="col-12 col-lg-2 col-xl-2 align-self-center">
              <button class="btn button-catalog btn-md" type="button" @click="changeStatusOrder()">
                Изменить статус заказа
              </button>
            </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
  </div>
</template>

<script>
    export default {
      data: function () {
        return {
          stores: WPData.stores,
          url: WPData.siteurl,
          status_order: WPData.status_order,
          product: WPData.products,
          city: WPData.city,
          city_order: '',
          searchString: '',
          status:false,
          statusName: ''
        }
      },
      methods: {
        getStatusOrder: function () {
            var data = {
              "action": "get_status_order_for_admin",
              "numOrder": this.searchString
            };

            if(this.searchString != '')
            {
              var my = this;
              $.post(myajax.url, data, function(response)
              {
                var responseData = JSON.parse(response);
                my.status = responseData['status_id'];
                my.statusName = responseData['status'];
              }).fail(function() {
                my.statusName = "Ошибка получения статуса заказа";
                my.status = false;
              });
            }
        },
        changeStatusOrder: function () {
            var data = {
              "action": "set_status_order",
              "numOrder": this.searchString,
              "status": this.status,
              "city": this.city_order
            };

            if(this.searchString != '')
            {
              var my = this;
              $.post(myajax.url, data, function(response)
              {
                my.statusName = response;
              }).fail(function() {
                my.statusName = "Ошибка получения статуса заказа";
                my.status = false;
              });
            }
        },
      }
    }
</script>
