<script setup lang="ts">
import UkraineMap from '@/components/UkraineMap.vue';
import { useLocationsStore } from '@/stores/locationsStore';
import router from '@/plugins/router';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { useUserStore } from '@/stores/userStore';
import api from '@/plugins/api';
import { useToast } from 'primevue/usetoast';
import { ref } from 'vue';

const locationsStore = useLocationsStore();
const userStore = useUserStore();

const toast = useToast();

const isLoading = ref(false);

async function toggleFavourite(locationId: number) {
	if (!userStore.user) {
		return;
	}

	isLoading.value = true;

	const index = userStore.user.favourite_locations.indexOf(locationId);

	if (index === -1) {
		userStore.user.favourite_locations.push(locationId);
	} else {
		userStore.user.favourite_locations.splice(index, 1);
	}

	const { status, data } = await api.put(`v1/locations/${locationId}/favourite`);

	if (status !== 200) {
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
	<div class="h-full p-8 flex lg:flex-row flex-col lg:gap-4 gap-8">
		<UkraineMap class="lg:w-2/3 w-auto sm:block hidden flex-none" />

		<div class="card flex flex-col gap-2 lg:w-1/3 w-auto">
			<h2 class="text-2xl font-bold">
				Welcome To Weather Monitor
			</h2>

			<h2>
				Please, select location
			</h2>

			<div class="flex flex-col gap-2 overflow-y-auto h-full">
				<div v-for="location in locationsStore.locations" :key="location.id" class="flex gap-2">
					<Button class="w-full" @click="router.push('/forecast/' + location.slug)">
						<div>
							{{ location.name }}
						</div>
					</Button>

					<Button
						v-if="userStore.user"
						outlined
						severity="secondary"
						:loading="isLoading"
						@click="toggleFavourite(location.id)"
					>
						<font-awesome-icon
							icon="star"
							:class="{ 'text-yellow-500': userStore.user.favourite_locations.includes(location.id) }"
						/>
					</Button>
				</div>
			</div>
		</div>
	</div>
</template>
