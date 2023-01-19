import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

export const user = computed(() => usePage().props.auth.user);
export const hasPermission = permission => computed(() => usePage().props.auth.user.permissions.includes(permission))