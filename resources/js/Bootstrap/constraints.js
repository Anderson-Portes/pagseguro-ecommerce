import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

export const user = computed(() => usePage().props.auth.user);
export const permissions = computed(() => usePage().props.auth.user.permissions)
export const maskMoney = {
  decimal: ',',
  thousands: '.',
  prefix: 'R$ ',
  precision: 2,
  masked: false /* doesn't work with directive */
}