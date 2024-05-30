<script setup lang="ts">
import router from '@/plugins/router';
import { useToast } from 'primevue/usetoast';
import api from '@/plugins/api';
import { ref } from 'vue';
import { useUserStore } from '@/stores/userStore';

const userStore = useUserStore();

const toast = useToast();

if (!router.currentRoute.value.query.link) {
  toast.add({
    severity: 'error',
    summary: 'Error',
    detail: 'Invalid link. Please resend the verification email.',
    life: 10000,
  });
}

const isLoading = ref(false);
const resetPasswordForm = ref({
  password: '',
  password_confirmation: '',
});

async function resetPassword() {
  isLoading.value = true;

  const { status, data } = await api.get(
    router.currentRoute.value.query.link + '&' + new URLSearchParams(resetPasswordForm.value).toString(),
  );

  if (status === 200) {
    toast.add({
      severity: 'success',
      summary: 'Success',
      detail: data.message,
      life: 3000,
    });

    await userStore.fetchMe();

    await router.push({ name: 'profile' });
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
		<Panel header="Reset password">
			<div class="flex flex-col gap-4">
				<div class="flex flex-col gap-2">
					<label for="newPassword">New password</label>
					<Password
						id="newPassword"
						v-model="resetPasswordForm.password"
						toggle-mask
						:disabled="isLoading"
					/>
				</div>

				<div class="flex flex-col gap-2">
					<label for="passwordConfirmation">New password confirmation</label>
					<Password
						id="passwordConfirmation"
						v-model="resetPasswordForm.password_confirmation"
						toggle-mask
						:feedback="false"
						:disabled="isLoading"
					/>
				</div>

				<Button
					type="button"
					label="Submit"
					:loading="isLoading"
					@click="resetPassword()"
				/>
			</div>
		</Panel>
	</div>
</template>
