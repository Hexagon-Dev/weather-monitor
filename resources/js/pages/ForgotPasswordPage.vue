<script setup lang="ts">
import { ref } from 'vue';
import api from '@/plugins/api';
import { useToast } from 'primevue/usetoast';
import router from '@/plugins/router';

const toast = useToast();

const isLoading = ref(false);
const email = ref('');

async function sendResetLink() {
  isLoading.value = true;

  const { status, data } = await api.post('v1/auth/forgot-password/send', { email: email.value });

  if (status === 200) {
    toast.add({
      severity: 'success',
      summary: 'Success',
      detail: data.message,
      life: 3000,
    });

    router.push({ name: 'profile' });
  } else {
    toast.add({
      severity: 'error',
      summary: 'Error',
      detail: data?.message ?? 'An error occurred. Please try again.',
      life: 10000,
    });
  }

  isLoading.value = false;
}
</script>

<template>
	<div class="size-full flex items-center justify-center">
		<Panel header="Forgot password">
			<div class="flex flex-col gap-4">
				<div class="flex flex-col gap-2">
					<label for="email">Email</label>
					<InputText
						id="email"
						v-model="email"
						:disabled="isLoading"
					/>
				</div>

				<Button type="button" label="Send reset link" @click="sendResetLink()" />
			</div>
		</Panel>
	</div>
</template>
