<script setup lang="ts">
import { useToast } from 'primevue/usetoast';
import { ref } from 'vue';
import api from '@/plugins/api';
import router from '@/plugins/router';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { useUserStore } from '@/stores/userStore';

const userStore = useUserStore();

const toast = useToast();

const isLoading = ref(false);
const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

async function register() {
  isLoading.value = true;

  const { status, data } = await api.post('v1/auth/register', form.value);

  if (status === 201) {
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
	<div class="size-full flex flex-col items-center justify-center gap-2">
		<Panel header="Register">
			<div class="flex flex-col gap-4">
				<div class="flex flex-col gap-2">
					<label for="name">Name</label>
					<InputText id="name" v-model="form.name" :disabled="isLoading" />
				</div>

				<div class="flex flex-col gap-2">
					<label for="email">Email</label>
					<InputText id="email" v-model="form.email" :disabled="isLoading" />
				</div>

				<div class="flex flex-col gap-2">
					<label for="password">Password</label>
					<Password
						id="password"
						v-model="form.password"
						toggle-mask
						:disabled="isLoading"
					/>
				</div>

				<div class="flex flex-col gap-2">
					<label for="passwordConfirmation">Password confirmation</label>
					<Password
						id="passwordConfirmation"
						v-model="form.password_confirmation"
						toggle-mask
						:feedback="false"
						:disabled="isLoading"
					/>
				</div>

				<div class="flex gap-2">
					<Button class="grow" severity="secondary" @click="router.back()">
						<font-awesome-icon icon="chevron-left" class="mr-2" />
						Back
					</Button>

					<Button
						class="grow"
						label="Register"
						:loading="isLoading"
						@click="register"
					/>
				</div>

				<router-link to="login" class="hover:underline text-center">
					Already registered?
				</router-link>
			</div>
		</Panel>
	</div>
</template>
