<script setup>
import BaseLayout from "../../../Layouts/BaseLayout.vue";
import Card from "../../../Components/Global/Card.vue";
import Row from "../../../Components/Grid/Row.vue";
import Col from "../../../Components/Grid/Col.vue";
import Button from "../../../Components/Form/Button.vue";
import { Link } from "@inertiajs/vue3";
import Icon from "../../../Components/Global/Icon.vue";
import Table from "../../../Components/Global/Table.vue";

defineProps({
  products: Object,
});
</script>
<template>
  <BaseLayout>
    <Row justify="center">
      <Col class="p-0" base="11" md="8" lg="7">
        <Card>
          <template #header>
            <h5>Lista de produtos</h5>
            <Link
              as="button"
              class="btn btn-sm btn-outline-dark"
              :href="route('admin.product.create')"
            >
              <Icon icon="plus-circle" class="me-2" />Novo Produto
            </Link>
          </template>
          <Table :keys="['name', 'price', 'status']">
            <tr
              v-for="product in products.data"
              v-if="products.data.length"
            ></tr>
            <tr v-else>
              <td colspan="4">Nenhum produto encontrado...</td>
            </tr>
          </Table>
        </Card>
      </Col>
    </Row>
  </BaseLayout>
</template>
