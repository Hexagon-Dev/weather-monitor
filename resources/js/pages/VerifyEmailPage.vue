<script setup lang="ts">
import router from '@/plugins/router';
import { useToast } from 'primevue/usetoast';
import api from '@/plugins/api';

const toast = useToast();

async function verifyEmail() {
  if (!router.currentRoute.value.query.link) {
    toast.add({
      severity: 'error',
      summary: 'Error',
      detail: 'Invalid link. Please resend the verification email.',
      life: 10000,
    });
  } else {
    const { status, data } = await api.get(router.currentRoute.value.query.link);

    if (status === 200) {
      toast.add({
        severity: 'success',
        summary: 'Success',
        detail: data.message,
        life: 3000,
      });
    } else {
      toast.add({
        severity: 'error',
        summary: 'Error',
        detail: data?.message ?? 'An error occurred. Please try again.',
        life: 10000,
      });
    }
  }

  router.push({ name: 'profile' });
}

verifyEmail();
</script>

<template>
	<div class="size-full flex items-center justify-center">
		<Panel header="Verifying email">
			<div class="flex items-center justify-center py-10 px-12">
				<font-awesome-icon icon="spinner" spin size="2xl" />
			</div>
		</Panel>
	</div>
</template>
