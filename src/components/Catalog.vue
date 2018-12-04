<template>
  <div class="container">
    <!-- Catalog stores -->
    <div class="row" id="catalog">
      <div class="col-12">
        <div class="row justify-content-center">
          <p class="col-12 header-text text-center text-header-catalog"><h3>КАТАЛОГ ИНТЕРНЕТ-МАГАЗИНОВ РОССИИ</h3></p>
        </div>
        <br>
      </div>
      <div class="col-12 justify-content-center">
        <div class="table-responsive">
          <table class="table table-striped text-catalog-font">
            <tbody>
            <template v-for="(item, index) in stores">
              <tr class="d-flex">
                <td class="col-5 col-md-3 justify-content-center text-center">
                  <a :href="item['url']" class="not-link-a text-center" target="_blank">
                    <img :src="url + '/image/store/' + item['image']" class="img-fluid" height="auto" width="100rem"/><br>
                    <p class="catalog-store-text-size text-center">{{ item.name }}</p>
                  </a>
                </td>
                <td class="col-7 col-md-9">
                  <a :href="item['url']" class="not-link-a" target="_blank">
                    <p class="text-catalog-padding catalog-store-text-size">{{ item.category }}</p>
                  </a>
                </td>
              </tr>
            </template>
            </tbody>
          </table>
        </div>
        <br>
        <div class="col-12 text-center">
          <button class="btn button-catalog btn-lg" @click="go_to()">Оформить заказ</button>
        </div>
        <br>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data: function () {
        return {
          stores: WPData.stores,
          url: WPData.siteurl,
          product: WPData.products
        }
      },
      methods: {
        toggle: function () {
          this.$emit('ordervisible');
        },
        go_to: function () {
          this.$router.push({ name: 'order' });
        }
      },
      mounted: function() {
        var my = this;
        this.product.forEach(function(item, i, arr) {
          if(my.array[item.name] != null)
            my.array[item.name] = item.category_name;
          else
            my.array[item.name] += ", " + item.category_name;
        });
      }
    }
</script>
