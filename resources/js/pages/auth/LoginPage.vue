<script setup lang="ts">
import { ref } from 'vue';
import api from '@/plugins/api';
import { useToast } from 'primevue/usetoast';
import router from '@/plugins/router';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { useUserStore } from '@/stores/userStore';

const userStore = useUserStore();

const toast = useToast();

const isLoading = ref(false);
const form = ref({
  email: 'test@mail.com',
  password: 'password',
  remember_me: false,
});

async function login() {
  isLoading.value = true;

  const { status, data } = await api.post('v1/auth/login', form.value);

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
	<div class="size-full flex flex-col items-center justify-center">
		<Panel header="Login">
			<div class="flex flex-col gap-4">
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
						:feedback="false"
						:disabled="isLoading"
					/>
				</div>

				<div class="flex align-items-center">
					<Checkbox
						v-model="form.remember_me"
						input-id="remember_me"
						name="remember_me"
						value="Remember me"
						:disabled="isLoading"
					/>
					<label for="remember_me" class="ml-2">Remember me</label>
				</div>

				<div class="flex gap-2">
					<Button class="grow" severity="secondary" @click="router.back()">
						<font-awesome-icon icon="chevron-left" class="mr-2" />
						Back
					</Button>

					<Button
						class="grow"
						label="Login"
						:loading="isLoading"
						@click="login"
					/>
				</div>

				<div class="flex gap-2 justify-between">
					<router-link to="forgot-password" class="hover:underline text-center">
						Forgot password?
					</router-link>

					<router-link to="register" class="hover:underline text-center">
						No account?
					</router-link>
				</div>
			</div>
		</Panel>
	</div>
</template>
