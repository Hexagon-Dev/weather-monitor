<script setup lang="ts">
import { WeatherCodeEnum } from '@/constants';
import { computed } from 'vue';

const props = defineProps<{ type: WeatherCodeEnum }>();

const text = computed(() => {
	return {
		[WeatherCodeEnum.CLEAR_SKY]: 'Clear sky',
		[WeatherCodeEnum.MAINLY_CLEAR]: 'Mainly clear',
		[WeatherCodeEnum.PARTLY_CLOUDY]: 'Partly cloudy',
		[WeatherCodeEnum.OVERCAST]: 'Overcast',
		[WeatherCodeEnum.FOG]: 'Fog',
		[WeatherCodeEnum.RIME_FOG]: 'Rime fog',
		[WeatherCodeEnum.DRIZZLE_LIGHT]: 'Light drizzle',
		[WeatherCodeEnum.DRIZZLE_MODERATE]: 'Moderate drizzle',
		[WeatherCodeEnum.DRIZZLE_DENSE]: 'Dense drizzle',
		[WeatherCodeEnum.FREEZING_DRIZZLE_LIGHT]: 'Light freezing drizzle',
		[WeatherCodeEnum.FREEZING_DRIZZLE_DENSE]: 'Dense freezing drizzle',
		[WeatherCodeEnum.RAIN_SLIGHT]: 'Slight rain',
		[WeatherCodeEnum.RAIN_MODERATE]: 'Moderate rain',
		[WeatherCodeEnum.RAIN_HEAVY]: 'Heavy rain',
		[WeatherCodeEnum.SNOW_SLIGHT]: 'Slight snow',
		[WeatherCodeEnum.SNOW_MODERATE]: 'Moderate snow',
		[WeatherCodeEnum.SNOW_HEAVY]: 'Heavy snow',
		[WeatherCodeEnum.SNOW_GRAINS]: 'Snow grains',
		[WeatherCodeEnum.RAIN_SHOWERS_SLIGHT]: 'Slight rain showers',
		[WeatherCodeEnum.RAIN_SHOWERS_MODERATE]: 'Moderate rain showers',
		[WeatherCodeEnum.RAIN_SHOWERS_VIOLENT]: 'Violent rain showers',
		[WeatherCodeEnum.SNOW_SHOWERS_SLIGHT]: 'Slight snow showers',
		[WeatherCodeEnum.SNOW_SHOWERS_HEAVY]: 'Heavy snow showers',
		[WeatherCodeEnum.THUNDERSTORM]: 'Thunderstorm',
		[WeatherCodeEnum.THUNDERSTORM_WITH_HAIL_SLIGHT]: 'Slight thunderstorm with hail',
		[WeatherCodeEnum.THUNDERSTORM_WITH_HAIL_HEAVY]: 'Heavy thunderstorm with hail',
	}[props.type];
});
</script>

<template>
	<span>{{ text }}</span>
</template>
