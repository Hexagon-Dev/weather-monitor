<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
  min: number;
  max: number;
  values: Array<{ min: number, max: number }>
}>();

const minTemp = computed(() => Math.min(...props.values.map(v => v.min)));
const maxTemp = computed(() => Math.max(...props.values.map(v => v.max)));

const marginLeft = computed(() => {
  return (props.min - minTemp.value) / (maxTemp.value - minTemp.value) * 100 + '%';
});

const marginRight = computed(() => {
  return (maxTemp.value - props.max) / (maxTemp.value - minTemp.value) * 100 + '%';
});

const maskStyle = computed(() => {
  return {
    clipPath: `inset(0% ${marginRight.value} 0% ${marginLeft.value} round 10px)`,
  };
});
</script>

<template>
	<div class="relative w-full h-2 bg-surface-300 rounded-full overflow-hidden">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-400 via-yellow-400 to-red-400 rounded-full"
			:style="maskStyle"
		/>
	</div>
</template>
