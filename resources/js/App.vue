<script setup lang="ts">

</script>

<template>
	<div class="size-full">
		<router-view v-slot="{ Component, route }">
			<transition mode="out-in">
				<component :is="Component" :key="route.path" />
			</transition>
		</router-view>
	</div>
</template>
