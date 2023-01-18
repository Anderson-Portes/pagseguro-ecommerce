<script setup>
import { Link } from '@inertiajs/vue3';
import Button from '../../Components/Form/Button.vue';
import Input from '../../Components/Form/Input.vue';
import Card from '../../Components/Global/Card.vue';
import AuthLayout from '../../Layouts/AuthLayout.vue';
</script>
<template>
  <AuthLayout>
    <Card>
      <template #header>Login</template>
      <form>
        <div class="form-floating mb-2">
          <Input type="email" id="email" placeholder="Email" />
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-2">
          <Input type="password" id="password" placeholder="Senha" />
          <label for="password">Senha</label>
        </div>
        <div class="form-check mb-2">
          <Input type="checkbox" id="remember" class="form-check-input" />
          <label class="form-check-label" for="remember">
            Manter conectado
          </label>
        </div>
        <Button size="sm" color="outline-dark" icon="box-arrow-in-right" text="Login" />
        <p>Não possui uma conta?
          <Link :href="route('register')">Cadastre se</Link>
        </p>
      </form>
    </Card>
  </AuthLayout>
</template>