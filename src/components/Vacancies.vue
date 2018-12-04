<template>
  <div class="about-content-styles">
    {{ this.about['vacancies'] }}
  </div>
</template>

<script>
  import {mapGetters} from 'vuex';
  export default {
    data: function () {
      return {
        about: WPData.about
      }
    }
  }
</script>
