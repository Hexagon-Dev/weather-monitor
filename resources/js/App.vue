<script setup lang="ts">
import { useUserStore } from '@/stores/userStore';
import Toast from 'primevue/toast';
import router from '@/plugins/router';
import { useLocationsStore } from '@/stores/locationsStore';
import { useDark, useToggle } from '@vueuse/core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const userStore = useUserStore();
const locationsStore = useLocationsStore();

locationsStore.fetchLocations();

if (userStore.isAuthenticated) {
  userStore.fetchMe();
}

const menuItems = [
  {
    label: 'Home',
    icon: 'home',
    route: 'index',
  },
  {
    label: 'Login',
    icon: 'sign-in',
    route: 'login',
    visible: () => !userStore.isAuthenticated,
    class: 'md:ml-auto ml-0',
  },
  {
    label: 'Register',
    icon: 'user-plus',
    route: 'register',
    visible: () => !userStore.isAuthenticated,
  },
  {
    label: 'Profile',
    icon: 'user',
    route: 'profile',
    visible: () => userStore.isAuthenticated,
    class: 'md:ml-auto ml-0',
  },
  {
    label: 'Logout',
    icon: 'sign-out',
    route: 'logout',
    visible: () => userStore.isAuthenticated,
  },
];

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
	<div class="size-full flex flex-col bg-white dark:bg-surface-900 text-surface-900 dark:text-surface-300">
		<Menubar v-if="!router.currentRoute.value?.meta?.hideNavigation" :model="menuItems" class="m-2">
			<template #start>
				<div class="mr-6 flex items-center gap-2 whitespace-nowrap">
					<font-awesome-icon icon="sun" size="2xl" class="text-primary-500" />

					<h1 class="text-xl font-bold text-surface-500 dark:text-white/80">
						Weather Monitor
					</h1>
				</div>
			</template>

			<template #item="{ item }">
				<router-link
					v-if="item.route"
					v-slot="{ href, navigate, isActive }"
					:to="{ name: item.route }"
					custom
				>
					<a
						:href="href"
						class="p-2 block text-center rounded duration-200"
						:class="[
							item.class,
							isActive ? 'bg-primary-500 text-white' : 'text-surface-500 dark:text-white/80'
						]"
						@click="navigate"
					>
						<font-awesome-icon :icon="item.icon" />
						<span class="ml-2">{{ item.label }}</span>
					</a>
				</router-link>

				<a
					v-else
					class="p-2 block"
					:href="item.url"
					:target="item.target"
				>
					<font-awesome-icon :icon="item.icon" />
					<span class="ml-2">{{ item.label }}</span>
				</a>
			</template>

			<template #end>
				<Button
					v-model="isDark"
					v-tooltip="'Toggle theme'"
					severity="secondary"
					class="ml-2"
					@click="toggleDark()"
				>
					<font-awesome-icon
						:icon="isDark ? 'moon' : 'sun'"
						size="xl"
					/>
				</Button>
			</template>
		</Menubar>

		<div class="overflow-auto h-full">
			<router-view v-slot="{ Component, route }">
				<transition mode="out-in">
					<component :is="Component" :key="route.path" />
				</transition>
			</router-view>
		</div>

		<Toast />
	</div>
</template>
