<script setup>
import AuthLayout from '../../Layouts/AuthLayout.vue';
import { Link } from '@inertiajs/vue3';
import Card from '../../Components/Global/Card.vue';
</script>
<template>
  <AuthLayout>
    <Card>
      <template #header>Register</template>
      <form>
        <div class="form-floating mb-2">
          <input type="email" class="form-control" id="email" placeholder="Email" name="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-2">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <label for="password">Senha</label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
          <label class="form-check-label" for="remember">
            Manter conectado
          </label>
        </div>
        <button class="btn btn-sm btn-outline-dark mb-2">
          <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
        <p>Ja possui uma conta?
          <Link :href="route('login')">Login</Link>
        </p>
      </form>
    </Card>
  </AuthLayout>
</template>