<script setup lang="ts">
import UkraineMap from '@/components/UkraineMap.vue';
import { useLocationsStore } from '@/stores/locationsStore';
import router from '@/plugins/router';

const locationsStore = useLocationsStore();
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
				<Button
					v-for="location in locationsStore.locations"
					:key="location.id"
					:label="location.name"
					class="flex-none"
					@click="router.push('/forecast/' + location.slug)"
				/>
			</div>
		</div>
	</div>
</template>
