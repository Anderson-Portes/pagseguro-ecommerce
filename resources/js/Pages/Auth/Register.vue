<script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Card from "../../Components/Global/Card.vue";
import Button from "../../Components/Form/Button.vue";
import FloatingLabel from "../../Components/Form/FloatingLabel.vue";
import TogglePassword from "../../Components/Form/TogglePassword.vue";
import { ref } from "vue";
import Row from "../../Components/Grid/Row.vue";
import vMask from "../../Directives/mask";
import FormErrorsNotifier from "../../Components/Form/FormErrorsNotifier.vue";

const handleSubmit = () =>
  form.post(route("register.store"), {
    onBefore: () => (form.errors = {}),
  });
const fetchAddress = async () => {
  if (form.postal_code.length != 9) return;
  const { data } = await axios.get(
    `https://viacep.com.br/ws/${form.postal_code}/json/`
  );
  form.state = data.uf;
  form.city = data.localidade;
  form.district = data.bairro;
  form.street = data.logradouro;
};
const page = ref(1);
const form = useForm({
  name: "",
  email: "",
  phone: "",
  postal_code: "",
  state: "",
  city: "",
  district: "",
  street: "",
  number: "",
  complement: "",
  cpf: "",
  password: "",
  password_confirmation: "",
  remember: false,
});
</script>
<template>
  <FormErrorsNotifier :errors="form.errors" />
  <AuthLayout>
    <Card>
      <template #header>Register</template>
      <form @submit.prevent="handleSubmit">
        <div v-if="page == 1">
          <FloatingLabel
            key-value="Nome"
            v-model="form.name"
            :error="form.errors.name"
          />
          <FloatingLabel
            key-value="Email"
            v-model="form.email"
            type="email"
            :error="form.errors.email"
          />
          <FloatingLabel
            key-value="Celular"
            v-model="form.phone"
            :error="form.errors.phone"
            v-mask="'(##) #####-####'"
          />
        </div>
        <div v-else-if="page == 2">
          <Row class="gx-2">
            <div class="col-12">
              <FloatingLabel
                key-value="CEP"
                @input="fetchAddress"
                v-model="form.postal_code"
                :error="form.errors.postal_code"
                v-mask="'#####-###'"
              />
            </div>
            <div class="col-12 col-md-6">
              <FloatingLabel
                key-value="Estado"
                v-model="form.state"
                :error="form.errors.state"
                v-mask="'AA'"
              />
            </div>
            <div class="col-12 col-md-6">
              <FloatingLabel
                key-value="Cidade"
                v-model="form.city"
                :error="form.errors.city"
              />
            </div>
            <div class="col-12 col-md-6">
              <FloatingLabel
                key-value="Bairro"
                v-model="form.district"
                :error="form.errors.district"
              />
            </div>
            <div class="col-12 col-md-6">
              <FloatingLabel
                key-value="Logradouro"
                v-model="form.street"
                :error="form.errors.street"
              />
            </div>
            <div class="col-12 col-md-6">
              <FloatingLabel
                key-value="Numero"
                v-model="form.number"
                :error="form.errors.number"
              />
            </div>
            <div class="col-12 col-md-6">
              <FloatingLabel
                key-value="Complemento"
                v-model="form.complement"
                :error="form.errors.complement"
              />
            </div>
          </Row>
        </div>
        <div v-else-if="page == 3">
          <FloatingLabel
            key-value="CPF"
            v-mask="'###.###.###-##'"
            v-model="form.cpf"
            :error="form.errors.cpf"
          />
          <FloatingLabel
            key-value="Senha"
            type="password"
            v-model="form.password"
            :error="form.errors.password"
          />
          <FloatingLabel
            key-value="Confirmar Senha"
            type="password"
            v-model="form.password_confirmation"
            :error="form.errors.password_confirmation"
          />
          <div class="w-100 text-end">
            <TogglePassword />
          </div>
          <div class="form-check mb-2">
            <input
              class="form-check-input"
              type="checkbox"
              id="remember"
              @change="form.remember = !form.remember"
            />
            <label class="form-check-label" for="remember">
              Manter conectado
            </label>
          </div>
          <Button
            size="sm"
            color="outline-dark"
            icon="box-arrow-in-right"
            text="Cadastrar"
          />
        </div>
        <div class="w-100 text-end">
          <Button
            size="sm"
            color="outline-dark"
            icon="arrow-left"
            @click="page--"
            v-if="page > 1"
            class="me-1"
            type="button"
          />
          <Button
            size="sm"
            color="outline-dark"
            icon="arrow-right"
            @click="page++"
            v-if="page < 3"
            type="button"
          />
        </div>
        <p>
          Ja possui uma conta?
          <Link :href="route('login')" class="text-decoration-none">Login</Link>
        </p>
      </form>
    </Card>
  </AuthLayout>
</template>
