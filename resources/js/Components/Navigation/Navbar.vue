<script setup>
import { Link } from "@inertiajs/vue3";
import Button from "../Form/Button.vue";
import Sidebar from "./Sidebar.vue";
import { permissions } from "../../Bootstrap/constraints";
</script>

<template>
  <nav class="navbar navbar-expand-lg border-bottom shadow-sm">
    <div class="container">
      <Link class="navbar-brand" :href="route('home')">Ecommerce</Link>
      <Button
        icon="list"
        class="navbar-toggler"
        color="dark"
        data-bs-toggle="offcanvas"
        data-bs-target="#sidebar"
      />
      <div
        class="collapse navbar-collapse justify-content-end"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav">
          <li
            class="nav-item dropdown"
            v-if="permissions.includes('admin resources')"
          >
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Admin
            </a>
            <ul class="dropdown-menu">
              <li v-if="permissions.includes('list product')">
                <Link
                  :href="route('admin.product.index')"
                  class="dropdown-item"
                  as="link"
                >
                  <i class="bi bi-box-seam-fill me-2"></i>Produtos
                </Link>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bi bi-person"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#">
                  <i class="bi bi-gear me-2"></i>Perfil
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <Link
                  :href="route('logout')"
                  method="post"
                  class="dropdown-item text-danger"
                  as="link"
                >
                  <i class="bi bi-escape me-2"></i>Sair
                </Link>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <Sidebar />
</template>
