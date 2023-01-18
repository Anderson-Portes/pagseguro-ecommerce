<script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import { Link } from "@inertiajs/vue3";
import Card from "../../Components/Global/Card.vue";
import Button from "../../Components/Form/Button.vue";
import Input from "../../Components/Form/Input.vue";
</script>
<template>
  <AuthLayout>
    <Card>
      <template #header>Register</template>
      <form>
        <div class="form-floating mb-2">
          <Input id="name" placeholder="Nome" />
          <label for="name">Nome</label>
        </div>
        <div class="form-floating mb-2">
          <Input type="email" id="email" placeholder="Email" v-model="email" />
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-2">
          <Input type="password" id="password" placeholder="Senha" />
          <label for="password">Senha</label>
        </div>
        <div class="form-floating mb-2">
          <Input type="password" id="password_confirmarion" placeholder="Confirmar Senha" />
          <label for="password_confirmation">Confirmar Senha</label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="remember" />
          <label class="form-check-label" for="remember">
            Manter conectado
          </label>
        </div>
        <Button size="sm" color="outline-dark" icon="box-arrow-in-right" text="Cadastrar" />
        <p>
          Ja possui uma conta?
          <Link :href="route('login')">Login</Link>
        </p>
      </form>
    </Card>
  </AuthLayout>
</template>
