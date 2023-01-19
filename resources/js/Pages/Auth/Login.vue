<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Button from '../../Components/Form/Button.vue';
import FloatingLabel from '../../Components/Form/FloatingLabel.vue';
import TogglePassword from '../../Components/Form/TogglePassword.vue';
import Card from '../../Components/Global/Card.vue';
import AuthLayout from '../../Layouts/AuthLayout.vue';

const form = useForm({
  email: '',
  password: '',
  remember: false
});

const handleSubmit = () => form.post(route('login.store'));
</script>
<template>
  <AuthLayout>
    <Card>
      <template #header>Login</template>
      <form @submit.prevent="handleSubmit">
        <FloatingLabel type="email" key-value="Email" v-model="form.email" :error="form.errors.email" />
        <FloatingLabel type="password" key-value="Senha" v-model="form.password" :error="form.errors.password" />
        <div class="w-100 text-end">
          <TogglePassword />
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="remember" @change="form.remember = !form.remember" />
          <label class="form-check-label" for="remember">
            Manter conectado
          </label>
        </div>
        <Button size="sm" color="outline-dark" icon="box-arrow-in-right" text="Login" class="mb-1" />
        <p>Não possui uma conta?
          <Link :href="route('register')" class="text-decoration-none">Cadastre se</Link>
        </p>
      </form>
    </Card>
  </AuthLayout>
</template>