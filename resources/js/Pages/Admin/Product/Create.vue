<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import Button from "../../../Components/Form/Button.vue";
import Card from "../../../Components/Global/Card.vue";
import Icon from "../../../Components/Global/Icon.vue";
import Col from "../../../Components/Grid/Col.vue";
import Row from "../../../Components/Grid/Row.vue";
import BaseLayout from "../../../Layouts/BaseLayout.vue";
import FloatingLabel from "../../../Components/Form/FloatingLabel.vue";
import { VueEditor } from "vue3-editor";
import { ref } from "vue";
import FormErrorsNotifier from "../../../Components/Form/FormErrorsNotifier.vue";
import vMoney from "../../../Directives/money";
import { maskMoney } from "../../../Bootstrap/constraints";

const page = ref(1);
const image = ref(null);
const changeImage = (event) => {
  form.image = event.target.files[0];
  image.value = URL.createObjectURL(form.image);
};
const handleSubmit = () =>
  form.post(route("admin.product.store"), {
    onBefore: () => (form.errors = {}),
    onSuccess: () => form.reset(),
  });
const form = useForm({
  name: "",
  description: "",
  image: "",
  activated: true,
  price: "",
});
</script>
<template>
  <FormErrorsNotifier :errors="form.errors" />
  <BaseLayout>
    <Row justify="center">
      <Col base="11" md="8" lg="7" class="p-0">
        <Card>
          <template #header>
            <h5>Novo Produto</h5>
            <Link
              :href="route('admin.product.index')"
              class="btn btn-sm btn-outline-dark"
            >
              <Icon icon="arrow-left" class="me-2" />Voltar para lista
            </Link>
          </template>
          <form @submit.prevent="handleSubmit">
            <div v-if="page == 1">
              <Row justify="center">
                <Col base="8">
                  <img
                    :src="image"
                    v-if="image"
                    class="img-fluid d-block mx-auto mb-2"
                  />
                </Col>
              </Row>
              <div class="w-100 text-end">
                <label for="image" class="btn btn-sm btn-dark mb-2">
                  <Icon icon="image" class="me-2" />Selecionar Imagem
                </label>
              </div>
              <input
                type="file"
                hidden
                id="image"
                accept="image/*"
                @change="changeImage"
              />
              <FloatingLabel
                key-value="Nome"
                v-model="form.name"
                :error="form.errors.name"
              />
              <FloatingLabel
                key-value="Preço"
                v-money="maskMoney"
                v-model="form.price"
                :error="form.errors.price"
              />
            </div>
            <div v-else-if="page == 2">
              <!-- <label for="description" class="mb-1">Descrição</label>
              <VueEditor
                v-model="form.description"
                :class="`mb-2 ${form.errors.description && 'is-invalid'}`"
                id="description"
              /> -->
              <FloatingLabel
                :is-textarea="true"
                style="height: 150px; resize: none"
                key-value="Descrição"
                v-model="form.description"
                :error="form.errors.description"
              />
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="activated"
                  :checked="form.activated"
                  @change="form.activated = !form.activated"
                />
                <label class="form-check-label" for="activated"
                  >Disponível</label
                >
              </div>
              <Button
                color="outline-dark"
                size="sm"
                text="Salvar"
                icon="save"
              />
            </div>
            <div class="w-100 text-end">
              <Button
                color="outline-dark"
                size="sm"
                icon="arrow-left"
                class="me-1"
                type="button"
                @click="page--"
                v-if="page > 1"
              />
              <Button
                color="outline-dark"
                size="sm"
                icon="arrow-right"
                type="button"
                @click="page++"
                v-if="page < 2"
              />
            </div>
          </form>
        </Card>
      </Col>
    </Row>
  </BaseLayout>
</template>
