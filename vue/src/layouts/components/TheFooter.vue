<!-- =========================================================================================
    File Name: TheFooter.vue
    Description: Footer component
    Component Name: TheFooter
    ----------------------------------------------------------------------------------------
    Item Name: Vuesax Admin - VueJS Dashboard Admin Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
  <footer class="the-footer flex-wrap justify-between" :class="classes">
    <span>
      COPYRIGHT @ {{ new Date().getFullYear() }}
      <a
        href="https://diretoriodigital.com.br"
        target="_blank"
        rel="nofollow"
      >Diretório Digital</a>, All rights Reserved
    </span>
  </footer>
</template>

<script>
export default {
  name: "the-footer",
  props: {
    classes: {
      type: String
    }
  }
};
</script>
