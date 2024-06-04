<script setup lang="ts">
import cities from '@/assets/cities.json';
import { Location } from '@/types';
import { useLocationsStore } from '@/stores/locationsStore';

const locationsStore = useLocationsStore();

const selectedCity = defineModel<Location | null>();
</script>

<template>
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 612 408"
		class="h-auto w-full"
	>
		<path
			v-for="city in cities"
			:id="city.id"
			:key="city.id"
			:d="city.d"
			fill="currentColor"
			stroke="#FFFFFF"
			:class="[
				selectedCity?.code === city.id ? 'text-primary-500 hover:!text-primary-500' : 'text-surface-500'
			]"
			class="cursor-pointer hover:text-primary-500/50 transition-colors duration-200 ease-in-out"
			@click="selectedCity = locationsStore.locations.find((location) => location.code === city.id)"
		/>
	</svg>
</template>
