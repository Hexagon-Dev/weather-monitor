<script setup lang="ts">
import { computed, ref } from 'vue';
import router from '@/plugins/router';
import { useLocationsStore } from '@/stores/locationsStore';

const locationsStore = useLocationsStore();

const location = computed(() => {
  return locationsStore.locations.find((location) => location.slug === router.currentRoute.value.params.slug);
});
const selectedDate = ref<Date>(new Date());
</script>

<template>
	<div>
		<h1 />
	</div>
</template>

<style scoped>

</style>
