<script setup lang="ts">
import { IconsMap } from '@/constants';
import { format, getDayOfYear, getHours, isToday } from 'date-fns';
import { computed } from 'vue';
import { Weather, WeatherDay } from '@/types';
import { useUserStore } from '@/stores/userStore';

const props = defineProps<{
  isLoading: boolean;
  selectedLocation: Location | null;
}>();

const userStore = useUserStore();

const weatherByDays = computed<Array<WeatherDay>>(() => {
  if (!props.selectedLocation.value || !props.selectedLocation.value.weather) {
    return {};
  }

  return Object.values(selectedLocation.value!.weather.reduce((acc, curr: Weather) => {
    const date = new Date(curr.forecasted_at);
    const day = format(date, 'yyyy-MM-dd');

    const weatherToday = selectedLocation.value!.weather!.filter((w) => format(new Date(w.forecasted_at), 'yyyy-MM-dd') === day);

    const mostWeatherCodes = weatherToday.reduce((acc, curr) => {
      if (!acc[curr.type]) {
        acc[curr.type] = 0;
      }

      acc[curr.type]++;

      return acc;
    }, {} as Record<string, number>);

    const mostWeatherCode = Object.keys(mostWeatherCodes).reduce((a, b) => mostWeatherCodes[a] > mostWeatherCodes[b] ? a : b);

    acc[day] = {
      forecasted_at: new Date(curr.forecasted_at.substring(0, 10)),
      min: Math.min(...weatherToday.map(w => w.temperature)),
      max: Math.max(...weatherToday.map(w => w.temperature)),
      items: weatherToday,
      type: mostWeatherCode,
    };

    return acc;
  }, {} as Record<string, WeatherDay>)).slice(0, 7);
});

const weatherNow = computed<Weather>(() => {
  if (!selectedLocation.value || !selectedLocation.value.weather) {
    return null;
  }

  return selectedLocation.value.weather.find((w) => getHours(new Date(w.forecasted_at)) === getHours(new Date()));
});

const weatherToday = computed<Weather[]>(() => {
  if (!selectedLocation.value || !selectedLocation.value.weather) {
    return [];
  }

  return selectedLocation.value.weather.filter((w) => format(new Date(w.forecasted_at), 'yyyy-MM-dd') === format(selectedDate.value, 'yyyy-MM-dd'));
});

const temperatureMinToday = computed<number>(() => {
  if (!selectedLocation.value || !selectedLocation.value.weather) {
    return 0;
  }

  return Math.min(...weatherToday.value.map(w => w.temperature));
});

const temperatureMaxToday = computed<number>(() => {
  if (!selectedLocation.value || !selectedLocation.value.weather) {
    return 0;
  }

  return Math.max(...weatherToday.value.map(w => w.temperature));
});
</script>

<template>
	<div
		class="card flex xl:flex-row flex-col items-stretch gap-4 lg:w-1/2 w-full"
		:class="{ 'bg-surface-300': isLoading }"
	>
		<div v-if="isLoading" class="self-center mx-auto">
			<font-awesome-icon
				icon="spinner"
				spin
				size="2xl"
				class="text-primary-500"
			/>
		</div>

		<template v-else>
			<div
				v-if="weatherNow"
				class="flex flex-col items-center justify-center gap-4 xl:w-64 w-full flex-none rounded-lg bg-primary-500 text-white p-4"
			>
				<h2 class="text-xl font-bold break-words text-center">
					{{ selectedLocation!.name }}
				</h2>

				<p class="text-xl">
					Weather now
				</p>

				<p class="text-4xl font-bold">
					{{ weatherNow.temperature }}°C
					<font-awesome-icon :icon="IconsMap[weatherNow.type]" class="ml-2" />
				</p>

				<div>
					<p class="text-xl">
						Partly Cloudy
					</p>

					<p class="text-lg">
						<font-awesome-icon icon="caret-up" />{{ temperatureMinToday }}°C
						<font-awesome-icon icon="caret-down" class="ml-2" /> {{ temperatureMaxToday }}°C
					</p>
				</div>
			</div>

			<div class="flex flex-col justify-between md:gap-2 gap-1 h-full w-full">
				<button
					v-for="(weatherDay, i) in weatherByDays"
					:key="i"
					class="flex items-center text-start gap-2 border bg-white hover:bg-surface-100 duration-100 rounded-lg p-2"
					:class="{ 'hover:bg-white outline outline-primary-500': getDayOfYear(selectedDate) === getDayOfYear(weatherDay.forecasted_at) }"
					:disabled="getDayOfYear(selectedDate) === getDayOfYear(weatherDay.forecasted_at)"
					@click="selectedDate = weatherDay.forecasted_at"
				>
					<div class="w-11 flex-none">
						{{ isToday(weatherDay.forecasted_at) ? 'Today' : format(weatherDay.forecasted_at, 'EEE') }}
					</div>

					<font-awesome-icon :icon="IconsMap[weatherDay.type]" class="text-primary-500" size="lg" />

					<p class="font-black w-12 flex-none">
						{{ weatherDay.min }}°C
					</p>

					<TemperatureBar :values="Object.values(weatherByDays)" :min="weatherDay.min" :max="weatherDay.max" />

					<p class="font-black w-12 flex-none">
						{{ weatherDay.max }}°C
					</p>
				</button>
			</div>
		</template>
	</div>
</template>

<style scoped>

</style>
