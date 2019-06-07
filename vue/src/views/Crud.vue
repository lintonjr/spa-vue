<template>
  <div class="crud">
    <vx-card title="Crud" actionButtons>
      <form>
        <div class="vx-row">
          <div class="vx-col w-1/2">
            <vs-input
              v-validate="'required'"
              size="large"
              label="Nome"
              name="name"
              v-model="name"
              class="mt-5 w-full"
            />
            <span>{{ errors.first('name') }}</span>
          </div>
          <div class="vx-col w-1/2">
            <vs-input
              size="large"
              v-validate="'required|email'"
              type="email"
              label="E-mail"
              name="email"
              v-model="email"
              class="mt-5 w-full"
            />
            <span>{{ errors.first('email') }}</span>
          </div>
          <div class="vx-col w-1/2">
            <vs-input
              size="large"
              type="password"
              label="Senha"
              name="password"
              v-model="password"
              class="mt-5 w-full"
            />
          </div>
          <div class="vx-col w-1/2">
            <vs-input
              size="large"
              type="password"
              label="Confirmar senha"
              name="confirm_password"
              v-model="confirm_password"
              class="mt-5 w-full"
            />
          </div>
          <div class="vx-col w-1/2">
            <vs-button type="filled" @click.prevent="submitForm" class="mt-5">Enviar</vs-button>
          </div>
        </div>
      </form>
    </vx-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      confirm_password: ""
    };
  },
  methods: {
    submitForm() {
      this.$validator.validateAll().then(success => {
        alert("Nome: " + this.name + " " + "Email: " + this.email);
      });
    }
  }
};
</script>

<style>
</style>
