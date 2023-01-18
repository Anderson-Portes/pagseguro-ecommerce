<script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Card from "../../Components/Global/Card.vue";
import Button from "../../Components/Form/Button.vue";
import Input from "../../Components/Form/Input.vue";
import FloatingLabel from "../../Components/Form/FloatingLabel.vue";
import TogglePassword from "../../Components/Form/TogglePassword.vue";

const handleSubmit = () => form.post(route('register.store'));
const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  remember: false
});
</script>
<template>
  <AuthLayout>
    <Card>
      <template #header>Register</template>
      <form @submit.prevent="handleSubmit">
        <FloatingLabel key-value="Nome" v-model="form.name" :error="form.errors.name" />
        <FloatingLabel key-value="Email" v-model="form.email" type="email" :error="form.errors.email" />
        <FloatingLabel key-value="Senha" type="password" v-model="form.password" :error="form.errors.password" />
        <FloatingLabel key-value="Confirmar Senha" type="password" v-model="form.password_confirmation"
          :error="form.errors.password_confirmation" />
        <div class="w-100 text-end">
          <TogglePassword />
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="remember" @change="form.remember = !form.remember" />
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
