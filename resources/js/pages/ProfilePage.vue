<script setup lang="ts">
import { useUserStore } from '@/stores/userStore';
import { ref } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import api from '@/plugins/api';
import { useToast } from 'primevue/usetoast';

const userStore = useUserStore();

const toast = useToast();

const isEditMode = ref(false);
const isLoading = ref(false);
const form = ref({
  name: '',
  email: '',
});

form.value.name = userStore.user.name;
form.value.email = userStore.user.email;

async function updateUser() {
  isLoading.value = true;

  const { status, data } = await api.put('v1/users/me', form.value);

  if (status === 200) {
    toast.add({
      severity: 'success',
      summary: 'Success',
      detail: data.message,
      life: 3000,
    });

    userStore.user = data.user;
  } else {
    toast.add({
      severity: 'error',
      summary: 'Error',
      detail: data?.message ?? 'An error occurred. Please try again.',
      life: 10000,
    });
  }

  isLoading.value = false;
  isEditMode.value = false;
}

const isSendVerificationEmailLoading = ref(false);

async function sendVerificationEmail() {
  isSendVerificationEmailLoading.value = true;

  const { status, data } = await api.post('v1/auth/email-verification/send');

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

  isSendVerificationEmailLoading.value = false;
}

const isChangePasswordModalVisible = ref(false);
const changePasswordForm = ref({
  current_password: '',
  new_password: '',
  new_password_confirmation: '',
});

function closeChangePasswordModal() {
  isChangePasswordModalVisible.value = false;
  changePasswordForm.value = {
    current_password: '',
    new_password: '',
    new_password_confirmation: '',
  };
}

async function changePassword() {
  isLoading.value = true;

  const { status, data } = await api.post('v1/auth/change-password', changePasswordForm.value);

  if (status === 200) {
    toast.add({
      severity: 'success',
      summary: 'Success',
      detail: data.message,
      life: 3000,
    });

    isChangePasswordModalVisible.value = false;
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
		<Panel header="Profile">
			<div class="flex gap-4">
				<Panel header="Personal Info">
					<div class="flex flex-col gap-4">
						<div class="flex flex-col gap-2">
							<label for="name">Name</label>
							<InputText id="name" v-model="form.name" :disabled="!isEditMode || isLoading" />
						</div>

						<div class="flex flex-col gap-2">
							<label for="email">Email</label>
							<InputText id="email" v-model="form.email" :disabled="!isEditMode || isLoading" />
						</div>

						<div class="flex gap-2">
							<Button v-if="!isEditMode" @click="isEditMode = true">
								<font-awesome-icon icon="pencil" class="mr-2" />
								Edit
							</Button>

							<template v-else>
								<Button
									class="grow"
									outlined
									:disabled="isLoading"
									@click="isEditMode = false"
								>
									<font-awesome-icon icon="times" class="mr-2" />
									Cancel
								</Button>

								<Button class="grow" :loading="isLoading" @click="updateUser()">
									<font-awesome-icon icon="floppy-disk" class="mr-2" />
									Save
								</Button>
							</template>
						</div>
					</div>
				</Panel>

				<Panel header="Misc">
					<div class="flex flex-col gap-2">
						<div class="flex flex-col">
							<label for="email">Registered at:</label>
							<p>{{ userStore.user!.created_at.slice(0, 19).replace('T', ' ') }}</p>
						</div>
						<div class="flex items-center gap-1">
							Is email verified:
							<font-awesome-icon
								:icon="userStore.user!.is_email_verified ? 'check' : 'times'"
								:class="userStore.user!.is_email_verified ? 'text-green-500' : 'text-red-500'"
							/>
						</div>

						<Button
							v-if="!userStore.user!.is_email_verified"
							label="Send verification email"
							outlined
							:loading="isSendVerificationEmailLoading"
							@click="sendVerificationEmail()"
						/>
						<Button label="Change Password" :disabled="isSendVerificationEmailLoading" @click="isChangePasswordModalVisible = true" />
						<Button label="Delete Account" severity="danger" :disabled="isSendVerificationEmailLoading" />
					</div>
				</Panel>
			</div>
		</Panel>

		<Dialog
			v-model:visible="isChangePasswordModalVisible"
			modal
			header="Change Password"
			:style="{ width: '25rem' }"
			:closable="!isLoading"
		>
			<div class="flex flex-col gap-4">
				<div class="flex flex-col gap-2">
					<label for="currentPassword">Current password</label>
					<Password
						id="currentPassword"
						v-model="changePasswordForm.current_password"
						toggle-mask
						:feedback="false"
						:disabled="isLoading"
					/>
				</div>

				<div class="flex flex-col gap-2">
					<label for="newPassword">New password</label>
					<Password
						id="newPassword"
						v-model="changePasswordForm.new_password"
						toggle-mask
						:disabled="isLoading"
					/>
				</div>

				<div class="flex flex-col gap-2">
					<label for="passwordConfirmation">New password confirmation</label>
					<Password
						id="passwordConfirmation"
						v-model="changePasswordForm.new_password_confirmation"
						toggle-mask
						:feedback="false"
						:disabled="isLoading"
					/>
				</div>

				<div class="flex justify-end gap-2">
					<Button
						type="button"
						label="Cancel"
						severity="secondary"
						@click="closeChangePasswordModal()"
					/>
					<Button type="button" label="Save" @click="changePassword()" />
				</div>
			</div>
		</Dialog>
	</div>
</template>