<script setup lang="ts">
import { computed, ref, watch } from 'vue';
import router from '@/plugins/router';
import { useLocationsStore } from '@/stores/locationsStore';

const locationsStore = useLocationsStore();

const location = computed(() => {
  return locationsStore.locations.find((location) => location.slug === router.currentRoute.value.params.slug);
});

watch(location,() => {
	if (location.value?.id && !location.value?.weather) {
		locationsStore.fetchWeather(location.value);
	}
}, { immediate: true });

const selectedDate = ref<Date>(new Date());
</script>

<template>
	<div class="p-8">
		<transition>
			<div v-if="locationsStore.isLocationsLoading">
				Loading locations...
			</div>

			<div v-else-if="!location">
				Location not found
			</div>

			<div v-else class="size-full flex flex-col gap-4">
				<h1 class="text-3xl font-bold">
					{{ location.name }}
				</h1>

				<h2 class="text-surface-600 dark:text-surface-400">
					Up to date hourly forecast for 7 days ahead for {{ location.name }}.
				</h2>

				<DailyForecastBlock v-model="selectedDate" :selected-location="location" />

				<HourlyForecastBlock v-model="selectedDate" :selected-location="location" />

				<ReviewsBlock :selected-location="location" />
			</div>
		</transition>
	</div>
</template>
