<template>
  <div class="container">
    <!-- Catalog stores -->
    <div class="row" id="catalog">
      <div class="col-12">
        <div class="row justify-content-center">
          <p class="col-12 header-text text-center text-header-catalog"><h3 class="text-center">ОТСЛЕЖИВАНИЕ СТАТУСА ЗАКАЗА</h3></p>
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
                Получить статус заказа
              </button>
            </div>
        </div>
      </div>
      <div class="col-11 offset-lg-1 offset-xl-1" v-show="status != false">
        <div class="row">
            <div class="col-5 col-lg-4 col-xl-4">
              <p><h5>Статус заказ:</h5></p>
            </div>
            <div class="col-6" v-if="status">
              <p class="order-text-styles"><h5 class="text-warning">{{statusName}}</h5></p>
            </div>
        </div>
      </div>
      <div class="col-11 offset-lg-1 offset-xl-1" v-show="status != false">
        <div class="row">
            <div class="col-5 col-lg-4 col-xl-4">
              <p><h5>ФИО отправителя:</h5></p>
            </div>
            <div class="col-6" v-if="status">
              <p class="order-text-styles"><h5 class="text-warning">{{fio}}</h5></p>
            </div>
        </div>
      </div>
      <div class="col-11 offset-lg-1 offset-xl-1" v-show="status != false">
        <div class="row">
            <div class="col-5 col-lg-4 col-xl-4">
              <p><h5>Город отправления:</h5></p>
            </div>
            <div class="col-6" v-if="status">
              <p class="order-text-styles"><h5 class="text-warning">{{from}}</h5></p>
            </div>
        </div>
      </div>
      <div class="col-11 offset-lg-1 offset-xl-1" v-show="status != false">
        <div class="row">
            <div class="col-5 col-lg-4 col-xl-4">
              <p><h5>Город назначения:</h5></p>
            </div>
            <div class="col-6" v-if="status">
              <p class="order-text-styles"><h5 class="text-warning">{{to}}</h5></p>
            </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-10 col-xl-10 offset-lg-1 offset-xl-1" v-show="records != ''">
      <br><br>
      <div class="row">
        <h5>ОТСЛЕЖИВАНИЕ:</h5>
      </div>
      <table class="table table-condensed">
        <tr>
          <th>Дата</th>
          <th>Статус</th>
        </tr>
        <tr v-for="item in records">
          <td>{{ item.date }}</td>
          <td>{{ item.status }}</td>
        </tr>
      </table>
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
          product: WPData.products,
          searchString: '',
          status:false,
          statusName:'',
          fio: '',
          from:'',
          to:'',
          records:''
        }
      },
      methods: {
        getStatusOrder: function () {

            // Get status order

            var data = {
              "action": "get_status_order",
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
                my.fio = responseData['fio'];
                my.from = responseData['from_city'];
                my.to = responseData['to_city'];
              }).fail(function() {
                my.statusName = "Ошибка получения статуса заказа";
                my.status = false;
              });
            }

            // Get records edit status oreder

            var data = {
              "action": "get_status_records",
              "id": this.searchString
            };

            if(this.searchString != '')
            {
              var my = this;
              $.post(myajax.url, data, function(response)
              {
                var responseData = JSON.parse(response);
                my.records = responseData;
              }).fail(function() {
                my.records = '';
              });
            }

        },
      }
    }
</script>
